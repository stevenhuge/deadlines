<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    public function index() {
        return view('superadmin.dashboard');
    }

    public function user() {
        $data = User::all();
        return view('superadmin.user', compact('data'));
    }

    public function destroy(int $id) {
        User::where('id', $id)->delete();
        return redirect()->route('user');
    }
}
