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
    <title>小镜秀秀-新闻动态</title>
    <style>
        {{-- TODO TEMP for pagination--}}
        @media (min-width: 768px) {
            .col-sm-3 {
                width: 32% !important;
            }
        }
    </style>
</head>
<body>
{{-- 导航组件 --}}
@include('components.headNavgitor')

@include('components.carousel')


<!-- 主要内容 -->
<div id="main-content">

    <!-- 文章区 -->
    <div class="article clearfix">

        <!-- 标头 -->
        <div class="header" id="locat-arti">
            <img src="img/header-news.png" alt="news_focus">
        </div>

        <!-- 文章列表 -->
        <div class="section clearfix">
            <ul class="items">
                @foreach( $articles as $article)
                    <li>
                        <!-- 配图 -->
                        <div class="aside">
                            <a href={{ url('/xj_article.html?id=').$article->id }}>
                                <img src={{ url("http://xjxx-website.gz.bcebos.com/thumbs/".$article->thumbnail)}} alt="thumbnail">
                            </a>
                        </div>

                        <!-- 摘要 -->
                        <div class="digest">
                            <!-- 标题 -->
                            <h1><a href={{ url('/xj_article.html?id=').$article->id }}>{{ $article->title }}</a></h1>

                            {{-- 这个以后要先 预处理 --}}
                            <?php
                                preg_match_all('|<p.*?>([^<].*?)</p>|',$article->content,$contentInPara);
                            ?>
                            <!-- 段落 -->
                            <p>{{ $article->description }}...</p>

                            <!-- 日期 and + 跳转？ -->
                            <div class="article-footer">
                                <span class="date">{{ $article->created_at }}</span>
                                <span class="detail"><a href=""></a></span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- 分页导航 -->
        <div class="container news-paginate">
            <div class="row">
                <div class="col-sm-3 col-sm-offset-9">
                    <nav>
                        {{ $articles->fragment('main-content')->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>

@include('components.footer')

<div id="backTop">
    <a href="#header-bar">^</a>
</div>

<!-- All Script Here -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>

