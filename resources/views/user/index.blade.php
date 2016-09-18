
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
                        <h4>用户信息</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    账号：<input type="text" class="search searchvalue" value="{{$data['account']}}"/>
                    昵称：<input type="text" class="search searchvalue" value="{{$data['nickname']}}"/>
                    角色：<div class="ui-select">
                            <select class="searchkey">
                                <option value=""/>请选择
                                @foreach($data['role'] as $v)
                                <option value="{{$v['id']}}"
                                        @if($data['roleid']==$v['id'])
                                        selected
                                        @endif
                                />{{$v['name']}}
                                @endforeach
                            </select>
                        </div>
                    状态：<div class="ui-select">
                            <select class="searchkey">
                                <option value=""/>请选择
                                <option value="1"
                                        @if($data['status']==1)
                                        selected
                                        @endif
                                />启用
                                <option value="2"
                                          @if($data['status']==2)
                                          selected
                                        @endif
                                />禁用

                            </select>
                        </div>

                        <a class="btn-flat danger clear">搜错</a>
                        <a class="btn-flat danger clear">清空条件</a>
                        <a class="btn-flat success btn-add">添加用户</a>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                账号
                            </th>
                            <th class="span3">
                                <span class="line"></span>昵称
                            </th>
                            <th class="span3">
                                <span class="line"></span>角色
                            </th>
                            <th class="span3">
                                <span class="line"></span>状态
                            </th>
                            <th class="span3">
                                <span class="line"></span>创建时间
                            </th>
                            <th class="span3">
                                <span class="line"></span>上次登录时间
                            </th>
                            <th class="span3">
                                <span class="line"></span>操作
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        @foreach($data['data'] as $k => $v)
                            <tr class="first tbl_tr_{{$v['uid']}}">
                                <td>
                                    <label>
                                        <input type="hidden" value="{{$v['uid']}}"/>
                                        {{$v['account']}}
                                    </label>
                                </td>
                                <td class="nickname">
                                    <label>
                                    {{$v['nickname']}}
                                    </label>
                                </td>
                                <td class="role">
                                    <label>
                                        {{$v['rolename']}}
                                    </label>
                                </td>
                                <td class="status">
                                    <label>
                                        {{$v['status']==1?'启用':'禁用'}}
                                    </label>

                                </td>
                                <td class="created_at">
                                    <label>
                                        {{$v['created_at']}}
                                    </label>

                                </td>
                                <td class="updated_at">
                                    <label>
                                        {{$v['updated_at']}}
                                    </label>
                                </td>
                                <td>
                                    <ul class="actions">
                                        <li><a href="javascript:;" onclick="modifyuser('{{$v['uid']}}')">禁用</a></li>
                                        <li class="last"><a href="javascript:;" onclick="deletepermission({{$v['uid']}})">删除</a></li>
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
                                <label>名称:</label>
                                <input class="span8" type="text" id="pname"/>
                            </div>
                            <div class="field-box">
                                <label>图标:</label>
                                <i class="" id="iadd"></i>
                                <a class="choseicon" key="add" style="cursor: pointer;text-decoration: none;">选择图标</a>
                                <input type="hidden" class="classname" id="classadd">
                            </div>
                            <div class="field-box">
                                <label>路由:</label>
                                <input class="span8" type="text" id="proute"/>
                            </div>
                            <div class="field-box">
                                <label>描述:</label>
                                <input class="span8" type="text" id="pdescri"/>
                            </div>
                            <div class="field-box">
                                <label>父级目录:</label>
                                <div class="ui-select">
                                    <select class="fid " id="pfid">
                                        <option value="0" selected/>无
                                            @foreach($data['role'] as $key => $val)
                                                <option value="{{$val['id']}}" />{{$val['display_name']}}
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field-box">
                                <label>类型:</label>
                                <div class="ui-select">
                                    <select class="type " id="type">
                                        <option value="1" selected/>菜单
                                        <option value="2" />功能
                                    </select>
                                </div>
                            </div>
                            <div class="field-box">
                                <label>序号（越小越靠前）:</label>
                                <input class="span8" type="text" id="porder"/>
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
            $(".searchkey").val("");
            $(".searchvalue").val("");
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
            var url="?searchkey="+$(".searchkey").val()+"&searchvalue="+$(".searchvalue").val()+"&perpage={{$data['per_page']}}";
            location.href=url;
        }
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

    function hrefadd(url) {
        url += "&account={{$data['account']}}&nickname={{$data['nickname']}}&roleid={{$data['roleid']}}&status={{$data['status']}}";
        location.href = url;
    }


</script>
</html>