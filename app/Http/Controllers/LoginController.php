<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function loginproses(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('dashboard')->with('success', 'Login berhasil!');
            } elseif ($user->role == 'user') {
                return redirect()->route('frdakur')->with('success', 'Login berhasil!');
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }
    public function register()
    {
        return view('admin.register');
    }
    public function registeruser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'is_approved' => false,
            'remember_token' => Str::random(60),
        ]);
        return redirect('login')->with('success', 'Registrasi berhasil! Silakan login setelah akun Anda disetujui oleh admin.');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
