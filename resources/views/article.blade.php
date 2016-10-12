<!-- Authentication Links -->
@if (Auth::guest())
    <p><a href="{{ url('/admin') }}">请返回登录</a></p>
@else
    <!DOCTYPE HTML>
    <html>
    <head>

        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
        <title>小镜文章管理</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="Stylesheet" type="text/css" href="/css/croppie.css" />
        {{--<link rel="Stylesheet" type="text/css" href="css/prism.css" />--}}
        <link rel="Stylesheet" type="text/css" href="/css/demo.css" />
        <link href="/um-edit/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href={{ url('/css/bootstrap.min.css') }}>

        <style>
            {{-- crop --}}
            .res-wrapper {
                height: 200px;
                width: 400px;
                box-shadow: 0px 3px 6px rgba(119, 119, 119, 0.92);
            }

            .inactive {
                display: none !important;
            }

            .grid {
                overflow: visible;
            }

            .crop-sec {
                border: 1px solid #949494;
            }

            a.btn {
                 background-color: transparent;
                 color: black;
                 border: 0;
            }
        </style>
        <script type="text/javascript" src="/um-edit/third-party/jquery.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="/um-edit/umeditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="/um-edit/umeditor.min.js"></script>
        <script type="text/javascript" src="/um-edit/lang/zh-cn/zh-cn.js"></script>
        <style type="text/css">
            html,body {
                width: 100%;
            }

            * {
                font-family: '微软雅黑','heiti SC',sans-serif;
            }

            div.editor-wrapper {
                width: 980px;
                margin: auto;
            }

            h1{
                font-family: "微软雅黑";
                font-weight: normal;
                text-align: center;
                padding-top: 0;
            }

            #formSubmitBtn {

                margin: 2rem 0;
                float: right;
            }

            #articleName {
                display: block;
                width: 100%;
            }

            label {
                display: block;
                font-size: 1.4rem;
                margin-bottom: 0.5rem;
            }

            #btns {
                display: none;
            }
        </style>
    </head>
    <body>

    @include('components.adminHeader')

    <div class="editor-wrapper ">

            <h1>上传文章</h1>

        @if(isset($article))
            <form action={{ url('/article/'. $article->id) }} id="article-editor" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
        @else
            <form action="/article" id="article-editor" method="post" enctype="multipart/form-data">
        @endif
            {!! csrf_field() !!}
            <p>
                <label for="articleName" id="header-label"><h3>文章标题</h3></label>
                @if(isset($article))
                    <input type="text" id='articleName' name='articleName' value={{ $article->title }} required>
                @else
                    <input type="text" id='articleName' name='articleName' placeholder="例：谭总今天与总XX合影" required>
                @endif
            </p>
            <!--style给定宽度可以影响编辑器的最终宽度-->
            <h3 style="color:black">新闻配图</h3>
            {{-- crop img add-on --}}
            <section class="crop-sec">

                <div class="demo-wrap upload-demo">
                    <div class="container">
                        <div class="grid">
                            <div class="" >
                                <div class="actions">
                                    <a class="btn file-btn">
                                        <span style="color:black"><button class="btn-info">上传图片</button></span>
                                        <input type="file" id="upload" value="Choose a file" accept="image/*" />
                                    </a>
                                    <button class="upload-result btn-warning" type="button" style="margin-left:2rem">裁剪</button>
                                </div>
                            </div>
                            <div class="col-1-2">
                                <div class="upload-msg">
                                    提交图片
                                </div>
                                <div id="upload-demo"></div>
                                <div class="res-wrapper inactive">
                                    <img id="crop-res" src="" alt="" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <input type="hidden" name="thumbImg" id='thumbImg'>
            <input type="hidden" name="description" id='description'>
            <input type="hidden" name="editId" id='editId'>

            <label for="myEditor" id="article-label"><h3>正文</h3></label>
            <script type="text/plain" id="myEditor" style="width:980px;height:240px;">

  </script>

            <button type="submit" id="formSubmitBtn" class="btn-success">确认提交</button>
        </form>
    </div>


    <div class="clear"></div>
    <div id="btns" >
        <table>
            <tr>
                <td>
                    <button class="btn" unselected="on" onclick="getAllHtml()">获得整个html的内容</button>&nbsp;
                    <button class="btn" onclick="getContent()">获得内容</button>&nbsp;
                    <button class="btn" onclick="setContent()">写入内容</button>&nbsp;
                    <button class="btn" onclick="setContent(true)">追加内容</button>&nbsp;
                    <button class="btn" onclick="getContentTxt()">获得纯文本</button>&nbsp;
                    <button class="btn" onclick="getPlainTxt()">获得带格式的纯文本</button>&nbsp;
                    <button class="btn" onclick="hasContent()">判断是否有内容</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn" onclick="setFocus()">编辑器获得焦点</button>&nbsp;
                    <button class="btn" onmousedown="isFocus();return false;">编辑器是否获得焦点</button>&nbsp;
                    <button class="btn" onclick="doBlur()">编辑器取消焦点</button>&nbsp;
                    <button class="btn" onclick="insertHtml()">插入给定的内容</button>&nbsp;
                    <button class="btn" onclick="getContentTxt()">获得纯文本</button>&nbsp;
                    <button class="btn" id="enable" onclick="setEnabled()">可以编辑</button>&nbsp;
                    <button class="btn" onclick="setDisabled()">不可编辑</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn" onclick="UM.getEditor('myEditor').setHide()">隐藏编辑器</button>&nbsp;
                    <button class="btn" onclick="UM.getEditor('myEditor').setShow()">显示编辑器</button>&nbsp;
                    <button class="btn" onclick="UM.getEditor('myEditor').setHeight(300)">设置编辑器的高度为300</button>&nbsp;
                    <button class="btn" onclick="UM.getEditor('myEditor').setWidth(1200)">设置编辑器的宽度为1200</button>
                </td>
            </tr>

        </table>
    </div>


    <div>
        <h3 id="focush2"></h3>
    </div>
    <div id="edit-content" style="display:none">
        @if(isset($article))
            {{--{!! $article->content !!}--}}
            {{ $article->content }}
        @endif
    </div>
    <script type="text/javascript" src="/um-edit/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/um-edit/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/um-edit/umeditor.min.js"></script>
    <script type="text/javascript" src="/um-edit/lang/zh-cn/zh-cn.js"></script>
    {{--<script src="//cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>--}}
    <script src="/js/croppie.min.js"></script>
    <script type="text/javascript">
        //实例化编辑器
        var um = UM.getEditor('myEditor',{
            toolbars:[[]]
        });



        // um.addListener('blur',function(){
        //     $('#focush2').html('编辑器失去焦点了')
        // });
        um.addListener('focus',function(){
            $('#focush2').html('')
        });



        //按钮的操作
        function insertHtml() {
            var value = prompt('插入html代码', '');
            um.execCommand('insertHtml', value)
        }
        function isFocus(){
            alert(um.isFocus())
        }
        function doBlur(){
            um.blur()
        }
        function createEditor() {
            enableBtn();
            um = UM.getEditor('myEditor');
        }
        function getAllHtml() {
            alert(UM.getEditor('myEditor').getAllHtml())
        }
        function getContent() {
            var arr = [];
            arr.push("使用editor.getContent()方法可以获得编辑器的内容");
            arr.push("内容为：");
            arr.push(UM.getEditor('myEditor').getContent());
            alert(arr.join("\n"));
        }
        function getPlainTxt() {
            var arr = [];
            arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
            arr.push("内容为：");
            arr.push(UM.getEditor('myEditor').getPlainTxt());
            alert(arr.join('\n'))
        }
        function setContent(isAppendTo) {
            var arr = [];
            arr.push("使用editor.setContent('欢迎使用umeditor')方法可以设置编辑器的内容");
            UM.getEditor('myEditor').setContent('欢迎使用umeditor', isAppendTo);
            alert(arr.join("\n"));
        }
        function setDisabled() {
            UM.getEditor('myEditor').setDisabled('fullscreen');
            disableBtn("enable");
        }

        function setEnabled() {
            UM.getEditor('myEditor').setEnabled();
            enableBtn();
        }

        function getText() {
            //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
            var range = UM.getEditor('myEditor').selection.getRange();
            range.select();
            var txt = UM.getEditor('myEditor').selection.getText();
            alert(txt)
        }

        function getContentTxt() {
            var arr = [];
            arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
            arr.push("编辑器的纯文本内容为：");
            arr.push(UM.getEditor('myEditor').getContentTxt());
            alert(arr.join("\n"));
        }
        function hasContent() {
            var arr = [];
            arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
            arr.push("判断结果为：");
            arr.push(UM.getEditor('myEditor').hasContents());
            alert(arr.join("\n"));
        }
        function setFocus() {
            UM.getEditor('myEditor').focus();
        }
        function deleteEditor() {
            disableBtn();
            UM.getEditor('myEditor').destroy();
        }
        function disableBtn(str) {
            var div = document.getElementById('btns');
            var btns = domUtils.getElementsByTagName(div, "button");
            for (var i = 0, btn; btn = btns[i++];) {
                if (btn.id == str) {
                    domUtils.removeAttributes(btn, ["disabled"]);
                } else {
                    btn.setAttribute("disabled", "true");
                }
            }
        }
        function enableBtn() {
            var div = document.getElementById('btns');
            var btns = domUtils.getElementsByTagName(div, "button");
            for (var i = 0, btn; btn = btns[i++];) {
                domUtils.removeAttributes(btn, ["disabled"]);
            }
        }
    </script>
    <script>
       // crop img script
        !function demoUpload() {
            var $uploadCrop;

            function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        });
                        $('.upload-demo').addClass('ready');
                    }

                    reader.readAsDataURL(input.files[0]);
                }
                else {
                    console.dir("Sorry - you're browser doesn't support the FileReader API");
                }
            }


            function popupResult(result) {

                // show res img
                $('#crop-res').attr('src',result.src);
                $('#crop-res').parent('div').removeClass('inactive');
                $('#upload-demo').addClass('inactive');

            }

            function fillFile(result) {
                $('#thumbImg').val(result);
            };


            $uploadCrop = $('#upload-demo').croppie({
                viewport: {
                    width: 400,
                    height: 200
                },
                boundary: {
                    width: 400,
                    height: 400
                },
                exif: true
            });

            $('#upload').on('change', function () {
                readFile(this);
                $('#upload-demo').removeClass('inactive');
                $('#crop-res').parent('div').addClass('inactive');

            });
            $('.upload-result').on('click', function (ev) {
                $uploadCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (resp) {
                    popupResult({
                        src: resp
                    });

//                    show submit btn
                    $('#submitBtn').css('visibility','inherit');
                    fillFile(resp);
                });


            });

            function contentProcesser(rawContent, limitLength) {

                limitLength = limitLength || 150;
                var trimContent = rawContent.trim();
                var limitContent = trimContent.length > limitLength ? trimContent.substr(0,150) : trimContent;

                return limitContent
            }

//            $('#formSubmitBtn').on('click', function (e) {
            $('#article-editor').on('submit', function (e) {

                if (!$('#description').val()) {
                    e.preventDefault();

                    $('#formSubmitBtn').attr('disabled',true);
                    var rawContentText = UM.getEditor('myEditor').getContentTxt();
                    var processText = contentProcesser(rawContentText);
                    $('#description').val(processText);
                    $('#article-editor').submit();
//                    console.log($('#description').val());
                }



            });


            // edit Article
            if ($('#edit-content').text() !== '') {
                um.setContent($('#edit-content').text());
            }

        }();
    </script>
    <script src="/js/bootstrap.min.js"></script>
    </body>
    </html>

@endif