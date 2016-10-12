!function(){
    if (!window.jQuery || !window.$) {
        throw new Error("需要加载 jQuery");
    }
    if (!window.Hammer) {
        throw new Error("需要加载 hammer.js");
    }

    window.XjxxTryon = XjxxTryon;

    var API_URL;
    var SECRET_KEY;
    var STAGE_SELECTOR;
    var DEBUG = false;

    function XjxxTryon(initData){

        if (initData.DEBUG) {
            DEBUG = !DEBUG;
        }

        if (!(this instanceof XjxxTryon)) {
            throw new Error("请使用 new 初始化实例");
        }

        if (!initData.API_URL) {
            throw new Error("未提供API接口地址");
        }
        API_URL = initData.API_URL;

        if (!initData.SECRET_KEY) {
            throw new Error("未提供API密钥");
        }
        SECRET_KEY = initData.SECRET_KEY;

        if (!initData.STAGE) {
            throw new Error("请指明试戴展示的元素");
        }
        STAGE_SELECTOR = initData.STAGE;

        this.user_image = initData.user_image;
        this.$user_img_elem = void 0;
        this.glass_image = initData.glass_image;
        this.$glass_img_elem = void 0;
        this.$stage_elem = void 0;
        this.hammer = void 0;
        this.$form_elem = void 0;
        this.result = void 0;

        this.initElem();

    }

    // 原型对象
    XjxxTryon.prototype = {

        // 上传用户图片 or 图片网址
        // upload : function uploadImg(imgUrl){
        //
        //     if(imgUrl) return this.uploadImg(imgUrl);
        //
        //     this.$form_elem.trigger('click');
        //
        // },

    };

    // 插入元素
    XjxxTryon.prototype.initElem = function initElem() {
        var xjxx = this;
        var stage_elem = $(STAGE_SELECTOR).css({
            'overflow':'hidden'
        });

        this.$stage_elem = stage_elem;

        if (stage_elem.css('position') == "static") {
            stage_elem.css('position','relative');
        }

        if (!stage_elem.width()) {
            stage_elem.css('width','400px');
        }

        if (!stage_elem.height()) {
            stage_elem.css('height','400px');
        }

        if (!this.$user_img_elem) {
            stage_elem.append('<img id="xj-user-img">');

            this.$user_img_elem = $("#xj-user-img")
              .attr({
                  'src' : this.user_image
              })
              .css({
                  'width' : '100%',
                  'user-drag': 'none',
                  'user-select': 'none'
              })
              .load(function(){
                  // get face param result
              })
              .error(function(){
                  // debug('用户图片加载失败');
              });
        }
        if (!this.$glass_img_elem) {
            stage_elem.append('<img id="xj-glass-img">');

            this.$glass_img_elem = $("#xj-glass-img")
              .attr({
                  'id' : 'xj-glass-img',
                  'src' : this.glass_image
              })
              .css({
                  'position' : 'absolute',
                  'width': '100％',
                  'left' : '0',
                  'top' : '100%',
                  'transition' : 'all 1s ease-out',
                  'transform' : 'translate(0%, 0%)',
                  'user-drag': 'none',
                  'user-select': 'none'
              })
              .load(function () {

              })
              .error(function(){
                  // debug('眼镜图片加载失败');
              });
        }
        if(!this.$form_elem){
            stage_elem.append('<form id="xj-form" enctype="multipart/form-data"><input type="file" name="user-image" hidden></form>');
            this.$form_elem = $("#xj-form").hide();
        }

        // this.setUrl(this.$user_img_elem[0].src);

    };

    // 切换眼镜
    XjxxTryon.prototype.tryon = function tryon(resourceObj){

        if(resourceObj.glass_image) {
            debug('切换眼镜');
            return this.changeGlass(resourceObj.glass_image);
        }

    };

    // 切换眼镜
    XjxxTryon.prototype.changeGlass = function changeGlass(glass_image){
        this.glass_image = glass_image;
        this.$glass_img_elem[0].src = glass_image;

    };

    // 切换用户
    XjxxTryon.prototype.changeUser = function changeUser(user_image){
        this.user_image = user_image;
        this.$user_img_elem[0].src = user_image;
    };


    function debug(msg){
        if (DEBUG) {
            console.log(msg);
        }
    }

    XjxxTryon.prototype.debugPoints = function debug_points( img_size, result){

        $('head').append('<style>' +
          '.debug-eye{height: 6px;width: 6px;border-radius: 3px;background-color: rgba(235, 68, 0, 0.84);position: absolute;}' +
          '</style>');

        var eye_left_ratio = result.face[0].position.eye_left;
        var eye_right_ratio =  result.face[0].position.eye_right;
        var center_ratio = calcCenterRatio( eye_left_ratio, eye_right_ratio );

        this.$stage_elem.append('<div id="left-eye" class="debug-eye"></div>');
        this.$stage_elem.append('<div id="right-eye" class="debug-eye"></div>');
        this.$stage_elem.append('<div id="center-eye" class="debug-eye"></div>');

        var left_label_elem = document.getElementById('left-eye');
        var right_label_elem = document.getElementById('right-eye');
        var center_label_elem = document.getElementById('center-eye');

        placeElement(left_label_elem, calcPixelPosition( img_size, eye_left_ratio ));
        placeElement(right_label_elem, calcPixelPosition( img_size, eye_right_ratio));
        placeElement(center_label_elem, calcPixelPosition( img_size, center_ratio ));
    };
    XjxxTryon.prototype.setUrl = function setUrlImage(image_url) {
        this.result = void 0;
        this.$glass_img_elem.css({
           'transition' : 'all 1s'
        });

        if(!this.$form_elem){
            throw new Error('未初始化成功');
        }
        var xj = this;
        $.ajax({
            type: 'POST',
            url : API_URL,
            data : {
                'url': image_url,
                'key': SECRET_KEY
            },
            crossDomain : true
        }).done(
          function reInit(result){
              xj.result = JSON.parse(JSON.parse(result));

              if (xj.$glass_img_elem[0].src) {
                  xj.placeGlass(xj.result);
              }
          }
        ).fail(
          function ajaxFail(data){
              console.log('失败,请重试');
          }
        );
    };
    XjxxTryon.prototype.upload = function uploadUserImage(imgUrl) {
        if (imgUrl) {
            return this.setUrl(imgUrl);
        }

        this.$glass_img_elem.css({
            'transition' : 'all 1s'
        });
        this.result = void 0;
        if(!this.$form_elem){
            throw new Error('未初始化成功');
        }
        this.$form_elem.find('input').trigger('click');
        this.$form_elem.change(ajaxUpload);

        var xj = this;
        function ajaxUpload(e){

            var formData =  new FormData(xj.$form_elem[0]);
            formData.append('key',SECRET_KEY);

            var file    = e.target.files[0];
            var reader  = new FileReader();

            reader.addEventListener("load", function (e) {
                xj.$user_img_elem[0].src = e.target.result;
            }, false);

            reader.readAsDataURL(file);

            // todo fake ajax
            setTimeout(function(){
                xj.placeGlass(xj.result);
            },1000);


            $.ajax({
                type: 'POST',
                url : API_URL,
                data : formData,
                crossDomain : true,
                processData: false,  // tell jQuery not to process the data
                contentType: false
            }).done(
              function reInit(result){

                  xj.result = JSON.parse(JSON.parse(result));

                  if (xj.$glass_img_elem[0].src) {
                      xj.placeGlass(xj.result);
                  }
              }
            ).fail(
              function ajaxFail(data){
                  console.log('失败,请重试');
              }
            );
        }
    };
    XjxxTryon.prototype.placeGlass = function placeGlass(result){


        var pd_scale_ratio = 1.91;
        var img_elem = this.$user_img_elem[0];
        var img_size = {
            w: img_elem.width,
            h: img_elem.height
        };

        var test_res = {
            "face": [
                {
                    "attribute": {
                        "age": {
                            "range": 5,
                            "value": 13
                        },
                        "gender": {
                            "confidence": 99.9995,
                            "value": "Female"
                        },
                        "glass": {
                            "confidence": 96.6582,
                            "value": "None"
                        },
                        "pose": {
                            "pitch_angle": {
                                "value": -2e-06
                            },
                            "roll_angle": {
                                "value": 10.523
                            },
                            "yaw_angle": {
                                "value": -22.658714
                            }
                        },
                        "race": {
                            "confidence": 62.015,
                            "value": "White"
                        },
                        "smiling": {
                            "value": 5.00965
                        }
                    },
                    "face_id": "eea514d001ecefa8f7756e2eac0f4ed2",
                    "position": {
                        "center": {
                            "x": 41.27451,
                            "y": 28.72549
                        },
                        "eye_left": {
                            "x": 33.034902,
                            "y": 19.056804
                        },
                        "eye_right": {
                            "x": 55.074706,
                            "y": 23.150784
                        },
                        "height": 41.764706,
                        "mouth_left": {
                            "x": 33.237647,
                            "y": 42.720392
                        },
                        "mouth_right": {
                            "x": 47.164902,
                            "y": 45.752745
                        },
                        "nose": {
                            "x": 37.180392,
                            "y": 32.807451
                        },
                        "width": 41.764706
                    },
                    "tag": ""
                }
            ],
            "img_height": 510,
            "img_id": "a5528bf436c82bd80999fdf653bdaed8",
            "img_width": 510,
            "session_id": "d0ab0b108ed94e6795b943c533a8f29d",
            "url": "http://p3.wmpic.me/article/2014/09/09/1410252278_tdXyHfac.jpg"
        };

        result = test_res;

        // console.log( this);
        
        var glass_elem = this.$glass_img_elem[0];
        glass_elem.style.opacity = 1;
        glass_elem.addEventListener("transitionend", function cancelTransition(){
            this.style.transition = 'none';
        }, false);


        if  (!result || !result.face || !result.face.length) {
            placeElement(glass_elem, calcPixelPosition( img_size, { x:0 , y:50} ));
            rotate3dElement(glass_elem , 0 , 0 , 0);
            this.hammerInit();

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

        if (!this.hammer) {
            this.hammerInit();
        }

        if (DEBUG) {
            this.debugPoints(img_size, result);
        }

    };


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
        var w = label_elem.getBoundingClientRect().width * scale_ratio;
        var h = label_elem.getBoundingClientRect().height * scale_ratio;
        label_elem.style.width = label_elem.getBoundingClientRect().width * scale_ratio + 'px';
        return {
            w : w,
            h : h
        };
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


    XjxxTryon.prototype.hammerInit = function hammerInit(){

        var stage = this.$stage_elem[0];
        var target_elem = this.$glass_img_elem[0];
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

            if (!newValue) {
                //  getter
                func_pattern = new RegExp(funcName + '\\((.+?)\\)');
                return func_pattern.exec(elem.style.transform) && func_pattern.exec(elem.style.transform)[1];
            } else {

                //  setter
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

