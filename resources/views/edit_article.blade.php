<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>文章管理</title>
    <link rel="stylesheet" href={{ url('/css/bootstrap.min.css') }}>
    <style>
        * {
            font-family: '微软雅黑';
        }

        .article-list button {
            margin-left: 1rem;
            border-radius: 3px;
            color: teal;
        }

        tbody tr td a {
            color: #311B92;
            font-size: 1em;
            margin-right: 1.5em;
        }

    </style>
</head>
<body>

    @include('components.adminHeader')

    <div class="container theme-showcase" role="main">
        <div class="jumbotron">
            <h2>新闻管理</h2>
            <p>新增、修改或删除文章</p>
            <p class="add">
                <a href="/article"><button type="button" class="btn btn-lg btn-success">添加新文章</button></a>
            </p>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>文章名</th>
                    <th>更新时间</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $articles as $article)
                <tr>
                    <td>
                       <span>{{ $article->id }}</span>
                    </td>
                    <td>
                        <a href={{ url('xj_article.html?id='.$article->id) }} target="_blank">{{ $article->title }}</a>
                        <a href={{ url('/article/'. $article->id .'/edit') }}><button type="button" class="btn btn-xs btn-info">修改</button></a>
                    </td>
                    <td>
                        <span>{{ $article->updated_at }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>