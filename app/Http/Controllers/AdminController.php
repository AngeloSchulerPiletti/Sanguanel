<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\ArticleRequireController;

use App\Models\Article;
use App\Models\Author;
use App\Models\InstitucionalPage;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\SubhomesContent;
use App\Models\Homepage;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{
    protected $url_adm = 'admin/';

    protected function getDatabase($requires, $order = false)
    {
        if ($order == 'last') {
            $database = [
                // //Data
                // 'users' => User::all(),
                // 'articles' => Article::all(),
                // 'team' => Team::all(),
                // 'newsletter' => Newsletter::all(),

                //Pages
                'author'            => Author::all()->last(),
                'institucional'     => InstitucionalPage::all()->last(),
                'subhomes'          => SubhomesContent::all()->last(),
                'homes'             => Homepage::all()->last(),
            ];
        } else {
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
                'homes'             => Homepage::all(),
            ];
        }

        $return = [];

        foreach ($requires as $i => $model) {
            foreach ($database as $db_model => $data) {
                if ($model == $db_model) {
                    $return[$model] = $data;
                }
            }
        }
// dd($requires, $database);
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










    /*+--------------------------------------+
      |                 GET                 |
      +--------------------------------------+*/
    public function admin()
    {
        return Inertia::render($this->url_adm . 'Views/CRUD/Admin');
    }
    public function database(Request $request)
    {
        $database = $this->getDatabase(['users', 'articles']);
        $props = null !== $request->session()->get('status') ? ['database' => $database[0], 'status' => $request->session()->get('status')] : ['database' => $database[0]];

        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerDatabase', $props);
        // return Inertia::render($this->url_adm . 'Views/CRUD/ManagerDatabase', ['database' => $database[0]]);
    }
    public function pubs(Request $request)
    {
        $props = null !== $request->session()->get('status') ? ['status' => $request->session()->get('status')] : [];

        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerPubs', $props);
        // return Inertia::render($this->url_adm . 'Views/CRUD/ManagerPubs');
    }
    public function pages(Request $request)
    {
        $pages = $this->getDatabase(['institucional', 'author', 'subhomes', 'homes',], 'last');
        $props = null !== $request->session()->get('status') ? ['pages' => $pages[0], 'status' => $request->session()->get('status')] : ['pages' => $pages[0]];
        // dd($props, $pages[0]);
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerPages', $props);
        // return Inertia::render($this->url_adm . 'Views/CRUD/ManagerPages', ['pages' => $pages[0]]);
    }
    public function news()
    {
        return Inertia::render($this->url_adm . 'Views/CRUD/ManagerAdmins');
    }













    /*+--------------------------------------+
      |                 POST                 |
      +--------------------------------------+*/
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
                    'adminLevel'         => 'required|between:0,4',
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
                    'description' => 'required|string|max:300|min:20',
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


        return redirect(route('admin.database'))->with('status', $status);
        // $database = $this->getDatabase(['users', 'articles']);
        // return Inertia::render($this->url_adm . 'Views/CRUD/ManagerDatabase', ['database' => $database[0], 'status' => $status]);
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
                "bio" => 'required|string|min:20|max:580',
                "picture1" => 'image|nullable',
                "picture2" => 'image|nullable',
                "profile" => 'required|image',
                "text1" => 'required|string|min:50|max:900',
                "text2" => 'string|min:50|max:900|nullable',
                "title1" => 'required|string|min:4|max:30',
                "title2" => 'string|min:4|max:30|nullable',
            ]);

            //Image Tratament
            $profile = $request->hasFile('profile')   ? $this->saveImg($request, 'profile',  '/images/autor/') : " ";
            $picture1 = $request->hasFile('picture1') ? $this->saveImg($request, 'picture1', '/images/autor/') : " ";
            $picture2 = $request->hasFile('picture2') ? $this->saveImg($request, 'picture2', '/images/autor/') : " ";

            //Passing All Data;
            $autor = new Author();
            $autor->bio      = $request->bio;
            $autor->picture1 = $picture1;
            $autor->picture2 = $picture2;
            $autor->profile  = $profile;
            $autor->text1    = $request->text1;
            $autor->text2    = $request->text2 ? $request->text2 : " ";
            $autor->title1   = $request->title1;
            $autor->title2   = $request->title2  ? $request->title2 : " ";

            $autor->save();
        } else if ($request->table == "subhomes") {
            $request->validate([
                'subject' => 'required|string',
                'description' => 'required|string|min:50',
            ]);

            $subhome = new SubhomesContent();
            $subhome->subject     = $request->subject;
            $subhome->description = $request->description;

            $subhome->save();
        } else if ($request->table == "institucional") {
            $request->validate([
                'subject' => 'required|string',
                'description' => 'required|string|min:50',
                'text'   => 'required|string',
                'images' => 'array',
                'images.*' => 'image',
            ]);

            $institucional = new InstitucionalPage;

            //Image Tratament
            if ($request->hasFile('images.*')) {
                $requestImages = $request->images;
                $imagesNames = [];

                foreach ($requestImages as $key => $img) {
                    $ext = $img->extension();

                    $imageName = $img->getClientOriginalName() . strtotime('now') . "." . $ext;

                    $has = 0;
                    foreach ($imagesNames as $key => $name) {
                        if ($imageName == $name) {
                            $has++;
                        }
                    }
                    if ($has > 0) {
                        $imageName = $has . $imageName;
                    }
                    $imagesNames[] = $imageName;
                }
                for ($i = 0; $i < count($requestImages); $i++) {
                    $imagePaths[] = '/images/institucional/' . $request->subject . "/" . $imagesNames[$i];
                    $requestImages[$i]->move(public_path('images/institucional/' . $request->subject), $imagesNames[$i]);
                }

                $institucional->path_dirPictures = 'images/institucional/' . $request->subject;
                $imagesNamesString = "";
                for ($i = 0; $i < count($imagesNames); $i++) {
                    if ($i == 0) {
                        $imagesNamesString = $imagesNames[$i];
                    } else {
                        $imagesNamesString .= "!!" . $imagesNames[$i];
                    }
                }
                $institucional->pictureNames = $imagesNamesString;
            } else {
                $institucional->pictureNames = "none";
                $institucional->path_dirPictures = "none";
            }


            $institucional->subject = $request->subject;
            $institucional->description = $request->description;
            $institucional->text_formatted = $request->text;

            $formatter = new ArticleRequireController;
            $institucional->text =  $formatter->ArticleRegEx($request->text);

            /*IMAGENS DO ARTIGO */
            preg_match_all("/`{([\w]+)[-]+([\w]+)}{(.*)}`/Us",                                       $request->text, $picture);
            if (count($picture[0]) != count($request->images)) {
                return Inertia::render("admin/Views/CRUD/ManagerPubs", ['errors' => [0 => 'O número de imagens do artigo não é o mesmo número de imagens em upload.']]);
            } else if (count($picture[0]) > 0) {
                foreach ($picture[0] as $i => $value) {
                    $institucional->text = str_replace($value, '<div class="img_container ' . $picture[2][$i] . '"><img class="' . $picture[1][$i] . '" src="' . $imagePaths[$i] . '" alt="' . $picture[3][$i] . '" /><p class="img_alternative">' . $picture[3][$i] . '</p></div>', $institucional->text);
                }
            }

            $institucional->url = 'institucional/' . $request->subject;

            $institucional->save();
        } else if ($request->table == "homes") {
            $request->validate([
                'subject' => 'required|string',
                'description' => 'required|string|min:50|max:200',
                'text'   => 'required|string',
                'images' => 'array',
                'images.*' => 'image',
            ]);

            $home = new Homepage;

            //Image Tratament
            if ($request->hasFile('images.*')) {
                $requestImages = $request->images;
                $imagesNames = [];

                foreach ($requestImages as $key => $img) {
                    $ext = $img->extension();

                    $imageName = $img->getClientOriginalName() . strtotime('now') . "." . $ext;

                    $has = 0;
                    foreach ($imagesNames as $key => $name) {
                        if ($imageName == $name) {
                            $has++;
                        }
                    }
                    if ($has > 0) {
                        $imageName = $has . $imageName;
                    }
                    $imagesNames[] = $imageName;
                }
                for ($i = 0; $i < count($requestImages); $i++) {
                    $imagePaths[] = '/images/' . $request->subject . "/" . $imagesNames[$i];
                    $requestImages[$i]->move(public_path('images/' . $request->subject), $imagesNames[$i]);
                }

                $home->path_dirPictures = 'images/' . $request->subject;
                $imagesNamesString = "";
                for ($i = 0; $i < count($imagesNames); $i++) {
                    if ($i == 0) {
                        $imagesNamesString = $imagesNames[$i];
                    } else {
                        $imagesNamesString .= "!!" . $imagesNames[$i];
                    }
                }
                $home->pictureNames = $imagesNamesString;
            } else {
                $home->pictureNames = "none";
                $home->path_dirPictures = "none";
            }

            $home->subject = $request->subject;
            $home->description = $request->description;
            $home->text_formatted = $request->text;

            $formatter = new ArticleRequireController;
            $home->text =  $formatter->ArticleRegEx($request->text);

            /*IMAGENS DO ARTIGO */
            preg_match_all("/`{([\w]+)[-]+([\w]+)}{(.*)}`/Us",                                       $request->text, $picture);
            if (count($picture[0]) != count($request->images)) {
                return Inertia::render("admin/Views/CRUD/ManagerPubs", ['errors' => [0 => 'O número de imagens do artigo não é o mesmo número de imagens em upload.']]);
            } else if (count($picture[0]) > 0) {
                foreach ($picture[0] as $i => $value) {
                    $home->text = str_replace($value, '<div class="img_container ' . $picture[2][$i] . '"><img class="' . $picture[1][$i] . '" src="' . $imagePaths[$i] . '" alt="' . $picture[3][$i] . '" /><p class="img_alternative">' . $picture[3][$i] . '</p></div>', $home->text);
                }
            }

            $home->save();
        } else {
            abort(403);
        }

        $status = [0 => "Alteração feita com sucesso!"];
        // $pages = $this->getDatabase(['institucional', 'author', 'subhomes', 'homes',]);

        return redirect(route('admin.updatepages'))->with('status', $status);
        // return Inertia::render($this->url_adm . 'Views/CRUD/ManagerPages', ['pages' => $pages[0], 'status' => $status]);
    }
    public function Pnews()
    {
        // return Inertia::render($this->url_adm.'Views/CRUD/ManagerAdmins');
    }
}
