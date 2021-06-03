<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Article;

use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{
    protected $url_adm = 'admin/';

    public function admin()
    {
        return Inertia::render($this->url_adm . 'Views/CRUD/Admin');
    }


    public function stringToURL($title){
        $changes = array(
            'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj',''=>'Z', ''=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
            'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
            'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 
            'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 
            'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 
            'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
            'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
            //Another Chars
            ' '=>'-', '!'=>'', '?'=>'', '+'=>'', '/'=>'-', '"'=>'', "'"=>'', '*'=>'', '&'=>'', '@'=>'', '#'=>'',
            '('=>'', ')'=>'', '¨'=>'', ','=>'', '.'=>'', '§'=>'', '%'=>'', '<'=>'', '>'=>'', '\\'=>'', '|'=>'',
            //Uppercase to Lowercase
            'A'=>'a', 'B'=>'b', 'C'=>'c', 'D'=>'d', 'E'=>'e', 'F'=>'f', 'G'=>'g', 'H'=>'h', 'I'=>'i', 
            'J'=>'j', 'K'=>'k', 'L'=>'l', 'M'=>'m', 'N'=>'n', 'O'=>'o', 'P'=>'p', 'Q'=>'q', 'R'=>'r', 
            'S'=>'s', 'T'=>'t', 'U'=>'u', 'V'=>'v', 'W'=>'w', 'X'=>'x', 'Y'=>'y', 'Z'=>'z', 
        );

        $url = strtr($title, $changes);
        return $url;
    }


    public function database()
    {
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerDatabase');
    }
    public function pubs()
    {
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerPubs');
    }
    public function pages()
    {
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerPages');
    }
    public function admusers()
    {
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerAdmins');
    }


    public function Pdatabase()
    {
        // return Inertia::render($this->url_adm.'Views/CRUD/ManagerDatabase');
    }
    public function Ppubs(Request $request)
    {

        $request->validate([
            'author' => 'required',
            'title'  => 'required',
            'subject'=> 'required',
            'text'   => 'required',
            'images' => 'array',
            'images.*' => 'image',
        ]);

        $article = new Article;

        $article->author = $request->author;
        $article->title = $request->title;
        $article->subject = $request->subject;
        $article->text = $request->text;


        //Image Tratament
        if ($request->hasFile('images.*')) {
            $requestImages = $request->images;
            $imagesNames = [];

            foreach ($requestImages as $key => $img) {
                $ext = $img->extension();

                $imageName = $img->getClientOriginalName() . strtotime('now') . "." . $ext;

                $has = 0;
                foreach ($imagesNames as $key => $name) {
                    if($imageName == $name){
                        $has++;
                    }
                }
                if($has > 0){
                    $imageName = $has . $imageName;
                }
                $imagesNames[] = $imageName;
            }
            for ($i=0; $i < count($requestImages); $i++){ 
                $requestImages[$i]->move(public_path('images/app/'.$request->subject), $imagesNames[$i]);
            }
            $article->path_dirPictures = 'images/app/'.$request->subject;
        }


        //URL Creation
        $article->url = $this->stringToURL($request->title);

        $article->save();

        return Inertia::render("admin/Views/CRUD/ManagerPubs", ['status' => [0 => 'Artigo criado!']]);

    }
    public function Ppages()
    {
        // return Inertia::render($this->url_adm.'Views/CRUD/ManagerPages');
    }
    public function Padmusers()
    {
        // return Inertia::render($this->url_adm.'Views/CRUD/ManagerAdmins');
    }
}
