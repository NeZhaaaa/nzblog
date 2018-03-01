@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">文章列表</div>

                <div class="panel-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! -->
                    <ul>
                        
                    @foreach ($articles as $article)
                        <li style='margin:50px 0;'>
                            <div class='title'>
                                <a href="{{ url('article/' . $article->id) }}">
                                    <h4>{{ $article->title }}</h4>
                                </a>
                            </div>
                            <div class="body">
                                <p>{{ $article->body }}</p>
                            </div>
                        </li>
                    @endforeach    
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
