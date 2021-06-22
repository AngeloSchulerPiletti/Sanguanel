<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleRequire;
use App\Models\Article;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Redirect;

class ArticleRequireController extends Controller
{
    protected function tagHTMLconstructor($content, $codified_text, $text, $tag, $class = "")
    {
        foreach ($codified_text as $i => $value) {
            $content = str_replace($value, '<' . $tag . ' class="' . $class . '" ' . '>' . $text[$i] . '</' . $tag . '>', $content);
        }
        return $content;
    }

    public function stringToURL($title)
    {
        $changes = array(
            'Š' => 's', 'š' => 's', 'Ð' => 'dj', '' => 'z', '' => 'z', 'À' => 'a', 'Á' => 'a', 'Â' => 'a', 'Ã' => 'a', 'Ä' => 'a',
            'Å' => 'a', 'Æ' => 'a', 'Ç' => 'c', 'È' => 'e', 'É' => 'e', 'Ê' => 'e', 'Ë' => 'e', 'Ì' => 'i', 'Í' => 'i', 'Î' => 'i',
            'Ï' => 'i', 'Ñ' => 'n', 'Ń' => 'n', 'Ò' => 'o', 'Ó' => 'o', 'Ô' => 'o', 'Õ' => 'o', 'Ö' => 'o', 'Ø' => 'o', 'Ù' => 'u',
            'Ú' => 'u', 'Û' => 'u', 'Ü' => 'u', 'Ý' => 'y', 'Þ' => 'b', 'ß' => 'ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
            'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i',
            'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ń' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o',
            'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y', 'ƒ' => 'f',
            'ă' => 'a', 'î' => 'i', 'â' => 'a', 'ș' => 's', 'ț' => 't', 'Ă' => 'A', 'Î' => 'I', 'Â' => 'A', 'Ș' => 'S', 'Ț' => 'T',
            //Another Chars
            ' ' => '-', '!' => '', '?' => '', '+' => '', '/' => '-', '"' => '', "'" => '', '*' => '', '&' => '', '@' => '', '#' => '',
            '(' => '', ')' => '', '¨' => '', ',' => '', '.' => '', '§' => '', '%' => '', '<' => '', '>' => '', '\\' => '', '|' => '',
            //Uppercase to Lowercase
            'A' => 'a', 'B' => 'b', 'C' => 'c', 'D' => 'd', 'E' => 'e', 'F' => 'f', 'G' => 'g', 'H' => 'h', 'I' => 'i',
            'J' => 'j', 'K' => 'k', 'L' => 'l', 'M' => 'm', 'N' => 'n', 'O' => 'o', 'P' => 'p', 'Q' => 'q', 'R' => 'r',
            'S' => 's', 'T' => 't', 'U' => 'u', 'V' => 'v', 'W' => 'w', 'X' => 'x', 'Y' => 'y', 'Z' => 'z',
        );

        $url = strtr($title, $changes);
        return $url;
    }

