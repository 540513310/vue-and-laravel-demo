<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Api Demo</title>
    <style>
        #xj-tryon {
            width: 400px;
        }
    </style>
</head>
<body>
    <div id="xj-tryon"></div>

    <button id="change-glass">换眼镜</button>
    <button id="change-user">换头像</button>
    <button id="upload-user">上传头像</button>

    <!-- 依赖 JQuery -->
    <script src="/js/jquery.min.js"></script>
    <!-- 依赖 Hammer.js -->
    <script src="/js/hammer.min.js"></script>
    <script src="/js/xjxx.js"></script>

    <script>
        !function init(){

            // 初始化实例
            var xj =  new XjxxTryon({
//                    "API_URL"    : 'http://www.xiaojingxiuxiu.com/api/v1/corstryon',
                    "API_URL"    : 'http://localhost:8000/api/v1/corstryon',
                    "SECRET_KEY" : 'ff229df3b09e9a6257533cfd3c6547003a10bbf5',
                    "STAGE"      : '#xj-tryon', // 试戴元素的选择符
                    "DEBUG"      : true // 是否输出调试信息到控制台，默认为false
                });

            // 开始试戴
            xj.tryon({
                "glass_image" : "/tmp/BT1-3.png" // 眼镜图片URL或base64编码
            });


            $('#change-glass').click(function(){
                // 切换眼镜
                xj.tryon({
                    "glass_image" : "/tmp/CB021.png" // 眼镜图片URL或base64编码
                });
            });

            $('#change-user').click(function(){
                 // 切换用户照片
                xj.tryon({
                    "user_image" : "" // 用户图片URL或base64编码
                });
            });

            $('#upload-user').click(function(){
                // 切换用户照片
                xj.upload();
            });


        }()
    </script>
</body>
</html>