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
            'email' => 'required|email',
        ]);

        $newsletter = new Newsletter;
        $newsletter->email = $request->email;
        $newsletter->save();

        return Inertia::render("public/Views/HomePage");
    }
}
