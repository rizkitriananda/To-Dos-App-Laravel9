<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
   public function index()
   {
      return view('login');
   }

   public function register()
   {
      return view('register');
   }

   public function authenticate(Request $request)
   {
      $credentials = $request->validate([
         'username' => 'required',
         'password' => 'required'
      ]);

      if (Auth::attempt($credentials)) {
         $request->session()->regenerate();
         return redirect()->intended('/posts');
      }

      return back()->with('loginFailed', 'Login Failed!');
   }

   public function logout(Request $request)
   {
      Auth::logout();

      // Agar session tidak bisa digunakan
      $request->session()->invalidate();
      // buat baru agar tidak bisa dibajak
      $request->session()->regenerate();

      return redirect('/');
   }
}
