<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;


class NewsletterController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        $newsletter = new Newsletter;
        $newsletter->email = $request->email;
        $newsletter->save();

        $status = [0 => "Email cadastrado"];

        return redirect(route('home'))->with('status', $status);
        // return Inertia::render("public/Views/HomePage", ['status' => [0 => 'Email cadastrado']]);
    }
}
