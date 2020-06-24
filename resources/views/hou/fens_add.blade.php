<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>话题添加-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="js/uploadify/uploadify.css">
    <script src="js/uploadify/jquery.uploadify.js"></script>
    <style>
        .show img {
            width:  200px;
            height: 200px;
        }
        .show video {
            width:  240px;
            height: 150px;
        }
    </style>
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">公共管理</a>&nbsp;-</span>&nbsp;分类添加
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTopNo">
                <span>话题添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    分类名称：<input type="text" id="ming" class="input3" />
                </div>
                <div class="bbD">
                    是否显示：<label><input type="radio" checked="checked"
                                       name="styleshoice2" value="1" />&nbsp;是</label><label><input type="radio"
                                                                                          name="styleshoice2" value="2" />&nbsp;否</label>
                </div>
                <input type="file" name="file_upload" id = "file_upload">
                <div class="show">

                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" onclick="dian()">提交</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>
</body>
<script>
    function dian() {
        var ming = $('#ming').val();
        var xian = $("input:radio:checked").val();
        $.ajax({
            url:'/fen_adds',
            type:'get',
            dataType:'json',
            data:{
                'ming':ming,
                'xian':xian

            },
            success:function (hat) {
                if (hat.ming == '成功'){
                    location.href="/fen_zhan";
                } else {
                    alert(hat.ming);
                }
            }
        })
    }

</script>
</html>
<script>
    $(document).ready(function(){
        $("#file_upload").uploadify({
            'swf' : "/js/uploadify/uploadify.swf",
            'uploader' : "/fens_tu",
            'buttonText' : "上传",
            onUploadSuccess:function(msg,newFilePath,info){
                //var img_str="<img src = '"+newFilePath+"'>";
                var video_str='<video src="'+newFilePath+'" controls="controls"></video>';
                $(".show").append(video_str);
            }
        });
    });
</script>