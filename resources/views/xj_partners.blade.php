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
    <link rel="stylesheet" href="css/xj_partners.css">
    <title>小镜秀秀-合作伙伴</title>
</head>
<body>
{{-- 导航组件 --}}
@include('components.headNavgitor')

@include('components.carousel')

<!-- 主要内容 -->
<div id="main-content">

    <!-- 主题列表 -->
    <div class="corps-group clearfix">

        <!-- 标头 -->
        <div class="header">
            <img src="img/header-corps.png" alt="news_focus">
        </div>

        <!-- 合作伙伴 -->
        <div class="section clearfix">

            <!-- 配图 -->
            <ul class="items figures">

                @foreach( $partners as $partner)
                    <li>
                        <a href="">
                            <img src={{ 'http://xjxx-website.gz.bcebos.com/partners/'.urlencode($partner->BOS_key) }} alt={{ $partner->name }}></a>
                    </li>

                @endforeach

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
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>

