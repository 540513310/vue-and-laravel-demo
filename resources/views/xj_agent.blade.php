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
        {{-- TODO TEMP for agent moblie page--}}
        .main-banner,.main-content,.agent-section,.footer {
            min-width: 76em !important;
        }

        #locat-arti {
            margin-top: 5rem;
        }

        #locat-arti .hgroup h1 {
            display: inline-block;
            font-size: 1.55rem;
            margin-left: 2.7em;
            border-right: 2px solid #1d1d1d;
            padding-right: 0.6em;
            background-image: url(http://xjxx-website.gz.bcebos.com/resources/agent/agent_logo.png);
            background-position: left center;
            background-repeat: no-repeat;
            background-origin: border-box;
            border-left: 1.4em solid transparent;
        }

        #locat-arti .hgroup h2 {
            display: inline-block;
            margin: 0;
        }

        #mainBanner {
            margin-bottom: -5rem;
        }

        #main-content {
            width: 76.25em;
        }

        .agent-section {
            width: 100%;
        }

        .agent-section .agent-list .agent-row {
            width: 100%;
        }

        .agent-section .agent-list .agent-row:nth-of-type(odd) {
            background: #f5f5f5;
        }

        .agent-section .agent-list .agent-row .agent-content {
            width: 76.25em;
            margin: auto;
            height: 520px;
        }

        .agent-section .agent-list .agent-row .agent-content h1 {
            text-align: center;
            font-size: 3rem;
            padding: 50px 0;
            color: #fa4900;
        }

        .agent-section .agent-list .agent-row .agent-content .img-row {
            text-align: center;
        }
        .agent-section .agent-list .agent-row .agent-content .fig-captions {
            text-align: center;
        }


        /* 加盟条件 */
        .agent-section .agent-list .agent-row.conditions .agent-content .fig-captions .fig-captions-list  {
            float: left;
            text-align: center;
            font-size: 22px;
        }
        .agent-section .agent-list .agent-row.conditions .agent-content .fig-captions .fig-captions-list:first-child {
            width: 57%;
        }
        .agent-section .agent-list .agent-row.conditions .agent-content .fig-captions .fig-captions-list:last-child {
            width: 25%;
        }

        /* 我们的优势 */
        .agent-section .agent-list .agent-row.advantage .agent-content .fig-captions .fig-captions-list  {
            float: left;
            width: 20%;
            text-align: center;
        }
        .agent-section .agent-list .agent-row.advantage .agent-content .fig-captions .fig-captions-list p {
            white-space: pre;
            margin-bottom: 3px;
            font-size: 18px;
        }
        .agent-section .agent-list .agent-row.advantage .agent-content .fig-captions .fig-captions-list h2 {
            font-size: 38px;
        }


        /* 加盟流程 */
        .agent-section .agent-list .agent-row.agent-join .agent-content .fig-captions  {
            margin-top: 1em;
        }
        .agent-section .agent-list .agent-row.agent-join .agent-content .fig-captions .fig-captions-list  {
            float: left;
            width: 25%;
            text-align: center;
        }
        .agent-section .agent-list .agent-row.agent-join .agent-content .fig-captions .fig-captions-list p {
            white-space: pre;
            margin-bottom: 3px;
            font-size: 18px;
        }


        /*联系方式*/
        .agent-section .agent-list .agent-row.agent-contact .agent-content  {
            height: 135px;
        }

        .agent-section .agent-list .agent-row.agent-contact  h1 {
            font-size: 35px;
            padding: 20px 0;
        }

        .agent-section .agent-list .agent-row.agent-contact .agent-content .information  {
            width: 50%;
            margin: auto;
        }

        .agent-section .agent-list .agent-row.agent-contact .agent-content .information .address  {
            color: #585858;
            display: inline-block;
        }

        .agent-section .agent-list .agent-row.agent-contact .agent-content .information .address em {
            font-weight: 700;
            font-style: normal;
            color: #505050;
            margin-left: .5em;
        }

    </style>
    <title>小镜秀秀-代理加盟</title>
</head>
<body>
{{-- 导航组件 --}}
@include('components.headNavgitor')

@include('components.carousel')



{{-- 代理加盟页面 --}}
</div>

