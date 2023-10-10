<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Pengguna berhasil login
            return redirect('dashboard');
        } else {
            // Otentikasi gagal, lakukan sesuatu di sini (misalnya, tampilkan pesan kesalahan)
            return redirect('login')->with('error', 'Email atau kata sandi salah');
        }
    }

    public function logout (Request $request){
        Auth::logout();
        return redirect('login');
    }
    

}