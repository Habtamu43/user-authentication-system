<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ConfirmablePasswordController extends Controller
{
    public function show()
    {
        return view('auth.confirm-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'password' => ['required'],
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            $request->session()->put('password_confirmed_at', now());
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'password' => 'The password is incorrect.',
        ]);
    }
}
