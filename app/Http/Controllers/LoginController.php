<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function store(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))){
            return('gagal');
        }

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin');
        }

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if (Auth::user()->role == 'client') {
            return redirect()->route('dashboard');
        }

        return redirect()->route('dashboard');

    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
