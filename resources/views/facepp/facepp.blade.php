<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>小镜秀秀眼镜试戴</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="icon" href="/img/favicons/favicon.ico" type="image/x-icon">
    <script src="https://use.fontawesome.com/fe0eea22f1.js"></script>
    <style>
        html {
            width: 100%;
            padding:1em;
        }

        body {

            min-width: 300px;
            max-width: 500px;
            margin: auto;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #xj-img-wrapper {
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        #xj-upploader {
            text-align: center;
        }

        .scroll-gap {
            width: 100%;
            padding: 0.3rem;
            padding-top: 1rem;
            position: relative;
        }

        #xj-img-wrapper img {
            width: 100%;
            user-drag: none;
            user-select: none;
            -moz-user-select: none;
            -webkit-user-drag: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }

        #xj-img-wrapper .eye {
            height: 6px;
            width: 6px;
            border-radius: 3px;
            background-color: red;
            position: absolute;

            display: none;
        }

        #xj-img-wrapper .glass {
            position: absolute;
            top : 105%;
            left: 5%;
            width: 90%;
            opacity: 0;

            -webkit-transition: all 1s ease-in;
            -moz-transition: all 1s ease-in;
            -o-transition: all 1s ease-in;
            transition: all 1s ease-in;

            -webkit-transform: translate(0%, 0%) ;
            -moz-transform: translate(0%, 0%);
            -ms-transform: translate(0%, 0%);
            -o-transform: translate(0%, 0%);
            transform: translate(0%, 0%);
        }

    </style>
    <style>
        {{-- form --}}
        .xj-input {
            width: 100%;
        }

            .xj-url-wrapper {
                display: inline-block;
                width: 50%;
                transition: all 300ms ease-out;
                vertical-align: middle;
            }

            .xj-url-wrapper.expand {
                width: 80%;
            }
            .xj-url-wrapper.hide {
                width: 0;
            }

                .xj-url-field {
                    width: 100%;
                    height: 35px;
                    outline: 0;
                    border: 3px solid #03A9F4;
                    text-indent: 0.5em;
                    font-size: 1em;
                    border-radius: 0;
                }


            .btn {
                display: inline-block;
                width: 15%;
                height: 35px;
                position: relative;
                border: 0;
                background: #10a0ef;
                color: white;
                font-size: 1em;
            }

            .xj-btn-upload {
                width: 30%;
                white-space: nowrap;
                transition: all 300ms ease-out;
                vertical-align: middle;
            }

            .xj-btn-upload.slide-hide {
                width: 0;
            }

            .btn-submit {
                background: #10a11f;
                vertical-align: middle;
            }

            .xj-btn-upload input {
                width: 100%;
                height: 100%;
                opacity: 0;
                position: absolute;
                left: 0;
                top: 0;
            }

    </style>
    <style>
        {{-- choose glass --}}
        #xj-glasses-wrapper {
            width: 100%;
            height: 80px;
            margin-top: 1rem;
            font-size: 0;
        }
        #xj-glasses-wrapper .xj-glasses-nav {
            width: 10%;
            height: 100%;
            display: inline-block;
            font-size: 1rem;
        }
        #xj-glasses-wrapper .xj-glasses-nav i {
            font-size: 4rem;
            vertical-align: text-top;
            height: 100%;
            width: 100%;
            color: #03a9f4;
            text-align: center;
        }

        #xj-glasses-wrapper .xj-glasses-nav:hover i {
            color: rgba(3, 169, 244, 0.43);
            cursor: pointer;
        }

        #xj-glasses-wrapper #xj-glasses-single {
            width: 80%;
            height: 100%;
            display: inline-block;
            text-align: center;
            vertical-align: bottom;
            font-size: 1rem;
            position: relative;
        }

            #xj-glasses-wrapper #xj-glasses-single img {
                width: 100%;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
            }


    </style>
