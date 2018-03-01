<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;
use App\Category;
use App\Subject;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleController extends Controller
{
    /**
     * 展示文章列表
     *
     * @return 文章列表视图
     */
    public function index()
    {
        $articles = Article::latest()
            ->with('tags')
            ->with('category')
            ->with('subject')
            ->DateFilter(['year' => request('year'), 'month' => request('month')])
            ->paginate(5);
 
        return view('index.index',compact('articles'));
    }

    /**
     * 按标签展示文章列表
     *
     * @param Tag $tag
     * @return void
     */
    public function tag_index(Tag $tag)
    {
        $articles = new LengthAwarePaginator(
            $tag->articles,
            $tag->articles->count(),
            10);

        $content_title = '标签：'.$tag->name . '，共' . $articles->total() . '篇文章';

        return view('index.index',compact('articles', 'content_title'));
    }

    /**
     * 按专题显示文章列表
     *
     * @param Category $category
     * @return void
     */
    public function category_index(Category $category)
    {
        $articles = new LengthAwarePaginator(
            $category->articles,
            $category->articles->count(),
            10);

        $content_title = '分类：'.$category->name . '，共' . $articles->total() . '篇文章';

        return view('index.index',compact('articles','category', 'content_title'));
    }

     /**
     * 按专题显示文章列表
     *
     * @param Category $category
     * @return void
     */
    public function subject_index(Subject $subject)
    {
        $articles = new LengthAwarePaginator(
            $subject->articles,
            $subject->articles->count(),
            10);

        $content_title = '专题：' . $subject->name . '，共' . $articles->total().'篇文章';

        return view('index.index',compact('articles','category','content_title'));
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
            'body' => 'required',
            'category' => 'required',
        ]);

        $data = request(['title', 'body', 'category', 'extra']);
        $data['author'] = config('admin.author');
        Article::create($data);
        
    }

    /**
     * 展示文章详情
     *
     * @param Article $article
     * @return view
     */
    public function show(Article $article)
    {
        $comments = $article->comments;

        $preview = $article->getPreview();

        $next = $article->getNext();

        return view('index.article',compact('article','comments','preview','next'));
    }

}
