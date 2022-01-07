<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Http\Requests\Admin\Category\categoryRequest;
use App\Http\Requests\RequestPassword;
use App\Mail\registerMail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Jobs\sendMailJob;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\type;

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

        $dataMail['fullname'] = $request->fullname;
        // Mail::to($request->email)->send(new registerMail($dataMail));
        sendMailJob::dispatch($request->email, $dataMail);
        return redirect('/');



    }
     public function verify(Request $request){
         $data = $request->all();
        return view('admin.page.auth.verify');
     }
    public function viewForget()
    {
        return view('admin.page.auth.forget');
    }
    public function viewLogin()
    {
        return view('admin.page.auth.login');
    }
    public function login(LoginRequest $request)
    {
        $data = $request->only('id','email', 'password');
        $admin = Auth::guard('admin')->attempt($data);
        if($admin){
                toastr()->success('Login successfully');
                return redirect('/admin/page');
        }else {
            toastr()->error('Your email or password is not correct');
        }
    }
    public function logout(){
        $id = Auth::user();
        dd($id);
        Auth::logout($id);
        return redirect('/admin/login');
    }
    public function reset()
    {
        return view('admin.page.auth.reset');
    }
    public function saveUpdatePassword(RequestPassword $requestPassword)
    {

        // if (Hash::check($requestPassword->password_old,get_data_user(type:'web', field: 'password')))
        // {
        //     $admin = Admin::find(get_data_user(type:'web'));
        //     $admin->password = bcrypt($requestPassword->password);
        //     $admin->save();

        //     return redirect()->back()->with('success','cap nhat thanh cong');
        // }
        // return redirect()->back()->with('danger','mat khau cu khogn dung');

    }



}
