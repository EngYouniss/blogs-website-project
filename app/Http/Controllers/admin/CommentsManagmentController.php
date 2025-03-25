<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Comment;
use Illuminate\Http\Request;

class CommentsManagmentController extends Controller
{
    public function index(){
        $comments=Comment::with(['user','article'])->get();

        return view('admin.view_comments')->with('allcomments',$comments);
    }

  

    public function approveComment($id){
        $comment=Comment::find($id);
        $comment->status=1;
        $comment->save();
        return redirect()->back();
    }

    public function disapproveComment($id){
        $comment=Comment::find($id);
        $comment->status=0;
        $comment->save();
        return redirect()->back();
    }

    public function deleteComment($id){
        $comment=Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }

   }
