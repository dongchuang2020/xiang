<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>话题添加-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">公共管理</a>&nbsp;-</span>&nbsp;分类修改
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTopNo">
                <span>话题添加</span>
            </div>
            <div class="baBody">
                <div class="bbD"><input type="hidden" id="fen_id" value="{{$data->fen_id}}"/>
                    分类名称：<input type="text" id="ming" value="{{$data->fen_name}}" class="input3" />
                </div>
                <div class="bbD">
                    是否显示：<label><input type="radio" {{$data->fen_sian == 1 ?'checked':''}}
                                       name="styleshoice2" value="1" />&nbsp;是</label><label><input type="radio" {{$data->fen_sian == 2 ?'checked':''}}
                                                                                          name="styleshoice2" value="2" />&nbsp;否</label>
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" onclick="dian()">修改</button>
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
        var fen_id = $('#fen_id').val();
        var xian = $("input:radio:checked").val();
        $.ajax({
            url:'/fen_pus',
            type:'get',
            dataType:'json',
            data:{
                'ming':ming,
                'xian':xian,
                'id':fen_id

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