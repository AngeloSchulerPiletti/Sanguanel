<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Article;
use App\Models\Author;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{
    protected $url_adm = 'admin/';

    protected function getDatabase(){
        $users = User::all();
        $articles = Article::all();
        $author = Author::all();

        return ['users'=>$users, 'articles'=>$articles, 'author'=>$author];
    }

    public function admin()
    {
        return Inertia::render($this->url_adm . 'Views/CRUD/Admin');
    }


    public function stringToURL($title){
        $changes = array(
            'Š'=>'s', 'š'=>'s', 'Ð'=>'dj',''=>'z', ''=>'z', 'À'=>'a', 'Á'=>'a', 'Â'=>'a', 'Ã'=>'a', 'Ä'=>'a',
            'Å'=>'a', 'Æ'=>'a', 'Ç'=>'c', 'È'=>'e', 'É'=>'e', 'Ê'=>'e', 'Ë'=>'e', 'Ì'=>'i', 'Í'=>'i', 'Î'=>'i',
            'Ï'=>'i', 'Ñ'=>'n', 'Ń'=>'n', 'Ò'=>'o', 'Ó'=>'o', 'Ô'=>'o', 'Õ'=>'o', 'Ö'=>'o', 'Ø'=>'o', 'Ù'=>'u', 
            'Ú'=>'u', 'Û'=>'u', 'Ü'=>'u', 'Ý'=>'y', 'Þ'=>'b', 'ß'=>'ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 
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
        $database = $this->getDatabase();
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerDatabase', ['database' => $database]);
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


    public function Pdatabase(Request $request)
    {
        if($request->table == "users"){
            $request->validate([
                'id'                =>'required|integer',
                'name'              =>'required|string',
                'email'             =>'required|email',
                'current_team_id'   =>'integer',
                'profile_photo_path'=>'string',
                'adminLevel'        =>'between:0,4',
            ]);

            $user = User::findOrFail($request->id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->current_team_id = $request->team;
            $user->profile_photo_path = $request->picture;
            $user->adminLevel = $request->adminLevel;

            $user->save();
        }
        else if($request->table == "articles"){
            // dd($request->path_dirPictures);
            $request->validate([
                'author'=>'string|required',
                'subject'=>'string|required',
                'title'=>'required|string',
                'text'=>'required|string',
                // 'path_dirPictures'=>'string|nullable',
                'url'=>'required|string',
            ]);

            $article = Article::findOrFail($request->id);
            
            $article->author = $request->author;
            $article->subject = $request->subject;
            $article->title = $request->title;
            $article->text = $request->text;
            // $article->path_dirPictures = $request->path_dirPictures;
            $article->url = $request->url;

            $article->save();
        }
        else if($request->table == "author"){
            $request->validate([
                'profile'=>'required|image',
                'bio'=>'required|string',
                'title1'=>'required|string',
                'text1'=>'required|string',
                'picture1'=>'image',
                'title2'=>'string',
                'text2'=>'string',
                'picture2'=>'image',
            ]);

            $author = Author::findOrFail($request->id);

            $author->profile = $request->profile;
            $author->bio = $request->bio;
            $author->title1 = $request->title1;
            $author->text1 = $request->text1;
            $author->picture1 = $request->picture1;
            $author->title2 = $request->title2;
            $author->text2 = $request->text2;
            $author->picture2 =$request->picture2;

            $author->save();
        }

        $database = $this->getDatabase();
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerDatabase', ['database' => $database, 'status' => [0=> 'Alteração feita com sucesso!']]);
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