<!-- 主要内容 -->
<div id="main-content">

    <!-- 加盟标题 -->
    <div class="article clearfix">
        <!-- 标头 -->
        <div class="header" id="locat-arti">
            <div class="hgroup">
                <h1>代理加盟</h1>
                <h2><img src="http://xjxx-website.gz.bcebos.com/resources/agent/agent_joining.png" alt="agentJoining"></h2>
            </div>
        </div>


    </div>

</div>

<!-- 加盟主页 -->
<div class="agent-section clearfix">
    <ul class="agent-list">
        <li class="agent-row conditions">
            <div class="agent-content">
                <h1 class="agent-header">成为代理商的条件</h1>
                <div class="img-row">
                    <img src="http://xjxx-website.gz.bcebos.com/resources/agent/agent_group_people.png" alt="ourAdvantage">
                </div>
                <ul class="fig-captions ">
                    <li class="fig-captions-list">
                        <p>有专门团队负责</p>
                        <p>有强劲的销售推广能力</p>
                    </li>
                    <li class="fig-captions-list">
                        <p>有相关产品代理经验</p>
                        <p>或良好的客户资源</p>
                        <p>以及人脉资源</p>
                    </li>
                </ul>
            </div>
        </li>
        <li class="agent-row advantage">
            <div class="agent-content">
                <h1 class="agent-header">我们的代理优势</h1>
                <div class="img-row">
                    <img src="http://xjxx-website.gz.bcebos.com/resources/agent/agent_our_advantage.png" alt="ourAdvantage">
                </div>
                <ul class="fig-captions">
                    <li class="fig-captions-list">
                        <h2>技术优势</h2>
                        <p>依托华南理工大学</p>
                        <p>强大的研发实力</p>
                        <p>拥有一系列自主</p>
                        <p>知识产权的技术</p>
                    </li>
                    <li class="fig-captions-list">
                        <h2>产品优势</h2>
                        <p>产品应用范围</p>
                        <p>覆盖整个穿戴行业</p>
                        <p>拥有巨大的市场潜力</p>
                        <p>和发展前景</p>
                    </li>
                    <li class="fig-captions-list">
                        <h2>品牌优势</h2>
                        <p>与康耐特、伟星光学、深圳</p>
                        <p>产业服务集团等知名行业企业</p>
                        <p>达成合作知名品牌包括帕莎、</p>
                        <p>拾吾番、韩国视线等</p>
                    </li>
                    <li class="fig-captions-list">
                        <h2>政策优势</h2>
                        <p>创新创业型互联网公司</p>
                        <p>是国家、政府政策支持</p>
                        <p>发展的高新企业</p>
                    </li>
                    <li class="fig-captions-list">
                        <h2>价格优势</h2>
                        <p>软件应用在同行业中</p>
                        <p>同等品质价格最低</p>
                        <p>使得加盟商获得最大利益</p>
                    </li>
                </ul>
            </div>
        </li>


        <li class="agent-row agent-join">
            <div class="agent-content">
                <h1 class="agent-header">加盟代理流程</h1>
                <div class="img-row">
                    <img src="http://xjxx-website.gz.bcebos.com/resources/agent/agent_workflow.png" alt="ourAdvantage">
                </div>
                <ul class="fig-captions ">
                    <li class="fig-captions-list">
                        <p>联系渠道经理</p>
                        <p>确认合作意向</p>
                    </li>
                    <li class="fig-captions-list">
                        <p>与渠道经理详谈</p>
                        <p>代理合作事宜</p>
                        <p>签署合作事宜</p>
                    </li>
                    <li class="fig-captions-list">
                        <p>总部配置代理</p>
                        <p>以及相关权限</p>
                        <p>提供技术培训</p>
                    </li>
                    <li class="fig-captions-list">
                        <p>快速展开</p>
                        <p>当地销售工作</p>
                    </li>
                </ul>
            </div>
        </li>

        <li class="agent-row agent-contact">
            <div class="agent-content ">
                <h1 class="agent-header">更多详情致电垂询：</h1>
                <ul class="information">
                    <li class="address">
                       <p>
                           <em>Tel</em>：13751739058（潘先生）
                       </p>
                    </li>
                    <li class="address">
                       <p>
                           <em>QQ</em>：287059205
                       </p>
                    </li>
                    <li class="address">
                       <p>
                           <em>Email</em>：287059205@qq.com
                       </p>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
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