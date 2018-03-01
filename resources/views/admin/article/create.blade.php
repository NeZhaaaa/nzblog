@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增一篇文章</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/article') }}" method="POST">
                        {!! csrf_field() !!}

                        <div class="form-group">
                                <label for="title">文章标题</label>
                                <input type="text" class="form-control" name="title"  required>
                        </div>

                        <div class="form-group">
                                <label for="author">作者</label>
                                <input type="text" class="form-control" name="author"  required >
                        </div>

                        <div class="form-group">
                                <label for="category">分类</label>
                                <input type="text" class="form-control" name="category_id" required >
                        </div>

                        <div class="form-group">
                                <label for="body">文章内容</label>
                                <textarea type="text"  rows="10" class="form-control" name="body" required ></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection