<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    // Redirect path after registration
    protected $redirectTo = '/dashboard';

    // Constructor to apply guest middleware
    public function __construct()
    {
        $this->middleware('guest');
    }

    // Show the registration form
    public function create()
    {
        return view('auth.register');
    }

    // Handle the registration request
    public function store(Request $request)
    {
        // Validate the registration form data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in after registration
        Auth::login($user);

        // Redirect to the dashboard after successful registration and login
        return redirect($this->redirectTo)->with('status', 'Registration successful. You are now logged in.');
    }
}

