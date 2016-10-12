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
    <title>小镜秀秀-3D虚拟试衣间，让手机变成您的私人试衣镜！</title>
</head>
<body>
{{-- 导航组件 --}}
@include('components.headNavgitor')

{{-- 轮播组件 --}}
@include('components.carousel')

<!-- 公司介绍 -->
<div class="main-head">
    <!-- 介绍 -->
    <div class="details">
        <h1>
            小镜秀秀
        </h1>
        <p>
            是由广州帕克西软件开发有限公司自主研发的一款<strong>3D虚拟试穿试戴系统软件</strong>，产品于2015年9月成功上线，主要包括眼镜试戴、发型试戴、珠宝试戴和服装试穿四个方面。
        </p>
    </div>
</div>


<div class="article-product bottom-shadow " id="glass">
    <div class="product-head">
        <h1>眼镜试戴</h1>
    </div>


    <div class="product mobile" >
        <div class="figure">
            <ul>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/mobile_info_4.png" alt="mobile1"></li>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/mobile_info_2.png" alt="mobile1"></li>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/mobile_info_6.png" alt="mobile1"></li>
            </ul>
        </div>
        <div class="figureCaption">
            <ul>
                <li>
                    <h1><strong>最真实</strong>的试戴效果 </h1>
                    <ul>
                        <li>
                            独创PBR渲染引擎技术
                        </li>
                        <li>
                            真人3D动态试戴
                        </li>
                        <li>
                            全方位立体展示
                        </li>
                    </ul>
                </li>
                <li>
                    <h1><strong>最合适</strong>的眼镜尺寸</h1>
                    <ul>
                        <li>
                            精准测量面部尺寸
                        </li>
                        <li>
                            （瞳距、外眼角宽、鼻梁宽等）
                        </li>
                        <li>
                            推荐最舒适款型
                        </li>
                    </ul>
                </li>
                <li>
                    <h1><strong>最神奇</strong>的扫码试戴</h1>
                    <ul>
                        <li>
                            扫一扫淘宝电商二维码
                        </li>
                        <li>
                            轻松试戴，多款对比
                        </li>
                        <li>
                            告别选择困难症
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>

    <div class="product second">
        <div class="figure">
            <ul>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/mobile_info_1.png" alt="mobile1"></li>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/mobile_info_5.png" alt="mobile1"></li>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/mobile_info_3.png" alt="mobile1"></li>
            </ul>
        </div>
        <div class="figureCaption">
            <ul>
                <li>
                    <h1><strong>最时尚</strong>的眼镜搭配
                    </h1>
                    <ul>
                        <li>
                            脸型识别寻找同款明星脸
                        </li>
                        <li>
                            搭配时尚眼镜不纠结
                        </li>
                    </ul>
                </li>
                <li>
                    <h1><strong>最贴心</strong>的分享功能</h1>
                    <ul>
                        <li>
                            美图自拍一键分享
                        </li>
                        <li>
                            活跃社交圈
                        </li>
                    </ul>
                </li>
                <li>
                    <h1><strong>最方便</strong>的购买服务</h1>
                    <ul>
                        <li>
                            足不出户
                        </li>
                        <li>
                            试遍眼镜专柜
                        </li>
                        <li>
                            淘宝链接直接下单
                        </li>
                        <li>
                            轻松购买
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>

</div>


<!-- 中间插图 -->
<div class="main-head inter-picture-n1">
</div>


<div class="article-product bottom-shadow hair" id="hair">
    <div class="product-head">
        <h1>发型试戴</h1>
    </div>


    <div class="product">
        <div class="figure">
            <ul>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/hair_info_1.png" alt="mobile1"></li>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/hair_info_2.png" alt="mobile1"></li>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/hair_info_3.png" alt="mobile1"></li>
            </ul>
        </div>
        <div class="figureCaption">
            <ul>
                <li>
                    <h1><strong>真人3D动态试戴</strong></h1>
                    <ul>
                        <li>
                            领先的头部追踪技术
                        </li>
                        <li>
                            采用PBR渲染引擎
                        </li>
                        <li>
                            360°查看试戴效果
                        </li>
                    </ul>
                </li>
                <li>
                    <h1><strong>最佳潮流发型体验</strong></h1>
                    <ul>
                        <li>
                            丰富造型库满足个性需要
                        </li>
                        <li>
                            轻松匹配最合适的发型
                        </li>
                    </ul>
                </li>
                <li>
                    <h1><strong>炫彩发色随心变换</strong></h1>
                    <ul>
                        <li>
                            专属彩色发型库提供DIY染发
                        </li>
                        <li>
                            打造肤色与发色的完美搭配
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>

    <div class="product second">
        <div class="figure">
            <ul>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/hair_info_4.png" alt="mobile1"></li>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/hair_info_5.jpg" alt="mobile1"></li>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/hair_info_6.png" alt="mobile1"></li>
            </ul>
        </div>
        <div class="figureCaption">
            <ul>
                <li>
                    <h1><strong>美发门店轻松查找</strong>
                    </h1>
                    <ul>
                        <li>
                            迅速定位周边知名美发门店
                        </li>
                        <li>
                            详尽的门店地址和联系方式
                        </li>
                        <li>
                            量身定制出行路线
                        </li>
                    </ul>
                </li>
                <li>
                    <h1><strong>美发资讯尽在掌握</strong></h1>
                    <ul>
                        <li>
                            最新的美发资讯和流行发型
                        </li>
                        <li>
                            走在时尚最前端
                        </li>
                    </ul>
                </li>
                <li>
                    <h1><strong>线上线下优惠一网打尽</strong></h1>
                    <ul>
                        <li>
                            线上线下知名美发优惠全了解
                        </li>
                        <li>
                            有限价格打造无限美丽
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>

