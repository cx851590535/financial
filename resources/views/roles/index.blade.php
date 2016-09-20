
@include('layout.top')

@include('layout.left')

<!-- main container -->
<div class="content">

    @include('layout.skin')

    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">

            <!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>角色信息</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        角色名称：
                        <input type="text" class="search rolename" placeholder="查找" onkeydown="checkEnter(event)" value="{{$data['rolename']}}"/>
                        <a class="btn-flat danger clear">清空条件</a>
                        <a class="btn-flat success btn-add">添加角色</a>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span9">
                                角色名称
                            </th>
                            <th class="span3">
                                <span class="line"></span>操作
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        @foreach($data['data'] as $k => $v)
                            <tr class="first tbl_tr_{{$v['id']}}">
                                <td>
                                    <label>
                                        <input type="hidden" value="{{$v['id']}}"/>
                                        {{$v['name']}}
                                    </label>
                                </td>
                                <td>
                                    <ul class="actions">
                                        <li><a href="javascript:;" onclick="modifypermission({{$v['id']}} ,$(this))">修改</a></li>
                                        <li class="last"><a href="javascript:;" onclick="deletepermission({{$v['id']}})">删除</a></li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end products table -->
            @include('layout.paginat')


            <!-- 添加权限 -->
            <div id="add-permission" style="display: none;">
                <div class="row-fluid form-wrapper" style="margin: 5%;width:95%;">
                    <!-- left column -->
                    <div class="span8 column">
                        <form >
                            <div class="field-box">
                                <label>角色名称:</label>
                                <input class="span8" type="text" id="rolename"/>
                            </div>

                            <a class="btn-flat success btn-save">保存</a>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- end main container -->

</body>
<style>
    .icons-wrapper{
        cursor: pointer;
    }
    .icons-wrapper li:hover{
        color: #0a1af5;
    }
</style>
<script>
    $(function () {
        var content = $("#add-permission").html();
        $(".clear").click(function () {
            $(".rolename").val("");
        });
        
        $(".choseicon").click(function () {
           showicon($(this));
        });
        
        $(".btn-add").click(function () {
            $("#add-permission").remove();
            layer.open({
                type: 1,
                title: '添加权限',
                skin: 'layui-layer-rim', //加上边框
                area: ['800px', '600px'], //宽高
                content: content
            });
            $(".choseicon").click(function () {
                showicon($(this));
            });
            $(".btn-save").click(function () {
                var pname = $("#pname").val();
                var picon = $("#classadd").val();
                var proute = $("#proute").val();
                var pdescri = $("#pdescri").val();
                var pfid = $("#pfid").val();
                var porder = $("#porder").val();
                var type = $("#type").val();
                if(!pname){
                    layer.alert('请输入名称！');
                    return false;
                }
                $.ajax({
                    url:'/permission/add',
                    type:'POST',
                    data:'pname='+pname+'&picon='+picon+'&proute='+proute+'&pdescri='+pdescri+'&type='+type+'&pfid='+pfid+'&porder='+porder+'&_token={{csrf_token()}}',
                    success:function (data) {
                        if(data.code==200){
                            layer.alert('添加成功！');
                            location.reload();
                        }else{
                            layer.alert(data.msg,2000);
                        }
                    }
                });
            });
        });

    });
    function checkEnter(event){
        if(event.keyCode==13){
            var url="?rolename="+$(".rolename").val()+"&perpage={{$data['per_page']}}";
            location.href=url;
        }
    }
    function hrefadd(url) {
        url += "&rolename={{$data['rolename']}}";
        location.href = url;
    }
    function modifypermission(id,obj) {
        if(obj.html()=='修改'){
            $(".tbl_tr_"+id).find("label").hide();
            $(".tbl_tr_"+id).find(".modifyform").removeClass('hide').show();
            obj.html('保存')
        }else{
            var pname = $(".tbl_tr_"+id).find(".display_name").val();
            var picon = $(".tbl_tr_"+id).find(".classname").val();
            var proute = $(".tbl_tr_"+id).find(".name").val();
            var pdescri = $(".tbl_tr_"+id).find(".pdescription").val();
            var pfid = $(".tbl_tr_"+id).find(".fid").val();
            var porder = $(".tbl_tr_"+id).find(".porder").val();
            var type = $(".tbl_tr_"+id).find(".type").val();;
            if(!pname){
                layer.alert('请输入名称！');
                return false;
            }
            if(!id){
                layer.alert('修改失败，请刷新页面后再试！');
                return false;
            }
            $.ajax({
                url:'/permission/add',
                type:'POST',
                data:'id='+id+'&pname='+pname+'&picon='+picon+'&proute='+proute+'&pdescri='+pdescri+'&type='+type+'&pfid='+pfid+'&porder='+porder+'&_token={{csrf_token()}}',
                success:function (data) {
                    if(data.code==200){
                        layer.alert('修改成功！');
                        location.reload();
                    }else{
                        layer.alert(data.msg,2000);
                    }
                }
            });
        }

    }
    function deletepermission(id) {
        if(id){
            $.ajax({
                url:'/permission/del',
                data:'id='+id+'&_token={{csrf_token()}}',
                type:'post',
                success:function (data) {
               if(data.code==200){
                   layer.alert('删除完成');
                   location.reload();
               }else{
                   layer.alert(data.msg);
               }
            }});
        }
    }
    function showicon(obj){
        var key = obj.attr("key");
        if($("#class"+key).val()){
            $(".icons-wrapper").find("."+$("#class"+key).val()).parent("li").css("color","#d82a2a");
        }

        layer.open({
            type: 1,
            title: '请选择图标',
            skin: 'layui-layer-rim', //加上边框
            area: ['800px', '600px'], //宽高
            content: $("#iconstyles").html()
        });
        $(".icons-wrapper").find("li").click(function () {
            var iconclass = $(this).find("i").attr("class");
            $("#class"+key).val(iconclass);
            $("#i"+key).removeClass().addClass(iconclass);
            $(".icons-wrapper").find("li").css("color","#333333");
            $(this).css("color","#d82a2a");
        });
    }
</script>
</html>