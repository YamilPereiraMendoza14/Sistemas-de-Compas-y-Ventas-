<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'usuario'=>'required|string',
            'password'=>'required|string'
        ]);
        if(Auth::attempt(['usuario'=>$request->usuario,'password'=>$request->password,'condicion'=>1])){
            return redirect()->route('home');
        }
        return back()->withErrors(['usuario'=>trans('auth.failed')])->withInput();
    }
}
