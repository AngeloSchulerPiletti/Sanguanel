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

        $article->save();

        return Inertia::render("admin/Views/CRUD/ManagerPubs", ['success']);

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