</div>


<!-- 中间插图 -->
<div class="main-head inter-picture-n2">
</div>


<div class="article-product bottom-shadow jewel" id="jewel">
    <div class="product-head">
        <h1>珠宝试戴</h1>
    </div>


    <div class="product">
        <div class="figure">
            <ul>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/jewel_info_1.png" alt="mobile1"></li>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/jewel_info_2.png" alt="mobile1"></li>
            </ul>
        </div>
        <div class="figureCaption">
            <ul>
                <li>
                    <h1><strong>告别2D
                        </strong>拍照静态匹配</h1>
                    <h2>开启3D真人动态试戴</h2>
                    <ul>
                        <li>
                            不拍照无需调整图片大小
                        </li>
                        <li>
                            360°呈现试戴效果
                        </li>
                        <li>
                            全方位立体体验
                        </li>
                    </ul>
                </li>
                <li>
                    <h1>提供<strong>私人订制
                        </strong>搭配建议</h1>
                    <h2>
                        实时分享动态轻松互动
                    </h2>
                    <ul>
                        <li>
                            提供多款珠宝饰品款式、颜色等搭配建议
                        </li>
                        <li>
                            轻松匹配最合适的发型
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>

    <div class="product second">
        <div class="figure">
            <ul>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/jewel_info_3.png" alt="mobile1"></li>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/jewel_info_4.png" alt="mobile1"></li>
            </ul>
        </div>
        <div class="figureCaption">
            <ul>
                <li>
                    <h1>定位<strong>周边名店及其库存
                        </strong></h1>
                    <h2>
                        掌握线上线下最新资讯
                    </h2>
                    <ul>
                        <li>
                            自动定位周边店铺
                        </li>
                        <li>
                            查询店内及周边的库存情况
                        </li>
                        <li>发布品牌珠宝、新潮饰品新资讯</li>
                        <li>把握时尚潮流脉搏</li>
                    </ul>
                </li>
                <li>
                    <h1>解决<strong>线上试戴体验难题
                        </strong></h1>
                    <h2>心仪饰品迅速收入囊中</h2>
                    <ul>
                        <li>集互动、交流、购买于一体</li>
                        <li>
                            试戴满意即可在线购买、预留商品
                        </li>
                        <li>
                            时尚新品琳琅满目任你挑
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>

</div>


<!-- 中间插图 -->
<div class="main-head inter-picture-n3">
</div>


<div class="article-product bottom-shadow cloth" id="cloth">
    <div class="product-head">
        <h1>服装试穿
        </h1>
    </div>


    <div class="product">
        <div class="figure">
            <ul>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/cloth_info_1.png" alt="mobile1"></li>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/cloth_info_2.png" alt="mobile1"></li>
                <li><img src="http://xjxx-website.gz.bcebos.com/resources/figures/cloth_info_3.png" alt="mobile1"></li>
            </ul>
        </div>
        <div class="figureCaption">
            <ul>
                <li>
                    <h1><strong>自动扫描</strong>体型参数</h1>
                    <h2>真人面貌增强体验</h2>
                    <ul>
                        <li>
                            摄像头直接扫描顾客身材
                        </li>
                        <li>
                            精准生成参数
                        </li>
                        <li>
                            采用真人面貌
                        </li>
                        <li>
                            增强试穿体验
                        </li>
                    </ul>
                </li>
                <li>
                    <h1><strong>任意调整</strong>衣服 <strong>尺寸</strong></h1>
                    <h2>精准展现试穿效果</h2>
                    <ul>
                        <li>
                            调整衣长、袖长、肩宽、腰围等参数
                        </li>
                        <li>
                            细微变化立即呈现
                        </li>
                        <li>
                            试衣效果精准展现
                        </li>
                    </ul>
                </li>
                <li>
                    <h1>款式面料<strong>随意组合</strong></h1>
                    <h2>私人订制合身服装</h2>
                    <ul>
                        <li>
                            各种款式和面料花色任意组合
                        </li>
                        <li>
                            根据身材调整样衣版型
                        </li>
                        <li>
                            满足个性化需求
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>

</div>


<!-- 中间插图 -->
<div class="main-head inter-picture-n4">
</div>

<!--关于-->
<div class="article-product bottom-shadow about" id="aboutUs">
    <div class="product-head">
        <h1>关于我们
        </h1>
    </div>


    <div class="product">
        <div class="figure">
            <iframe src="baidu_map" frameborder="0" height="450"  width="606"></iframe>
        </div>
        <div class="figureCaption">
            <div class="about-us">
                <p class="sum">目前，小镜秀秀2.2.0版本已经发布,新的版本升级了3D真人动态试戴的功能，还加入了扫二维码轻松试戴眼镜的功能。能够精确的完成用户面部尺寸测量、在线3D眼镜试戴体验。使用手机下载小镜秀秀APP即可体验眼镜试戴效果。
                </p>
                <div class="scan">
                    <ul>
                        <li>
                            <img src="img/scancode.png" alt="scan-code">
                        </li>
                    </ul>
                </div>

                <p class="address">
                    公司地址：广东省广州市天河区科韵路62号五华大厦210
                </p>
            </div>
        </div>
    </div>

</div>

@include('components.footer')

<div id="backTop">
    <a href="#header-bar">^</a>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/index.js?version=1"></script>
</body>
</html>

