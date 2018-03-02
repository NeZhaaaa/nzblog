<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="#">Nezhaaaa Blog</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ isset($category)?'':'active'}}">
                    <a href="/">首页</a>
                </li>
                @foreach ($categories as $c)
                <li class="{{ isset($category)&&$category->name == $c->name?'active':''}}"">
                    <a href="/category/{{ $c->id }}">{{ $c->name }}</a>
                </li>
                @endforeach
            </ul>
            <div class="dv-login navbar-right dropdown">
                @if (session('user_name'))
                    <a href=""><img src="{{ session('avator_url') }}"alt=""></a>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ session('user_name')  }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="/oauth/logout">退出</a></li>
                    </ul>
                @else
                    <img src="/image/gitlogo.png"alt="">
                    <a href="/oauth/git">登录</a> 
                @endif
            </div>
        </div>

    </div>
    <!--/.nav-collapse -->
    </div>
</nav>
