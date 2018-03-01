<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class CommentController extends Controller
{
    //增加评论

    public function store(Article $article)
    {
        $this->validate(request(),['body' => 'required|min:2']);
        $article->addComment();

        return back();
    }
}
