<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    {{--<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">--}}
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/xj_index.css">
    <link rel="stylesheet" href="css/xj_news.css">
    <style>
        #locat-arti {
            margin-top: 5rem;
        }
    </style>
    <title>小镜秀秀-{{ $article->title }}</title>
</head>
<body>
{{-- 导航组件 --}}
@include('components.headNavgitor')


<!-- 主要内容 -->
<div id="main-content">

    <!-- 文章区 -->
    <div class="article clearfix">

        <!-- 标头 -->
        <div class="header" id="locat-arti">
            <a href="/xj_news.html#main-content">
                <img src="img/header-news.png" alt="news_focus">
            </a>
        </div>


        <!-- 文章列表 -->
        <div class="article-main clearfix">

            <!-- 文章标题 -->
            <div class="header">
                <div class="title">
                    <h1>{{ $article->title }}</h1>

                    <!-- 副标题 -->
                    <section class="details">
                        <ul>
                            {{--<li class="author">作者：嘉兰图设计</li>--}}
                            {{--<li class="source">来源：嘉兰图设计</li>--}}
                            {{--<li class="count">浏览：1338 次</li>--}}
                            <li class="time">发表日期：{{ $article->created_at }}</li>
                            {{--<li class="resize">--}}
                                {{--字体：[--}}
                                {{--<form action="">--}}
                                    {{--<input type="radio" name="set-font" value="large" id="l-font"><label for="l-font" class="active">大</label>--}}
                                    {{--<input type="radio" name="set-font" value="middle" id="m-font"><label for="m-font">中</label>--}}
                                    {{--<input type="radio" name="set-font" value="small" id="s-font"><label for="s-font">小</label>--}}
                                {{--</form>]--}}
                            {{--</li>--}}
                        </ul>
                    </section>
                </div>
            </div>


            <!-- 文章正文 -->
            <div class="article-content">
                  {!! $article->content !!}
            </div>

        </div>

        <!-- 跳转文章 -->
        <div class="article-nav-footer clearfix">
            <ul>
                <li class="page-before">
                    @if(null !== $article->previous())
                        <a href={{ url('/xj_article.html?id='.$article->previous()->id ) }}>上一篇：{{ $article->previous()->title }}</a>
                    @endif
                </li>
                <li class="page-next">
                    @if(null !== $article->next())
                        <a href={{ url('/xj_article.html?id='.$article->next()->id ) }}>下一篇：{{ $article->next()->title }}</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>

</div>

@include('components.footer')

<div id="backTop">
    <a href="#header-bar">^</a>
</div>

<!-- All Script Here -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
