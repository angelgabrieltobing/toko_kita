<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            
            // Redirect berdasarkan ROLE - LANGSUNG KE HALAMAN YANG SESUAI
            if ($user->role == 'admin') {
                return redirect('/produk');
            } 
            elseif ($user->role == 'customer') {
                return redirect('/produk');
            }
            elseif ($user->role == 'pustakawan') {
                return redirect('/buku');
            }
            elseif ($user->role == 'anggota') {
                return redirect('/buku');
            }
            else {
                return redirect('/');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}