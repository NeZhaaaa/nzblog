@extends('layouts.master') 
@section('left-content') 

@isset($content_title)
{{--  <div class="alert alert-success" role="alert"><h3>{{ $content_title }}</h3></div>  --}}
<h3><span class="label label-default">{{ $content_title }}</span></h3>
<br>
@endisset

@if (count($articles) == 0)
    <h3>Sorry,还没有相关文章哦</h3>
@endif

@foreach ($articles as $article)
<div class="article-preview">
    @if (isset($article->subject))
    <a href="/subject/{{ $article->subject->id }}" class="ap-subject"><span class="label label-warning">专题：{{ $article->subject->name }}</span></a>
    @endif
    <h3>
        <a class="ap-title" href="/article/{{ $article->id }}">{{ $article->title }}</a>
    </h3>
    <div class="ap-des">
        <ul class="list-inline">
            <li><span class="glyphicon glyphicon-user"></span>&nbsp;{{ $article->author }}</li>
            <li><span class="glyphicon glyphicon-time"></span>&nbsp;{{  explode(' ',$article->created_at)[0] }}</li>
            <li><span class="glyphicon glyphicon-bookmark"></span>&nbsp;<a href="/category/{{ $article->category->id }}">{{ $article->category->name }}</a></li>
            <li>
                <span class="glyphicon glyphicon-tags"></span> 
                    @foreach ($article->tags as $tag)

                    &nbsp;<a href="/tag/{{ $tag->name }}">{{ $tag->name }}</a>
                         
                    @endforeach
            </li>
        </ul>
    </div>
    <div class="ap-content row">
        <div class="col-sm-4">
            <a href="#" class="thumbnail">
                <img src="http://image.golaravel.com/e/09/f05fc8d95497bad948ac46eb68d9d.jpg" alt="...">
            </a>
        </div>
        <div class="col-sm-8">
            <p>{{ mb_substr($article->body,0,200) }}</p>
            <div class="row">
                    <div class="col-xs-9 col-sm-9">
                    </div>
                    <div class="col-xs-1 col-sm-1">
                        <a type="button" class="btn btn-primary btn-full-text" href="/article/{{ $article->id }}">阅读全文</a>
                    </div>
                  </div>
        </div>
        
    </div>
    
</div>
@endforeach
@if ($articles->links() != '')
<div class="list-dv-page">
        <nav aria-label="test" class="pagination">
            {{ $articles->links() }}
        </nav>
</div>    
@endif

@endsection