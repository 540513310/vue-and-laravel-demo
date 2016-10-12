{{-- Carousel 组件，需要 Bootstrap 与 JQuery --}}

<!-- banner轮播 -->
<div class="main-banner" id="mainBanner">
    <!-- 占位，用于显示下面的背景 -->
    <div class="main-placheholder">
        <!-- 显式轮播图 -->
        <div class="main-article-head">
            <!--<img src="img/banner/main_banner_1.jpg" alt="替换轮播">-->
        </div>

        <div class="banner">
            <!--<img src="img/banner-news.png" alt="热点图片">-->

            <!-- Carousel slider -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="http://xjxx-website.gz.bcebos.com/resources/main_banner_1.png" >
                        {{--<img src="img/banner/main_banner_1.png" >--}}
                    </div>

                    <div class="item">
                        <img src="http://xjxx-website.gz.bcebos.com/resources/main_banner_2.png" >
                        {{--<img src="img/banner/main_banner_2.png" >--}}
                    </div>

                    <div class="item">
                        <img src="http://xjxx-website.gz.bcebos.com/resources/main_banner_3.png" >
                        {{--<img src="img/banner/main_banner_3.png" >--}}
                    </div>

                    <div class="item">
                        <img src="http://xjxx-website.gz.bcebos.com/resources/main_banner_4.png" >
                        {{--<img src="img/banner/main_banner_4.png" >--}}
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <!-- Carousel slider end -->

        </div>


    </div>
</div>