    public function ArticleRegEx($text){

        /*BASIC FORMAT */
        //Backspaces
        preg_match_all("/\n\n/Us",          $text, $backspaces);
        foreach ($backspaces[0] as $i => $value) {
            $text = str_replace($value, '<br/>', $text);
        }
        //Tiny Paragraph
        preg_match_all("/[@]{3}(.+)[@]{3}/Us",                               $text, $tiny_p);
        $text = $this->tagHTMLconstructor($text, $tiny_p[0], $tiny_p[1], 'p', 'tiny_p');
        //Simple Paragraph
        preg_match_all("/[@]{2}(.+)[@]{2}/Us",                               $text, $simple_p);
        $text = $this->tagHTMLconstructor($text, $simple_p[0], $simple_p[1], 'p', 'simple_p');




        /* BOLD  */
        preg_match_all("/[\*]{2}([^\*].*[^\*])[\*]{2}/Us",          $text, $bolds);
        $text = $this->tagHTMLconstructor($text, $bolds[0], $bolds[1], 'strong');

        /* ITALIC */
        preg_match_all("/\*([^\*].*[^\*])\*/Us",                               $text, $italics);
        $text = $this->tagHTMLconstructor($text, $italics[0], $italics[1], 'em');




        /* TITLES */
        //H6
        preg_match_all("/[#]{6}([^#]+)[#]{6}/U",                       $text, $h6);
        $text = $this->tagHTMLconstructor($text, $h6[0], $h6[1], 'h6');
        //H5
        preg_match_all("/[#]{5}([^#]+)[#]{5}/U",                       $text, $h5);
        $text = $this->tagHTMLconstructor($text, $h5[0], $h5[1], 'h5');
        //H4
        preg_match_all("/[#]{4}([^#]+)[#]{4}/U",                       $text, $h4);
        $text = $this->tagHTMLconstructor($text, $h4[0], $h4[1], 'h4');
        //H3
        preg_match_all("/[#]{3}([^#]+)[#]{3}/U",                       $text, $h3);
        $text = $this->tagHTMLconstructor($text, $h3[0], $h3[1], 'h3');
        //H2
        preg_match_all("/[#]{2}([^#]+)[#]{2}/U",                       $text, $h2);
        $text = $this->tagHTMLconstructor($text, $h2[0], $h2[1], 'h2');
        //H1
        preg_match_all("/[#]{1}([^#]+)[#]{1}/U",                       $text, $h1);
        $text = $this->tagHTMLconstructor($text, $h1[0], $h1[1], 'h1');


        //HR
        preg_match_all("/[+][-][+]/Us",          $text, $hrs);
        foreach ($hrs[0] as $i => $value) {
            $text = str_replace($value, '<hr class="elegant_hr"/>', $text);
        }


        /* SPANs */
        // 50%
        preg_match_all("/[\^]{2}([^\^]+)[\^]{2}/U",                  $text, $small75);
        $text = $this->tagHTMLconstructor($text, $small75[0], $small75[1], 'span', 'small75');
        // 25%
        preg_match_all("/[\^]([^\^]+)[\^]/U",                        $text, $small50);
        $text = $this->tagHTMLconstructor($text, $small50[0], $small50[1], 'span', 'small50');


        /*QUOTES */
        preg_match_all("/[']{3}([^']+)[']{3}/U",                               $text, $quotes);
        $text = $this->tagHTMLconstructor($text, $quotes[0], $quotes[1], 'p', 'quotes');


        /*LISTS */
        //Cria a Lista
        preg_match_all("/[-]{4}(.*)[-]{4}/Us",                                             $text, $list);
        $text = $this->tagHTMLconstructor($text, $list[0], $list[1], 'ul');
        //Cria os elementos
        preg_match_all("/[-]{2}(.*)[-]{2}/Us",                                             $text, $list_el);
        $text = $this->tagHTMLconstructor($text, $list_el[0], $list_el[1], 'li');


        /*LINKS */
        preg_match_all("/[$]{2}([^\[]+)[\[]([^\]]+)[\]][$]{2}/U",                   $text, $link);
        foreach ($link[0] as $i => $value) {
            $text = str_replace($value, '<a href="' . $link[2][$i] . '">' . $link[1][$i] . '</a>', $text);
        }

        /*ADSENSE */
        preg_match_all("/`[\[][\]]`/U",                                         $text, $ads);
        foreach ($ads[0] as $i => $value) {
            $text = str_replace($value, '', $text);
        }

        return $text;
    }





    public function createRequire(Request $request)
    {
        $request->validate([
            'author' => 'required|string',
            'title'  => 'required|string|min:4|max:50',
            'subject' => 'required|string',
            'keywords' => 'required|string',
            'description' => 'required|string|min:20|max:230',
            'text'   => 'required|string',
            'images' => 'array',
            'images.*' => 'image',
        ]);

        if (Auth::user()->adminLevel > 3) {
            $article = new Article;
            $status = [0 => "Artigo Criado!"];
        } else {
            $article = new ArticleRequire;
            $status = [0 => "Artigo criado, mas aguarda aprovação de um administrador!"];
            $article->text_formatted = $request->text;
            $article->status = "open";
        }

        $article->author = $request->author;
        $article->title = $request->title;
        $article->subject = $request->subject;
        $article->description = $request->description;

        $imagePaths = [];

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
                $imagePaths[] = '/images/app/' . $request->subject . "/" . $imagesNames[$i];
                $requestImages[$i]->move(public_path('images/app/' . $request->subject), $imagesNames[$i]);
            }

