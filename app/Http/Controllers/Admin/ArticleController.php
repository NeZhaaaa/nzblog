<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    /**
     * 展示文章列表
     *
     * @return 文章列表视图
     */
    public function index()
    {
        return view('admin/article/index')->withArticles(Article::all());
    }

    /**
     * 新建一篇文章界面
     *
     * @return 新建文章视图
     */
    public function create()
    {
        return view('admin/article/create');
    }

    /**
     * 创建一篇文章的请求
     *
     * @param Request $request
     * @return 返回文章列表界面并提示结果
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:255',
            'author' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        Article::create(request(['title', 'author', 'body', 'category_id', 'extra']));
        
        return redirect('/');
    }

    //展示一篇文章
    public function show(Article $article)
    {
        $comments = $article->comments;
        return view('index.article',compact('article','comments'));
    }

    public function edit($id){

        return view('admin/article/edit')->withArticle(Article::find($id));
    }
}
