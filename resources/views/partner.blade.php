<!-- Authentication Links -->
@if (Auth::guest())
    <p><a href="{{ url('/admin') }}">请返回登录</a></p>
@else

    {{--<p>管理伙伴, {{ Auth::user()->name }} !</p>--}}
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>合作伙伴管理</title>
        <link rel="Stylesheet" type="text/css" href="css/croppie.css" />
        {{--<link rel="Stylesheet" type="text/css" href="css/prism.css" />--}}
        <link rel="Stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" href={{ url('/css/bootstrap.min.css') }}>

        <style media="screen">
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

            .upload-msg {
                text-align: center;
                padding: 50px;
                font-size: 22px;
                color: #aaa;
                width: 260px;
                margin: 50px auto;
                border: 1px solid #aaa;
            }

        </style>
        <style>
            * {
                font-family: '微软雅黑','heiti SC',sans-serif;
            }

            html,body {
                width: 100%;
            }

            .wrapper {
                width: 800px;
                margin: auto;
            }

            .wrapper form label {
                margin-right:  1rem;
            }

            .wrapper form .subBtn {
                margin-top: 0.5rem;
                text-align: center;
                position: relative;
            }

            .wrapper form#partner-new legend {
                font-size: 1.5em;
            }

            .wrapper form#partner-edit.inactive {
                display: none;
            }

            .wrapper form .subBtn .cancel {
                position: absolute;
                right: 0;
            }

            .wrapper ul li {
                margin-top: 0.5rem;
            }

            .wrapper ul li:nth-of-type(odd) {
                background: #f1f1f1;
            }

            ul.partners-list {
                border: solid 2px #5a9ed6;
                padding: 1rem 2rem;
                position: relative;
                margin-top: 3rem;
            }

            .wrapper h2 {
                text-indent: .5rem;
                background: white;
                font-weight: 400;
                margin-top: 0rem;
                display: inline-block;
                position: absolute;
                top: -1rem;
                padding-right: .5rem;
            }

            .item-list>span{
                margin-right: 1em;
            }

            .disable {
                cursor: not-allowed;
            }
        </style>
    </head>
    <body>

    @include('components.adminHeader')


    <!--合作伙伴-->
    <div class="wrapper">



        <!-- 上传新伙伴 -->
        <form action="{{ url('/partner') }}" method="POST" id="partner-new" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <fieldset id="newPartFiledset">
                <legend>合作伙伴上传</legend>
                <p><label for="partnerName">填写公司名称</label><input type="text" id='partnerName' name='partnerName' placeholder="例：Rayban" required></p>
                <p><label for="partnerHref">公司链接地址</label><input type="text" id='partnerHref' name='partnerHref'  placeholder="http://www.rayban.com"><p>
                <p>

                    {{-- crop img add-on --}}
                    <section>

                        <div class="demo-wrap upload-demo">
                            <div class="container">
                                <div class="grid">
                                    <div class="" >
                                        <div class="actions">
                                            <a class="btn file-btn">
                                                <span>上传图片</span>
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

                    <input type="hidden" name="partnerImg" id='partnerImg'>
                    {{--<input id='partnerImg' type="file" placeholder="上传图片" required name="partnerImg" accept="image/jpeg">--}}
                    <label for="partnerImg" style="display:block;font-size:.5rem">图片格式 : 必须为 JPG 或 PNG </label>
                </p>
                <div class="subBtn"><button class='cancel btn-default' id="cancelNewPartner" type="reset">取消</button><button class='confirm btn-success' type="submit" id="submitBtn" style="visibility: hidden">确认提交</button></div>
            </fieldset>
        </form>




        <!-- 修改：默认隐藏-->
        <form action="" id="partner-edit" class="inactive">
            <fieldset>
                <legend>修改</legend>
                <p><label for="partnerName-edit">修改公司名称</label><input type="text" id='partnerName-edit' name='partnerName' placeholder="" required></p>
                <p><label for="partnerHref-edit">修改链接地址</label><input type="text" id='partnerHref-edit' name='partnerHref'  placeholder=""><p>
                <p><input type="file" placeholder="上传图片" required ><p>
                <div class="subBtn"><button class='cancel' type="reset">取消</button><button class='confirm' type="submit">确认修改</button></div>
            </fieldset>
        </form>

        <br>
        <legend>现有伙伴</legend>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>现有伙伴名称</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($partners as $partner)
                <tr>
                    <td>
                        <span>{{ $partner->id }}</span>
                    </td>
                    <td class="item-list" id="rayban" data-id="{{ $partner->id }}">
                        <span class="partName">{{ $partner->name }}</span>
                        {{-- 这个要留到学会ajax时用？ todo  --}}
                        {{--<button class="item-edit" id="editPartner">修改</button>--}}
                        <form action="{{ url('partner/'.$partner->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {!! csrf_field() !!}
                            <button class="btn btn-xs btn-danger" id="deletePartner" type="submit">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/croppie.min.js"></script>
    <script>

        // validate form
        !function(){

            var editFormElem =  $('#partner-edit');

            // 伙伴列表按钮监听
            $('.partners-list').on('click',function (event) {
                event.preventDefault();
                var target = $(event.target);

                switch (target.attr('id')) {
                    case "editPartner" :
                        fillEditForm(getItemData('id Here'));
                        showEditForm(target);
                        break;
                    case "deletePartner" :
                        delItem('item ID',target);
                        break;
                    case "cancelNewPartner" :
                        editFormElem.addClass('inactive');
                        break;
                }
            });

            function getItemData(itemId){

                var data = {
                    partName : 'example : rayBan',
                    partHref : 'example ://www.rayban.com'
                };

                return data
            }

            function showEditForm(target) {
                target.parent().append(editFormElem);
                editFormElem.removeClass('inactive');
            }

            function fillEditForm(data){
                editFormElem.find('#partnerName-edit').val(data.partName);
                editFormElem.find('#partnerHref-edit').val(data.partHref);
            }

            function delItem(itemId,target){
//
                if(confirm('确定删除？')){
                    postDelete(itemId,target);


                    // this line should call in ajax Callback
//                    deleteList(target);
                }
            }


            function postDelete(itemId,target){
//                Delete Form
                target.parentsUntil('div').submit();
//                 ajax Delete itemId
                return itemId;
            }

            function deleteList(target) {
                target.parentsUntil('ul').remove();
            }

            var _URL = window.URL || window.webkitURL;
//            图片验证
            $("#partnerImg").change(function(e) {
                var file, img;
                var limitWidth = 400,
                        limitHeight = 200;

                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {

                        if (this.width != limitWidth || this.height != limitHeight) {
                            alert('尺寸不符' + this.width + ' x ' + this.height + '，请重新上传！');
                            $("#partnerImg").val('');
                        };
                    };
                    img.onerror = function() {
                        alert( "not a valid file: " + file.type);
                    };
                    img.src = _URL.createObjectURL(file);

                }

            });


//          禁止重复提交表单
            $('#partner-new').on('submit',function (e) {
                    // for degu
//                e.preventDefault();
                $('#submitBtn').addClass('disable');
//                $('#newPartFiledset').attr('disabled','true');
                $('#submitBtn').attr('disabled','true');
            });


        }();


//       crop img script
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
                var html;
                if (result.html) {
                    html = result.html;
                }
                if (result.src) {
                    html = '<img src="' + result.src + '" />';
                }
                // console.dir(result);

                // show res img
                $('#crop-res').attr('src',result.src);
                $('#crop-res').parent('div').removeClass('inactive');
                $('#upload-demo').addClass('inactive');

            }

            function fillFile(result) {
                $('#partnerImg').val(result);
            };


            $uploadCrop = $('#upload-demo').croppie({
                viewport: {
                    width: 400,
                    height: 200,
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
                    $('#submitBtn').css('visibility','inherit')
                    fillFile(resp);
                });


            });

        }();

    </script>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    </body>

    </html>

@endif