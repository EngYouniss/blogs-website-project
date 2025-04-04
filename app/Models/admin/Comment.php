<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function article(){
        return $this->belongsTo(Article::class,'article_id');
    }
}
