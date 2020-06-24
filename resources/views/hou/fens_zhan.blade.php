<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>话题管理-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
        </div>
    </div>

    <div class="page">
        <!-- topic页面样式 -->
        <div class="topic">
            <div class="conform">
                <form>
                    <div class="cfD">
                        {{--<input class="addUser" type="text" placeholder="话题ID/行家UID/话题标题" />
                        <button class="button">搜索</button>--}}
                        <a class="addA addA1" href="/fens_add">添加话题+</a>
                    </div>
                </form>
            </div>
            <!-- topic表格 显示 -->
            <div class="conShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">序号</td>
                        <td width="200px" class="tdColor">分来名称</td>
                        <td width="125px" class="tdColor">添加时间</td>
                        <td width="160px" class="tdColor">显示</td>
                        <td width="130px" class="tdColor">操作</td>
                    </tr>
                   {{-- @foreach($data as $v)
                    <tr fen_id="{{$v->fen_id}}">
                        <td>{{$v->fen_id}}</td>
                        <td>{{$v->fen_name}}</td>
                        <td>{{date('Y-m-d H:i:s',$v->fen_time)}}</td>
                        <td>
                            @if($v->fen_sian == 1)是@elseif($v->fen_sian == 2)否@endif
                        </td>
                        <td><img class="operation" id="pu"
                                                               src="img/update.png"></a> <img class="operation delban"
                                                                                           id="shan"   src="img/delete.png"></td>
                    </tr>
                        @endforeach
                </table>
                <div class="paging">{{$data->links()}}</div>
            </div>--}}
            <!-- topic 表格 显示 end-->
        </div>
        <!-- topic页面样式end -->
    </div>

</div>


<!-- 删除弹出框 -->
<div class="banDel">
    <div class="delete">
        <div class="close">
            <a><img src="img/shanchu.png" /></a>
        </div>
        <p class="delP1">你确定要删除此条记录吗？</p>
        <p class="delP2">
            <a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
        </p>
    </div>
</div>
<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
    $(document).on('click','#shan',function () {
        var  _this = $(this);
        var  _id = _this.parents('tr').attr('fen_id');
        $.ajax({
            url:'fen_da',
            type:'get',
            dataType:'json',
            data:{
                'id':_id
            },
            success:function (ht) {
                if (ht.ming == '成功'){
                    location.reload();
                } else{
                    alert('删除失败')
                }

            }
        })
    })
    $(document).on('click','#pu',function () {
        var  _this = $(this);
        var  _id = _this.parents('tr').attr('fen_id');
        location.href='fen_pu?id='+_id;
    })
    // 广告弹出框
    $(".delban").click(function(){
        $(".banDel").show();
    });
    $(".close").click(function(){
        $(".banDel").hide();
    });
    $(".no").click(function(){
        $(".banDel").hide();
    });
    // 广告弹出框 end
</script>
</html>