<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\admin\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
   public $articleId;
    public function store(Request $request,$id)
    {
        $this->articleId=$id;
        $comment=new Comment();
        $comment->user_id=Auth::user()->id;
        $comment->article_id=$this->articleId;
        $comment->comment=$request->comment;
        if($comment->save())
        return redirect()->back();

    }
}
