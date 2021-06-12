<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Article;
use App\Models\Author;
use App\Models\InstitucionalPage;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\SubhomesContent;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;

use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{
    protected $url_adm = 'admin/';

    protected function getDatabase($requires)
    {
        $database = [
            //Data
            'users' => User::all(),
            'articles' => Article::all(),
            'team' => Team::all(),
            'newsletter' => Newsletter::all(),

            //Pages
            'author'            => Author::all(),
            'institucional'     => InstitucionalPage::all(),
            'subhomes'          => SubhomesContent::all(),
            //'articleshome'      => '', //Inalterável, por enquanto
            //'recipeshome'       => '', //Inalterável, por enquanto
            //'institucionalhome' => '', //Inalterável, por enquanto
        ];

        $return = [];

        foreach ($requires as $i => $model) {
            foreach ($database as $db_model => $data) {
                if ($model == $db_model) {
                    $return[$model] = $data;
                }
            }
        }

        return [$return];
    }

    protected function saveImg($req, $requestFile, $path)
    {
        $file = $req->$requestFile;
        $ext = $file->extension();

        $imgName = $requestFile . "." . $ext;
        $file->move(public_path($path), $imgName);

        return $path . $imgName;
    }








    public function admin()
    {
        return Inertia::render($this->url_adm . 'Views/CRUD/Admin');
    }
    public function database()
    {
        $database = $this->getDatabase(['users', 'articles']);
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerDatabase', ['database' => $database[0]]);
    }
    public function pubs()
    {
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerPubs');
    }
    public function pages()
    {
        $pages = $this->getDatabase(['institucional', 'author', 'subhomes']);
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerPages', ['pages' => $pages[0]]);
    }
    public function news()
    {
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerAdmins');
    }


    public function Pdatabase(Request $request)
    {
        $request->validate([
            'action' => 'required|string',
        ]);

        if ($request->action == "delete") {
            if (Auth::user()->adminLevel < 4) {
                abort(403);
            } else {
                $row = DB::table($request->table)->where('id', $request->id)->get();
                $row = $row[0];
                if ($request->table == "articles") {
                    if ($row->pictureNames != "") {

                        $arrayPicNames = explode("!!", $row->pictureNames);
                        for ($i = 0; $i < count($arrayPicNames); $i++) {
                            if (\File::exists(public_path($row->path_dirPictures . "/" . $arrayPicNames[$i]))) {
                                \File::delete(public_path($row->path_dirPictures . "/" . $arrayPicNames[$i]));
                            }
                        }
                    }
                } else if ($request->table == "users") {
                    if (\File::exists(public_path("storage/" . $row->profile_photo_path))) {
                        \File::delete(public_path("storage/" . $row->profile_photo_path));
                    }
                }
                DB::table($request->table)->delete($request->id);
                $status = [0 => "Remoção feita com sucesso!"];
            }
        } else if ($request->action == "change") {
            if ($request->table == "users") {
                $request->validate([
                    'id'                 => 'required|integer',
                    'name'               => 'required|string',
                    'email'              => 'required|email',
                    'current_team_id'    => 'integer',
                    'profile_photo_path' => 'string',
                    'adminLevel'         => 'between:0,4',
                ]);

                $user = User::findOrFail($request->id);

                $user->name = $request->name;
                $user->email = $request->email;
                $user->current_team_id = $request->team;
                $user->profile_photo_path = $request->picture;
                $user->adminLevel = $request->adminLevel;

                $user->save();
            } else if ($request->table == "articles") {
                $request->validate([
                    'author' => 'string|required',
                    'subject' => 'string|required',
                    'description' => 'required|string|max:230|min:20',
                    'title' => 'required|string',
                    'text' => 'required|string',
                    'keywords' => 'required|string',
                    'url' => 'required|string',
                ]);

                $article = Article::findOrFail($request->id);

                $article->author = $request->author;
                $article->subject = $request->subject;
                $article->description = $request->description;
                $article->title = $request->title;
                $article->text = $request->text;
                $article->keywords = $request->keywords;
                // $article->path_dirPictures = $request->path_dirPictures;
                $article->url = $request->url;

                $article->save();
            }
            $status = [0 => "Alteração feita com sucesso!"];
        }
    

        $database = $this->getDatabase(['users', 'articles']);
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerDatabase', ['database' => $database[0], 'status' => $status]);
    }


    public function Ppubs(Request $request)
    {
        //
    }
    public function Ppages(Request $request)
    {
        if (Auth::user()->adminLevel < 4) {
            abort(403);
        }
        if ($request->table == "author") {
            $request->validate([
                "id" => 'required|integer',
                "bio" => 'required|string|min:20|max:400',
                "picture1" => 'image|nullable',
                "picture2" => 'image|nullable',
                "profile" => 'required|image',
                "text1" => 'required|string|min:50|max:900',
                "text2" => 'string|min:50|max:900|nullable',
                "title1" => 'required|string|min:4|max:30',
                "title2" => 'string|min:4|max:30|nullable',
            ]);

            //Image Tratament
            $profile = $request->hasFile('profile')   ? $this->saveImg($request, 'profile',  '/images/autor/') : "";
            $picture1 = $request->hasFile('picture1') ? $this->saveImg($request, 'picture1', '/images/autor/') : "";
            $picture2 = $request->hasFile('picture2') ? $this->saveImg($request, 'picture2', '/images/autor/') : "";

            //Passing All Data;
            $autor = new Author();
            $autor->bio      = $request->bio;
            $autor->picture1 = $picture1;
            $autor->picture2 = $picture2;
            $autor->profile  = $profile;
            $autor->text1    = $request->text1;
            $autor->text2    = $request->text2;
            $autor->title1   = $request->title1;
            $autor->title2   = $request->title2;

            $autor->save();

        } else if ($request->table == "subhomes") {
        } else if ($request->table == "institucional") {
        } else {
            abort(403);
        }
        
        $status = [0 => "Alteração feita com sucesso!"];
        $pages = $this->getDatabase(['institucional', 'author', 'subhomes']);

        return Inertia::render($this->url_adm.'Views/CRUD/ManagerPages', ['page' => $pages[0], 'status' => $status]);
    }
    public function Pnews()
    {
        // return Inertia::render($this->url_adm.'Views/CRUD/ManagerAdmins');
    }
}
