
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
                                        <li class="last"><a href="javascript:;" onclick="deleterole({{$v['id']}})">删除</a></li>
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


            <!-- 添加角色 -->
            <div id="add-role" style="display: none;">
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
        var content = $("#add-role").html();
        $(".clear").click(function () {
            $(".rolename").val("");
        });
        
        $(".choseicon").click(function () {
           showicon($(this));
        });
        
        $(".btn-add").click(function () {
            $("#add-role").remove();
            layer.open({
                type: 1,
                title: '添加角色',
                skin: 'layui-layer-rim', //加上边框
                area: ['400px', '300px'], //宽高
                content: content
            });
            $(".choseicon").click(function () {
                showicon($(this));
            });
            $(".btn-save").click(function () {
                var rolename = $("#rolename").val();
                if(!rolename){
                    layer.alert('请输入角色名称！');
                    return false;
                }
                $.ajax({
                    url:'/role/add',
                    type:'POST',
                    data:'rolename='+rolename+'&_token={{csrf_token()}}',
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
    function deleterole(id) {
        if(id){
            $.ajax({
                url:'/role/del',
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
</script>
</html>