            $article->path_dirPictures = 'images/app/' . $request->subject;
            $imagesNamesString = "";
            for ($i = 0; $i < count($imagesNames); $i++) {
                if ($i == 0) {
                    $imagesNamesString = $imagesNames[$i];
                } else {
                    $imagesNamesString .= "!!" . $imagesNames[$i];
                }
            }
            $article->pictureNames = $imagesNamesString;
        }
        else{
            $article->pictureNames = "none";
            $article->path_dirPictures = "none";
        }


        // Uses function to format
        $article->text = $this->ArticleRegEx($request->text);

        /*IMAGENS DO ARTIGO */
        preg_match_all("/`{([\w]+)[-]+([\w]+)}{(.*)}`/Us",                                       $request->text, $picture);
        if (count($picture[0]) != count($request->images)) {
            return Inertia::render("admin/Views/CRUD/ManagerPubs", ['errors' => [0 => 'O número de imagens do artigo não é o mesmo número de imagens em upload.']]);
        } else if (count($picture[0]) > 0) {
            foreach ($picture[0] as $i => $value) {
                $article->text = str_replace($value, '<div class="img_container ' . $picture[2][$i] . '"><img class="' . $picture[1][$i] . '" src="' . $imagePaths[$i] . '" alt="' . $picture[3][$i] . '" /><p class="img_alternative">' . $picture[3][$i] . '</p></div>', $article->text);
            }
        }


        //Keywords
        $article->keywords = $request->keywords;


        //URL Creation
        $url = $this->stringToURL($request->title);
        $URLexists = DB::table('articles')->where('url', $url)->get();
        $article->url = isset($URLexists[0]) ? $url.'-'.strtotime('now') : $url;

        // dd($article->text);


        $article->save();

        // return Inertia::render("admin/Views/CRUD/ManagerPubs", ['status' => [0 => $status]]);
        return redirect(route('admin.newpub'))->with('status', $status);
    }



    public function require(Request $request)
    {
        $requiresToAnswear = ArticleRequire::all();
        $props = null !== $request->session()->get('status') ? ['articlesToAnswear' => $requiresToAnswear, 'status' => $request->session()->get('status')] : ['articlesToAnswear' => $requiresToAnswear];
        
        return Inertia::render('admin/Views/CRUD/Requires', $props);

        // $requestParameters = $request->request->all();
        // if (isset($requestParameters["status"])) {
        //     $status = $requestParameters["status"];
        // } else {
        //     $status = false;
        // }
       
        // return Inertia::render("admin/Views/CRUD/Requires", ['articlesToAnswear' => $requiresToAnswear, 'status' => $status]);
    }


    public function destroyRequire(Request $request, $require_status = "")
    {
        if (Auth::user()->adminLevel < 4) {
            abort(403);
        } else if($require_status == "aproved"){
            DB::table("article_requires")->delete($request->id);
            return;
        } 
        else {
            $row = DB::table("article_requires")->where('id', $request->id)->get();
            $row = $row[0];
            if ($row->pictureNames != "") {

                $arrayPicNames = explode("!!", $row->pictureNames);
                for ($i = 0; $i < count($arrayPicNames); $i++) {
                    if (\File::exists(public_path($row->path_dirPictures . "/" . $arrayPicNames[$i]))) {
                        \File::delete(public_path($row->path_dirPictures . "/" . $arrayPicNames[$i]));
                    }
                }
            }
            DB::table("article_requires")->delete($request->id);
            $status = [0 => "Remoção feita com sucesso!"];
        }
        
        return redirect(route('admin.requireView'))->with('status', $status);
    }


    public function aproveRequire(Request $request)
    {
        if (Auth::user()->adminLevel < 4) {
            abort(403);
        } else {
            $newArt = new Article;

            $aprovedArt = DB::table("article_requires")->where('id', $request->id)->get();
            $aprovedArt = $aprovedArt[0];
            
            $newArt->author = $aprovedArt->author;
            $newArt->subject = $aprovedArt->subject;
            $newArt->description = $aprovedArt->description;
            $newArt->title = $aprovedArt->title;
            $newArt->text = $aprovedArt->text;
            $newArt->keywords = $aprovedArt->keywords;
            $newArt->path_dirPictures = $aprovedArt->path_dirPictures;
            $newArt->pictureNames = $aprovedArt->pictureNames;
            $newArt->url = $aprovedArt->url;

            $newArt->save();

            $this->destroyRequire($request, 'aproved');
            
            $status = [0 => "Aprovação feita com sucesso!"];
        }

        // return Redirect::route('admin.requireView', ['status' => $status]);
        return redirect(route('admin.requireView'))->with('status', $status);
    }
}
