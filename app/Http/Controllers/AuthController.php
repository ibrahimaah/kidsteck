<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|exists:roles,id',
        ], [], __('validation.attributes'));
        
         // Create user
        $user = User::create([
            'name' => $request->name,
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role
        ]);

        // Auto-login user and redirect (or redirect to login)
        Auth::login($user);

        return redirect()->route('home');

    }
   

      // Handle login request
      public function login(Request $request)
      {
          $request->validate([
              'email' => 'required|email',
              'password' => 'required',
          ], [], __('validation.attributes'));
  
          if (Auth::attempt($request->only('email', 'password'))) 
          {
              return redirect()->route('home');
          }
  
          return back()->withErrors(['email' => 'بيانات تسجيل الدخول غير صحيحة']);
      }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
