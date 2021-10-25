<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        if(Auth::check()){
            return redirect()->to('home');
        }
        return view('admin.login');
    }

    public function postloginAdmin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)){
            return redirect()->to('home');
        }
    }
}
