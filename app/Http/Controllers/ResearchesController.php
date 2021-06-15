<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Providers\RouteServiceProvider;

use App\Models\Researches;
use Illuminate\Support\Facades\Auth;

class ResearchesController extends Controller
{
    public function index(Request $request){
        return Inertia::render('public/Views/onlyUsers/Researches');
    }
    public function store(Request $request){
        $request->validate([
            'state' => 'required|string|max:3',
            'brands' => 'required|array',
            'brands.*' => 'boolean',
            'other' => 'nullable|string',
            'xp' => 'required|string',
        ]);

        $user_id = Auth::user()->id;

        $already_exists = Researches::all()->where('user_id', $user_id);
        if(count($already_exists) > 0){
            foreach ($already_exists as $key => $value) {
                $already_exists[$key]->delete();
            }
        }
        
        $answear = new Researches;
        $answear->state = $request->state;
        $answear->xp = $request->xp;
        $answear->user_id = Auth::user()->id;

        $brands = "";
        foreach ($request->brands as $key => $value) {
            if($value == true){
                $brands .= $key."!!";
            }
        }
        if($request->other !== null){
            $brands .= $request->other."!!";
        }
        $answear->brands = $brands;
        
        $answear->save();

        $status = [0 => 'Pesquisa respondida! Obrigado'];

        return redirect(route('home'))->with('status', $status);
        // return Inertia::render('public/Views/HomePage', ['status' => [0 => 'Pesquisa respondida! Obrigado']]);
    }   
}
