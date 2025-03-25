<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
    function login()
    {
        return view('admin.login');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function HandleRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            $user->addRole('user');
            // Mail::to($request->email)->send(new WelcomeEmail());

            return redirect()->route('login')->with('success', 'Registration successful. Please login.');
        }

        return redirect()->back()->with('error', 'Registration failed. Please try again.');

    }

    public function HandleLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'The email field is required.',
            'password.required' => 'The password field is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $isLogged = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if ($isLogged) {
            if (Auth::user()->hasRole('super_admin')) {
                return redirect()->route('AdminHomePage');
            } elseif (Auth::user()->hasRole('content_manager')) {
                return redirect()->route('AdminHomePage');
            } elseif (Auth::user()->hasRole('user')) {
                return redirect()->route('UserHomePage');
            }

        }

        return redirect()->back()->with('error', 'Incorrect email or password!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}
