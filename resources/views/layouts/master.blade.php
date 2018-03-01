<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blog</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/css/index.css" rel="stylesheet">
</head>
<body>
    {{-- 顶部导航栏 --}}
    @include('layouts.nav') 
   
    <div class="container">
        <div class="row">
             {{-- 左部内容区 --}}
            <div class="col-xs-12 col-md-12 col-lg-8">

                @yield('left-content') 

            </div>
            
            {{-- 右边内容区 --}}
            @include('layouts.right')
        </div>
    </div>

    {{-- 底部信息 --}}
    @include('layouts.footer')

</body>
</html>