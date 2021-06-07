<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    protected $url_pub = 'public/Views/';
    protected $url_adm = 'admin/Views/';

    public function index(){
        return Inertia::render($this->url_adm . 'Dashboard');
    }

    public function profile(Request $request){
        
        $user = Auth::user();
        return Inertia::render($this->url_adm . 'Account/Profile', ['user_data'=>$user]);
    }
}
