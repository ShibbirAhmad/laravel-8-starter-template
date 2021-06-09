<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        return view('admin.index');
    }

    public function login(Request $request){
        
      
        return  view('admin.auth.login');
    }
}
