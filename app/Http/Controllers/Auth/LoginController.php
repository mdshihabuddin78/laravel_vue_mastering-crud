<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Mime\Header\all;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function doLogin(Request $request){
        $crediantials = $request->except('_token');
        $auth = Auth::attempt($crediantials);
        if ($auth){
            return redirect('/admin/dashboard');
        }
        return redirect('/login')->with('error','Username or Password invalid');

    }
}
