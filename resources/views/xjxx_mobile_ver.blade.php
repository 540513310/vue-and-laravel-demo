<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicons/favicon.ico" type="image/x-icon">
    <title>小镜秀秀-手机版下载</title>
    <link rel="stylesheet" href="css/muiltTriangle.css">
    <style>
        .main #product-detail .download-block a.down-button {
            /* 两个下载按钮 */
            width: 7em;
            margin: 0 .5em;
            font-size: 2em;
            flex: 0 0 40%;
        }

        .main #product-detail .download-block {
            min-width: 42em;
        }

        .main #app-img img {
            background-color: transparent;
            box-shadow: none;
            height: 30.5em;
        }

        .main #product-detail .head-detail {
            align-self: center;
        }
    </style>
</head>
<body>

<div id="container">

    <div class="header">
        <a href="/">
            <img class="logo" src="img/xj_logo/120-120.png" alt="xj_logo">
            <h1>小镜秀秀</h1>
            <h2>手机版</h2>
        </a>
    </div>

    <div class="main">
        <!-- 展示图片 -->
        <div id="app-img">
            <img src="img/mobile_preview.png" alt="mobile_preview" >
        </div>

        <!-- 产品信息 -->
        <div id="product-detail" >

            <!-- 产品标题 -->
            <div class="head-detail">
                <h1>手机版</h1>
                <h2>随时随地  试穿试戴</h2>
                <ul>
                    <li >
                        选眼镜，自动匹配最佳款式
                    </li>
                    <li >
                        换发型，实时呈现动态效果
                    </li>
                    <li >
                        戴珠宝，海量款式任你选择
                    </li>
                    <li>
                        试服装，轻松选购完美商品
                    </li>
                </ul>
            </div>

            <!-- 下载区块 -->
            <div class="download-block">
                <a href="http://xjxx-website.gz.bcebos.com/packages/xiaojingxiuxiu_v2.2.2.10_jiagu_sign.apk" class="down-button">Android下载</a>
                <a href="https://itunes.apple.com/cn/app/xiao-jing-xiu-xiu/id1088740039?mt=8" class="down-button">IOS下载</a>
                <div class="update-detail">
                    <span>大小：36.3MB </span>
                    <span>更新日期：2016/08/01</span>
                </div>
                <div class="update-detail">
                    <span>大小：105MB</span>
                    <span>更新日期：2016/04/06</span>
                </div>
            </div>
        </div>

    </div>

    <div id="anitOut" data-ver="moblie">
        <!-- muiltTriangle canvas here -->
    </div>
    <div id="noise">
        <!-- nosie cover-->
    </div>

</div>
    <script type="text/javascript" src="/js/multiTriangle.js"></script>
</body>
</html>