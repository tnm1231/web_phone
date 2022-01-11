<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Str;
use App\Jobs\sendMailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\registerUser;
use App\Http\Requests\User\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class UserController extends Controller
{
    public function viewRegister()
    {
        return view('client.auth.register');
    }
    public function register(RegisterRequest $request){
        $data = $request->all();
        $data['hash'] = Str::uuid();
        $data['password'] = bcrypt($request->password);
        User::create($data);

        $dataMail['fullname']    = $request->fullname;
        $dataMail['hash']        = $data['hash'];


        // sendMailJob::dispatch($request->email, $dataMailX);

        Mail::to($request->email)->send(new registerUser($dataMail));
        // for($i = 0; $i < 4; $i++)
        //     Mail::to('quoclong.sv@gmail.com')->send(new registerMail($dataMailX));

        return response()->json(['data' => true]);

    }
    public function viewLogin()
    {
        return view('client.auth.login');
    }
    public function Login(LoginRequest $request)
    {
        $data = $request->only('email', 'password');

        if(Auth::attempt($data)){
            $taiKhoan = Auth::user();
            if($taiKhoan['type'] == -1){
                return response()->json(['status' => 1, 'message' => 'Your account has not been vetified yet!']);
            } else {
                return response()->json(['status' => 2, 'message' => 'Login successfully']);
            }
        } else {
            return response()->json(['status' => 0, 'message' => 'Your email or pass is wrong']);
        }
    }
    public function Active($xxx)
    {
        $taiKhoan = User::where('hash', $xxx)->first();
        if($taiKhoan){
            if($taiKhoan->type == 0){
            toastr()->warning('Your account verified!!!');
            return redirect('/login');
        }else {
            $taiKhoan->type = 0;
            $taiKhoan->save();
            toastr()->success('Your account has just been verified!!');
            return redirect('/login');
            }
        } else {
            toastr()->error('Verify code is not right');
        }
    }
    public function viewForget()
    {
        return view('client.auth.forget');
    }
    public function forget(Request $request)
    {

    $data = $request->all();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
    $title_mail = "Lay lai mat khau".' '.$now;
    $user = User::where('email','=',$data['email_account'])->get();
    foreach ($user as $value) {
        $user_id = $value->id;
    }

    if($user){
        $count_user = $user->count();
        if($count_user==0){
            return redirect()->back()->with('error', 'Email chua duoc dang ky de khoi phuc mat khau');
        }else {
            $token_random = Str::random();
            $user = User::find($user_id);
            $user->token = $token_random;
            $user->save();

            $to_email = $data['email_account'];
            $link_reset_pass = url('/update-new-pass?email='.$to_email.'&token='.$token_random);

            $data = array('name'=>$title_mail,'body'=>$link_reset_pass,'email'=>$data['email_account']);

            // Mail::to($request->email)->send(new registerUser($data));
            Mail::send('mail.resetMail',['data'=>$data], function($message) use ($title_mail,$data){
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'],$title_mail);
            });
            return redirect()->back()->with('message', 'Gui mail thanh cong,vui long vao email de reset password');
        }
    }
    }


    public function updateNewPass(Request $request)
    {
        $meta_desc = "Quen mat khau";
        $meta_keywords = "Ques Mat Khau";
        $meta_title = "Quen Mat Khau";
        $url_canonical = $request->url();
        return view('client.auth.repass',compact('meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function ResetPass(Request $request)
    {
       $data = $request->all();
       $token_random = Str::random();
       $user = User::where('email','=',$data['email'])->where('token','=',$data['token'])->get();
       $count = $user->count();
       foreach ($user as $value) {
        $user_id = $value->id;
    }
       if($count>0){

           $reset = User::find($user_id);
           $reset->password = bcrypt($data['password']);
           $reset->token = $token_random;
           $reset->save();
           return redirect('/login')->with ('message','Mat khau da cap nhat moi. quay lai trang dang nhap');
       }else{
           return redirect('client.auth.forget')->with('error', 'vui long nhap lai email vi link nay da qua han');
       }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/client/logout');
    }
    public function reset()
    {
        return view('client.auth.reset');
    }

}
