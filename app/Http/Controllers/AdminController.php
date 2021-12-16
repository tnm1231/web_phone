<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Http\Requests\Admin\Category\categoryRequest;

class AdminController extends Controller
{

    public function viewRegister()
    {
        return view('admin.page.auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['hash'] = ($data['password']);

        Admin::create($data);

        toastr()->success('Your admin account has been created successfully!');

        return redirect()->back();
    }
    public function viewLogin()
    {
        return view('admin.page.auth.login');
    }



}
