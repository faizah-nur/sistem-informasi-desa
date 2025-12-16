<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;
use App\Mail\Websitemail;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function login(){
        return view('admin.login');
    }
public function login_submit(Request $request)
{
    //dd($request->all());
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $check = $request->all();
    $data = [
        'email' => $check['email'],
        'password' => $check['password'],
    ];

    if(Auth::guard('admin')->attempt($data)) {
        // regenerate session to prevent fixation
        $request->session()->regenerate();
        return redirect()->route('admin_dashboard')->with('success','Login Successfull');
    } else {
        return redirect()->route('admin_login')->with('error','Invalid Credentials');
    }
}
public function logout(Request $request){
    Auth::guard('admin')->logout();

    // invalidate session and regenerate CSRF token
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin_login')->with('success', 'Logout successfully');
}
public function forget_password(){
    return view('admin.forget-password');
}
public function forget_password_submit(Request $request){
$request->validate([
    'email' => 'required|email',
]);

$admin_data = Admin::where('email',$request->email)->first();
if(!$admin_data) {
    return redirect()->back()->with('error','Email not found');
}

$token = hash('sha256',time());
$admin_data->token = $token;
$admin_data->update();

$reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
$subject = "Reset Password";
$message = "Please click on below link to reset your password<br><br>";
$message .= "<a href='".$reset_link."'>Reset Here</a>";

Mail::to($request->email)->send(new Websitemail($subject,$message));

return redirect()->back()->with('success','Reset password link sent on your email');
}
}