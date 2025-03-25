<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\admin\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APINewsController extends Controller
{
    public function APINews()
    {
        $news = Article::select('title as article title')->with('category')->get();
        return response($news);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid email or password'
            ], 401);
        }

        $user = Auth::user()(['id', 'name', 'email']); // فقط البيانات الضرورية

        $token = Auth::user()->createToken('userToken')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'token' => $token
        ], 200);
    }



}
