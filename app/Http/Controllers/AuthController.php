<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('site.auth.login');
    }

    public function showRegisterForm()
    {
        $roles = Role::where('name', '!=', 'child')->where('name', '!=', 'admin')->get();
        return view('site.auth.register',compact('roles'));
    }

    public function register()
    {

    }
    public function login()
    {

    }

    public function logout(Request $request)
    {
        dd('a');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
