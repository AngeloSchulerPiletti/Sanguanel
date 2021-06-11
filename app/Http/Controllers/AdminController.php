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
                            if (\File::exists(public_path($row->path_dirPictures. "/" . $arrayPicNames[$i]))) {
                                \File::delete(public_path($row->path_dirPictures. "/" . $arrayPicNames[$i]));
                            }
                        }
                    }
                } else if ($request->table == "users") {
                    if (\File::exists(public_path("storage/". $row->profile_photo_path))) {
                        \File::delete(public_path("storage/". $row->profile_photo_path));
                    }
                }
                DB::table($request->table)->delete($request->id);
                $status = [0 => "Remoção feita com sucesso!"];
            }
            
        } else if ($request->action == "change") {
            if ($request->table == "users") {
                $request->validate([
                    'id'                => 'required|integer',
                    'name'              => 'required|string',
                    'email'             => 'required|email',
                    'current_team_id'   => 'integer',
                    'profile_photo_path' => 'string',
                    'adminLevel'        => 'between:0,4',
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
                    'keywords'=> 'required|string',
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

        // else if ($request->table == "author") {
        //     $request->validate([
        //         'profile' => 'required|image',
        //         'bio' => 'required|string',
        //         'title1' => 'required|string',
        //         'text1' => 'required|string',
        //         'picture1' => 'image',
        //         'title2' => 'string',
        //         'text2' => 'string',
        //         'picture2' => 'image',
        //     ]);

        //     $author = Author::findOrFail($request->id);

        //     $author->profile = $request->profile;
        //     $author->bio = $request->bio;
        //     $author->title1 = $request->title1;
        //     $author->text1 = $request->text1;
        //     $author->picture1 = $request->picture1;
        //     $author->title2 = $request->title2;
        //     $author->text2 = $request->text2;
        //     $author->picture2 = $request->picture2;

        //     $author->save();
        // }

        $database = $this->getDatabase(['users', 'articles']);
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerDatabase', ['database' => $database[0], 'status' => $status]);
    }
    public function Ppubs(Request $request)
    {
        //
    }
    public function Ppages()
    {
        // return Inertia::render($this->url_adm.'Views/CRUD/ManagerPages');
    }
    public function Pnews()
    {
        // return Inertia::render($this->url_adm.'Views/CRUD/ManagerAdmins');
    }
}
