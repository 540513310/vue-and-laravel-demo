<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">小镜秀秀</a>
        </div>

        {{--<div class="collapse navbar-collapse collapse" id="app-navbar-collapse">--}}
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">

            <ul class="nav navbar-nav">
                <li class=""><a href="/admin">管理首页</a></li>
            </ul>

            <!-- Left Side Of Navbar -->
            @if(Auth::check())
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/partner') }}">合作伙伴</a></li>
                <li><a href="{{ url('/article/edit') }}">文章管理</a></li>
            </ul>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">登录</a></li>
                    <li><a href="{{ url('/register') }}">注册</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>退出账号</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>


    </div>
</nav>

<nav class="placeholder-nav" style="height: 70px"></nav>
