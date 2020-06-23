<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>广告-有点</title>
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
        <!-- banner页面样式 -->
        <div class="banner">
            <div class="add">
                <a class="addA" href="/banner_add">上传广告&nbsp;&nbsp;+</a>
            </div>
            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">序号</td>
                        <td width="308px" class="tdColor">名称</td>
                        <td width="450px" class="tdColor">链接</td>
                        <td width="215px" class="tdColor">是否显示</td>
                        <td width="180px" class="tdColor">排序</td>
                        <td width="125px" class="tdColor">操作</td>
                    </tr>
                    @foreach($data as $v)
                    <tr ba="{{$v->id}}">
                        <td >{{$v->id}}</td>
                        <td>{{$v->name}}</td>
                        <td><a class="bsA" href="{{$v->lian}}">{{$v->lian}}</a></td>
                        <td xian="xian"><span id="xian">
                            @if($v->xian == 1)
                            是
                                @endif
                                @if($v->xian == 2)
                                    否
                                @endif
                            </span>
                            <input type="text" class="xian" value="@if($v->xian == 1)是@elseif($v->xian == 2)否@endif"  style="display:none"/>
                        </td>
                        <td xv="xv"><span id="dian">{{$v->xv}}</span>
                            <input type="text" value="{{$v->xv}}" id="shi"  style="display:none" />
                        </td>
                        <td><img class="operation"  onclick="pu(this)"
                                                          src="img/update.png"> <img onclick="shi(this)"
                                                                                         src="img/delete.png"> </td>
                    </tr>
                        @endforeach
                </table>
                <div class="paging">{{$data->links()}}</div>
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
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
            <a href="#" class="ok yes" onclick="del()">确定</a><a class="ok no">取消</a>
        </p>
    </div>
</div>
<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
    $(document).on('click','#dian',function() {
        var _this = $(this);
        _this.hide();
        _this.next('input').show().focus();
    })
    $(document).on('click','#xian',function() {
        var _this = $(this);
        _this.hide();
        _this.next('input').show().focus();
    })
    $(document).on('blur','#shi',function () {
        var  ban = $(this);
        var  ban_val = ban.val();
        var  ban_ke = ban.parent().attr('xv');
        var  ban_id = ban.parents('tr').attr('ba');
        $.ajax({
            url:'banner_upd',
            type:'get',
            dataType:'json',
            data:{
                'id':ban_id,
                'ban_ke':ban_ke,
                'ban_val':ban_val
            },
            success:function (ts) {
                if (ts.ming == '成功'){
                    ban.prev('span').text(ban_val).show();
                    ban.hide();
                } else {
                    ban.prev('span').show();
                    ban.hide();                }
            }
        })
    })
    $(document).on('blur','.xian',function () {
        var  ban = $(this);
        var  ban_val = ban.val();
        if (ban_val == '是'){
           var ban_va = 1;
        }else if(ban_val == '否'){
           var ban_va = 2;
        }else {
            alert('请输入“是”或“否”');
            location.reload();
        }
        var  ban_ke = ban.parent().attr('xian');
        var  ban_id = ban.parents('tr').attr('ba');
        $.ajax({
            url:'banner_upd',
            type:'get',
            dataType:'json',
            data:{
                'id':ban_id,
                'ban_ke':ban_ke,
                'ban_val':ban_va
            },
            success:function (ts) {
                if (ts.ming == '成功'){
                    ban.prev('span').text(ban_val).show();
                    ban.hide();
                } else {
                    ban.prev('span').show();
                    ban.hide();                }
            }
        })
    })
  function shi(a){
      var td = a.parentNode;
      var tr = td.parentNode;
      var id=tr.cells[0].innerHTML;
      //alert(id);
      $.ajax({
          url:'banner_shan',
          type:'get',
          dataType:'json',
          data:{
              'id':id
          },
          success:function (ts) {
              if (ts.ming == '成功'){
                  location.reload();
              } else {
                  alert('删除失败');
              }
          }
      })
  }
      function pu(a){
          var td = a.parentNode;
          var tr = td.parentNode;
          var id=tr.cells[0].innerHTML;
          //alert(id);
          $.ajax({
              url:'banner_up',
              type:'get',
              dataType:'json',
              data:{
                  'id':id
              },
              success:function (ts) {
                  if (ts.ming == '成功'){
                      location.reload();
                  } else {
                      alert('删除失败');
                  }
              }
          })
      }
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

    function del(){
        var input=document.getElementsByName("check[]");
        for(var i=input.length-1; i>=0;i--){
            if(input[i].checked==true){
                //获取td节点
                var td=input[i].parentNode;
                //获取tr节点
                var tr=td.parentNode;
                //获取table
                var table=tr.parentNode;
                //移除子节点
                table.removeChild(tr);
            }
        }
    }
</script>
</html>