</head>
<body id="v-xj-app">

    <div id="xj-upploader" class="l-demo l-demo-detect">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="xj-input form-styled">

                <button class="btn xj-btn-upload" :class="{'slide-hide':input_img_url}">
                    <i v-show="!input_img_url" class="fa fa-upload" aria-hidden="true"></i>
                    <span v-show="!input_img_url">上传图片</span>
                    <input id="upload-file" type="file" accept="image/*" name="face_image" v-on:change="uploadImage">
                </button>

                <div class="xj-url-wrapper" :class="{'expand':input_img_url,'hide':upload_img}">
                    <input type="text" v-show="!upload_img" class="xj-url-field" placeholder="或输入图片地址URL" name="url" v-model="input_img_url">
                </div>

                <button id="sub-btn" class="btn btn-submit btn-info"  type="submit">提交</button>


            </div>
        </form>
    </div>

    <div class="scroll-gap">

        <div id="xj-img-wrapper">
            <img src="" alt="" id="xj-user-image" class="xj-resource" v-if="!upload_img" :src="user_img_url" v-on:load="initResource">
            <img src="" alt="用户上传" v-if="upload_img" :src="upload_img">
            <div id="left-eye" class="eye"></div>
            <div id="right-eye" class="eye"></div>
            <div id="center-eye" class="eye"></div>
            <img src="" alt="" id="tryon-glass" class="glass xj-resource" v-if="!upload_img" :src="glass_img_url" v-on:load="initResource">
            <canvas id="xj-composite-canvas" width="400" height="400" style="border:1px solid #d3d3d3;display: none">
                Sorry, 你的浏览器不支持 H5 Canvas
            </canvas>
            {{--<img src="/tmp/AC7F5.png" alt="" id="tryon-glass" class="glass">--}}
            {{--<img src="/tmp/CB021.png" alt="" id="tryon-glass" class="glass">--}}
        </div>

    </div>

    <div id="xj-glasses-wrapper" class="xj-glasses">
        <div id="xj-glasses-left" class="xj-glasses-nav" v-on:click="prevGlass">
            <i class="fa fa-caret-left" aria-hidden="true"></i>
        </div>

        <div id="xj-glasses-single">
            <img src="" alt="镜框" :src="glass_img_url">
        </div>

        <div id="xj-glasses-right" class="xj-glasses-nav" v-on:click="nextGlass">
            <i class="fa fa-caret-right" aria-hidden="true"></i>
        </div>
    </div>

    {{--<script src="/js/touch-emulator.js"></script>--}}
    {{--<script>TouchEmulator(); </script>--}}
    <script src="/js/hammer.min.js"></script>
    {{--<script src="https://hammerjs.github.io/dist/hammer.js"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>--}}
    {{--<script src="https://cdn.rawgit.com/julianshapiro/velocity/master/velocity.min.js"></script>--}}
    @include('components.vue')
    <script>
        !function preventMobileScroll(){
            window.blockMenuHeaderScroll = false;
            document.body.addEventListener('touchstart', function(e) {
                blockMenuHeaderScroll = true;
            },false);
            document.body.addEventListener('touchend', function() {
                blockMenuHeaderScroll = false;
            },false);
            document.body.addEventListener('touchmove', function(e) {
                if (blockMenuHeaderScroll)  {
                    e.preventDefault();
                }
            },false);
        }();


    </script>
    <script>

        !function () {

            // init rawdata
            var vm_data = {
                user_img_url : '{{ $info['face']->img }}',
                glass_img_url : "{{ $info['glass']->img }}",
                result : {},
                adjust_transform : "",
                input_img_url : '',
                upload_img : '',
                glasses_url : [],
                glass_index : 0,
                init_count : 3
            };

            !function vueInit() {

                var vm = new Vue({
                    el: '#v-xj-app',
                    data: vm_data,
                    ready: function __ready() {
                        this.getGlasses();
                        this.getResult();
                    },
                    methods : {
                        uploadImage : function uploadImage(e){
                            var file    = e.target.files[0];
                            var reader  = new FileReader();

                            reader.addEventListener("load", function (e) {
                                vm.upload_img = e.target.result;
                            }, false);

                            if (file) {
                                reader.readAsDataURL(file);
                            }
                        },
                        nextGlass : function nextGlass(){
                                var index = Math.abs(++vm.glass_index % vm.glasses_url.length);
                                vm.glass_img_url = vm.glasses_url[index];
                        },
                        prevGlass : function prevGlass(){
                                vm.glass_index < 1 ? vm.glass_index = vm.glasses_url.length : 0;
                                var index = Math.abs(--vm.glass_index % vm.glasses_url.length);
                                vm.glass_img_url = vm.glasses_url[index];
                        },
                        getGlasses : function(e){
                            this.$http
                                .get( "allglass" )
                                .then(ajaxFillGlassList, ajaxFail);
                        },
                        getResult : function(e){
                            this.$http
                                .get( "result" + location.search )
                                .then(ajaxFillResultList, ajaxFail);
                        },
                        initResource : function initResource(){
                            vm.init_count--;
                            if (!vm.init_count) {
                                tryOnInit();
                            }
                        }


                    }

                });

                function ajaxFillGlassList(data){
                    vm.$set('glasses_url', data.json());
                }

                function ajaxFillResultList(data){
                    vm.$set('result', JSON.parse(data.json()));
                    vm.initResource();
                }

                function ajaxFail(data){
                    console.log('fail ajax');
                    console.log(data);
                }


            }();

            function imgToCanvas(glass_elem){
                var c = document.getElementById("xj-composite-canvas");
                var ctx = c.getContext("2d");
                var user_img = document.getElementById("xj-user-image");
                var glass_img = document.getElementById("tryon-glass");
                ctx.drawImage(user_img, 0 , 0);
                ctx.drawImage(glass_img,
                    glass_elem.style.left.split('px').join(''),
                    glass_elem.style.top.split('px').join(''),
                    glass_elem.getBoundingClientRect().width,
                    glass_elem.getBoundingClientRect().height
                );
            }

            function tryOnInit(){
                var pd_scale_ratio = 1.91;
                var result = vm_data.result;

                var img_elem = document.getElementById('xj-user-image');
                var img_size = {
                    w: img_elem.width,
                    h: img_elem.height
                };

                var glass_elem = document.getElementById('tryon-glass');
                glass_elem.style.opacity = 1;
                glass_elem.addEventListener("transitionend", function cancelTransition(){
                    this.style.transition = 'none';
                }, false);


                if  (!result || !result.face || !result.face.length) {
                    placeElement(glass_elem, calcPixelPosition( img_size, { x:0 , y:50} ));
                    rotate3dElement(glass_elem , 0 , 0 , 0);
                    hammerInit();

                    return 'User adjust try on itself';
                }

                var eye_left_ratio = result.face[0].position.eye_left;
                var eye_right_ratio =  result.face[0].position.eye_right;
                var center_ratio = calcCenterRatio( eye_left_ratio, eye_right_ratio );

                var roll_angle  = result.face[0].attribute.pose.roll_angle.value;
                var pitch_angle  = result.face[0].attribute.pose.pitch_angle.value;
                var yaw_angle  = result.face[0].attribute.pose.yaw_angle.value;

                var pd = calculatePD(img_size, eye_left_ratio, eye_right_ratio );
                var actual_size = scaleElement(glass_elem , (pd * pd_scale_ratio) / glass_elem.width );
                placeElement(glass_elem, calcPixelPosition( img_size, center_ratio ), actual_size);
                rotate3dElement(glass_elem , roll_angle , pitch_angle , yaw_angle);

                hammerInit();
//                imgToCanvas(glass_elem);
//                debug_points(img_size);

                function debug_points(img_size){
                    var left_label_elem = document.getElementById('left-eye');
                    var right_label_elem = document.getElementById('right-eye');
                    var center_label_elem = document.getElementById('center-eye');

                    left_label_elem.style.display = 'inherit';
                    right_label_elem.style.display = 'inherit';
                    center_label_elem.style.display = 'inherit';

                    placeElement(left_label_elem, calcPixelPosition( img_size, eye_left_ratio ));
                    placeElement(right_label_elem, calcPixelPosition( img_size, eye_right_ratio));
                    placeElement(center_label_elem, calcPixelPosition( img_size, center_ratio ));
                }
            }



            function placeElement( label_elem, shift_position , centring) {
                centring = centring || false;
                center_shift = {
                    w: 0,
                    h: 0
                };
                if (centring) {
                    var center_shift = calcImgCenter( centring );
                }
                label_elem.style.left = shift_position.x - center_shift.w  + 'px';
                label_elem.style.top = shift_position.y - center_shift.h + 'px';
                return label_elem
            }

            function scaleElement( label_elem, scale_ratio ) {
                label_elem.style.width = label_elem.getBoundingClientRect().width * scale_ratio + 'px';
                return {
                    w : label_elem.getBoundingClientRect().width * scale_ratio,
                    h : label_elem.getBoundingClientRect().height * scale_ratio
                };
            }

            function rotateElement( label_elem, roll_deg ) {
                label_elem.style.transform = 'translate(-50% ,-50%) rotate('+ roll_deg +'deg)';
                return label_elem
            }

            function rotate3dElement( label_elem, roll_deg ,pitch_angle, yaw_angle ) {
                label_elem.style.transform =
                    'rotateZ('+ roll_deg +'deg)' +
                    'rotateX('+ pitch_angle +'deg)'  +
                    'rotateY('+ yaw_angle +'deg)';
                return label_elem
            }

            function calcCenterRatio( eye_left_ratio, eye_right_ratio ) {
                return {
                    x: (eye_right_ratio.x + eye_left_ratio.x)/2,
                    y: (eye_right_ratio.y + eye_left_ratio.y)/2
                }
            }

            function calcPixelPosition( img_size, xy_ratio) {
                return {
                    x: img_size.w * xy_ratio.x/100,
                    y: img_size.h * xy_ratio.y/100
                }
            }

            function calcImgCenter( actual_size  ) {
                return {
                    w: actual_size.w / 2,
                    h: actual_size.h / 2
                }
            }

            function calculatePD( img_size, eye_left_ratio, eye_right_ratio ) {
                var left_eye_pos = calcPixelPosition( img_size , eye_left_ratio );
                var right_eye_pos = calcPixelPosition( img_size , eye_right_ratio );

                return euclideanDistance( left_eye_pos, right_eye_pos );
            }

            function euclideanDistance( pos_a, pos_b) {
                return Math.sqrt(Math.pow(pos_b.x - pos_a.x,2) + Math.pow(pos_b.y - pos_a.y,2));
            }


            function hammerInit(){

                var stage = document.getElementById('xj-img-wrapper');
//                    var stage = document.getElementById('tryon-glass');
                var target_elem = document.getElementById('tryon-glass');
                var origin_style = {
                    left : target_elem.style.left,
                    top : target_elem.style.top,
                    transform : target_elem.style.transform
                };

                var mc = new Hammer.Manager(stage);

                var Rotate = new Hammer.Rotate();
                var Pan = new Hammer.Pan();
                var Pinch = new Hammer.Pinch();
                var DoubleTap = new Hammer.Tap({
                    event: 'doubletap',
                    taps: 2
                });

                // use them together
                Rotate.recognizeWith([Pan]);
                Pinch.recognizeWith([Rotate, Pan]);

                mc.add(Rotate);
                mc.add(Pan);
                mc.add(Pinch);
                mc.add(DoubleTap);

                var init_pos_left = +target_elem.style.left.split('px').join('');
                var init_pos_top = +target_elem.style.left.split('px').join('');
                var pan_tick_lock = {
                    x:0,
                    y:0
                };
                mc.on('panstart', function() {
                    init_pos_left = +target_elem.style.left.split('px').join('');
                    init_pos_top = +target_elem.style.top.split('px').join('');
                });
                mc.on('pan', function(e) {

                    if (e.deltaX - pan_tick_lock.x > 30 || e.deltaY - pan_tick_lock.y > 30) return;
                    pan_tick_lock = {
                        x: e.deltaX,
                        y: e.deltaY
                    };

                    target_elem.style.left = init_pos_left + e.deltaX + 'px';
                    target_elem.style.top = init_pos_top + e.deltaY+ 'px';
                });
                mc.on('panend', function(e) {
                    pan_tick_lock = {
                        x:0,
                        y:0
                    }
                });



                var origin_rotation = oneTransFunc(target_elem, 'rotateZ');
                var rotate_init = 0;
                var tick_lock = 0;
                mc.on('rotatestart', function(e) {
                    rotate_init = Math.round(e.rotation);
                });
                mc.on('rotate', function(e) {
                    // do something cool
                    var rotation_delta = Math.round(e.rotation) - rotate_init;

                    if (Math.abs(rotation_delta - tick_lock)>120) {
                        return;
                    }

                    var rotation = +origin_rotation.split('deg').join('') + rotation_delta;
                    Math.abs(rotation) < 1 ? rotation = 360 : 0;

                    oneTransFunc(target_elem, 'rotateZ', rotation +'deg')
                });
                mc.on('rotateend', function() {
                    rotate_init = 0;
                    origin_rotation = oneTransFunc(target_elem, 'rotateZ');
                });

                var origin_scale = oneTransFunc(target_elem, 'scale' ) || 1;
                mc.on('pinchmove', function(e) {
                    oneTransFunc(target_elem, 'scale', origin_scale * e.scale )
                });
                mc.on('pinchend', function() {
                    origin_scale = oneTransFunc(target_elem, 'scale')
                });

                mc.on('doubletap', function() {
                    resetStyle(target_elem, origin_style)
                });

                function oneTransFunc(elem ,funcName, newValue){

                    var origin_transform = elem.style.transform;

                    // todo 单一职责 / 要分离开
                    if (!newValue) {
                        // todo getter
                        func_pattern = new RegExp(funcName + '\\((.+?)\\)');
                        return func_pattern.exec(elem.style.transform) && func_pattern.exec(elem.style.transform)[1];
                    } else {

                        // todo setter
                        var func_pattern = new RegExp(funcName + '\\(.+?\\)');
                        var split_arr = origin_transform.split(func_pattern);
                        var new_func = funcName + '(' + newValue +')';
                        split_arr.splice(1,0,new_func);

                        return elem.style.transform = split_arr.join('');
                    }


                }

                function resetStyle(elem, origin_style) {
                    for (var k in origin_style){
                        if (origin_style.hasOwnProperty(k)) {
                            elem.style[k] = origin_style[k];
                        }
                    }
                }


            }




        }();

    </script>




</body>
</html>