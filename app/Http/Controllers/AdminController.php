<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    protected $url_adm = 'admin/';

    public function admin(){
        return Inertia::render($this->url_adm.'Views/CRUD/Admin');
    }
    public function database(){
        return Inertia::render($this->url_adm.'Views/CRUD/ManagerDatabase');
    }
    public function pubs(){
        return Inertia::render($this->url_adm.'Views/CRUD/ManagerPubs');
    }
    public function pages(){
        return Inertia::render($this->url_adm.'Views/CRUD/ManagerPages');
    }
    public function admusers(){
        return Inertia::render($this->url_adm.'Views/CRUD/ManagerAdmins');
    }
}
