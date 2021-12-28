<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('client.index');
    }
    public function error(){
        return view('client.404');
    }
    public function profile(){
        return view('client.profile');
    }
    public function detail(){
        return view('client.detail');
    }
    public function cate(){
        return view('client.cate');
    }
    public function checkout(){
        return view('client.checkout');
    }
}
