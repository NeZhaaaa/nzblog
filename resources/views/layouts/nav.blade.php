{{--  <nav class="navbar navbar-inverse navbar-fixed-top">
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
                    <li class="active">
                        <a href="/">首页</a>
                    </li>
                    @foreach ($categories as $category)
                    <li>
                        <a href="/category/{{ $category->id }}">{{ $category->name }}</a>
                    </li> 
                    @endforeach
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>  --}}

    <header id="b-public-nav" class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Nezhaaaa Blog</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav b-nav-parent">
                        <li class="hidden-xs b-nav-mobile"></li>
                        <li class="b-nav-cname {{ isset($category)?'':'active'}} ">
                        <a href="/">首页</a>
                        </li>
                        @foreach ($categories as $c)
                    <li class="{{ isset($category)&&$category->name == $c->name?'active':''}}">
                        <a href="/category/{{ $c->id }}">{{ $c->name }}</a>
                    </li> 
                    @endforeach
                        </ul>
                </div>
            </div>
        </header>