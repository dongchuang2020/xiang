<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/vue.js"></script>
    <script type="text/javascript" src="js/axios.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>上传广告</span>
            </div>
            <div class="baBody" >
                <div class="bbD">
                    链接名称：<input type="text" id="ming" @keyup.enter="shi" class="input1" />
                </div>
                <div class="bbD">
                    链接地址：<input type="text" id="lian" class="input1" />
                </div>
                <div class="bbD">
                    是否显示：<label><input type="radio"  value="1" >是</label> <label><input
                                type="radio"  value="2">否</label>
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input id="xv" class="input2"
                                                                  type="text" />
                </div>
                <div class="bbD">
                    <p class="bbDP" id="add">
                        <button class="btn_ok btn_yes" id="shi">提交</button>
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
   $(document).on('click','#shi',function () {
    var xian = $("input:radio:checked").val();
    var ming = $("#ming").val();
    var xv = $("#xv").val();
    var lian = $("#lian").val();
    $.ajax({
        url:'banner_in',
        type:"get",
        dataType:"json",
        data:{
            'ming':ming,
            'lian':lian,
            'xian':xian,
            'xv':xv
        },
        success:function (ra) {
           if (ra.ming == "成功"){
               location.href="banner";
           } else {
               alert(ra.ming);
           }
        }

    })
   })
</script>
</html>