<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    #show registration form
    public function create()
    {
        return view('user.register');
    }

    #store new user
    // Create New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('jobatho_users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User using the User model
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    #user log out
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    #user log-in form/ user login
    public function enter()
    {
        return view('user.login');
    }

    #user login
    public function login(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required|min:6',
        ]);

        // Use the User model to retrieve the user
        $user = User::where('email', $formFields['email'])->first();

        if ($user && password_verify($formFields['password'], $user->password)) {
            auth()->login($user);
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are logged in!');
        } else {
            return back()->withErrors(['email' => 'Invalid Email'])->onlyInput('email');
        }
    }
}
