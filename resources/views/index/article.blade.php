@extends('layouts.master')

@section('left-content')
    <div class="article-container">
            <h1>{{ $article->title }}</h1>
            <br>
            <ul class="list-inline">
                    <em>Post at {{ $article->created_at }} by <a href="">{{ $article->author }}</a> </em>
                    <li><span class="glyphicon glyphicon-bookmark"></span>&nbsp;<a href="/category/{{ $article->category->id }}">{{ $article->category->name }}</a></li>
                    <li>
                        <span class="glyphicon glyphicon-tags"></span> 
                            @foreach ($article->tags as $tag)
        
                            &nbsp;<a href="/tag/{{ $tag->name }}">{{ $tag->name }}</a>
                                 
                            @endforeach
                    </li>
            </ul> 
            <hr>
            <p>{!! $article->body !!}</p>
    </div>
    
    <hr>

    <div class="next" style="margin-bottom:20px;">
            上一篇：
            @if (isset($preview))
            <a href="/article/{{ $preview->id }}">{{ $preview->title }}</a>
            @else
            没有了    
            @endif
            <br>
            下一篇：
            @if (isset($next))
            <a href="/article/{{ $next->id }}">{{ $next->title }}</a>
            @else
             没有了    
            @endif
    </div>

    {{--  评论区  --}}
    <h3>评论</h3>
    <hr>
    @if(count($comments) == 0) 
           暂无评论
       @endif
    <ul class="list-group" style='margin-top:20px;'>
        @foreach ($comments as $comment)
            <li class="list-group-item  dv-comment">
                <div class="media">
                        <div class="media-left">
                        <a href="#">
                            <img class="media-object comment-avator" src="{{ $comment->avator_url }}" alt="...">
                        </a>
                        </div>
                        <div class="media-body">
                        <h5 class="media-heading" style="color:#337ab7;">{{ $comment->user_name }}<span class="sp-post-time">{{ $comment->created_at }}</span></h5>
                        {{ $comment->body }}
                        </div>
                </div>
            </li>
        @endforeach 
    </ul>

    <hr>
    @if (session('user_name'))
        <div class="card">
            <div class="card-block">
                <form action="/article/{{ $article->id }}/comments" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea placeholder='添加你的评论吧' rows="5" class="form-control" name="body" required></textarea>
                    </div>
        
                    <button type="submit" class="btn btn-primary">添加评论</button>
                </form>
            </div>
        </div>
    @else
    <div class="panel panel-default">
            <div class="panel-body">
              请先 <a href="/oauth/git">登录</a> 再进行评论
            </div>
    </div>
    @endif

@endsection