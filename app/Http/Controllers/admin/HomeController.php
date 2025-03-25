<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Article;
use App\Models\admin\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewmaster()
    {
        return view('user.layout.master');
    }
    function index()
    {
        $comments = Comment::get();
        $articles = Article::get();
        $latestarticles = Article::latest()->take(2)->get();
        $pendingarticles = Article::where('status', 0)->get();
        $users = User::get();
        return view('admin.home')->with('all_articles', $articles)->with('all_comments', $comments)
        ->with('all_users', $users)->with('allpendingarticles', $pendingarticles)->with('latestarticle', $latestarticles);
    }

}
