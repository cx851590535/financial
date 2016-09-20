
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
                    账号：<input type="text" class="form-search search account" value="{{$data['account']}}" onkeydown="checkEnter()"/>
                    昵称：<input type="text" class="form-search search nickname" value="{{$data['nickname']}}" onkeydown="checkEnter()"/>
                    角色：<div class="ui-select">
                            <select class="form-search role">
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
                            <select class="form-search status">
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

                        <a class="btn-flat default" onclick="redirect()">搜索</a>
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
                                        <li><a href="javascript:;" onclick="modifyuser('{{$v['uid']}}','{{$v['status']}}')">{{$v['status']==1?'禁用':'启用'}}</a></li>
                                        <li class="last"><a href="javascript:;" onclick="deleteuser({{$v['uid']}})">删除</a></li>
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


            <!-- 添加用户 -->
            <div id="add-user" style="display: none;">
                <div class="row-fluid form-wrapper" style="margin: 5%;width:95%;">
                    <!-- left column -->
                    <div class="span8 column">
                        <form >
                            <div class="field-box">
                                <label>账户:</label>
                                <input class="span8" type="text" id="account" onblur="checkUser()"/>

                            </div>
                            <div class="field-box">
                                <label>昵称:</label>
                                <input type="text" class="span8" id="nickname">
                            </div>
                            <div class="field-box">
                                <label>密码:</label>
                                <input type="password" class="span8 password" id="password">
                            </div>
                            <div class="field-box">
                                <label>角色:</label>
                                <div class="ui-select">
                                    <select class="form-search role" id="role">
                                        @foreach($data['role'] as $v)
                                            <option value="{{$v['id']}}"/>{{$v['name']}}
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field-box">
                                <label>状态:</label>
                                <div class="ui-select">
                                    <select class="form-search status" id="status">
                                        <option value="1"/>启用
                                        <option value="2"/>禁用
                                    </select>
                                </div>
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
<script>
    $(function () {
        var content = $("#add-user").html();
        $(".clear").click(function () {
            $(".form-search ").val("");
        });
        
        $(".btn-add").click(function () {
            $("#add-user").remove();
            layer.open({
                type: 1,
                title: '添加用户',
                skin: 'layui-layer-rim', //加上边框
                area: ['800px', '600px'], //宽高
                content: content
            });
            $(".btn-save").click(function () {
                var account = $("#account").val();
                var nickname = $("#nickname").val();
                var password = $("#password").val();
                var role = $("#role").val();
                var status = $("#status").val();
                if(!account){
                    layer.alert('请输入账户！');
                    return false;
                }
                if(!password){
                    layer.alert('请输入密码！');
                    return false;
                }
                if($(".icon-remove-sign").length>0){
                    return false;
                }
                $.ajax({
                    url:'/user/add',
                    type:'POST',
                    data:'account='+account+'&nickname='+nickname+'&password='+password+'&role='+role+'&status='+status+'&_token={{csrf_token()}}',
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
    function checkUser() {
        var account = $("#account").val();
        if(!account){
            $("#account").parent("div").removeClass("success").addClass("error")
            $("#account").parent("div").append("<span class='alert-msg' id='showmsg'><i class='icon-remove-sign'></i> 账户不能为空</span>");
            $("#account").focus();
            return false;
        }
        $.ajax({
            url:'/user/check',
            type:'POST',
            data:'account='+account+'&_token={{csrf_token()}}',
            success:function (data) {
                if(data.code!=200){
                    $("#showmsg").remove();
                    $("#account").parent("div").removeClass("success").addClass("error")
                    $("#account").parent("div").append("<span class='alert-msg' id='showmsg'><i class='icon-remove-sign'></i> "+data.msg+"</span>");
                    $("#account").select();
                }else{
                    $("#showmsg").remove();
                    $("#account").parent("div").removeClass("error").addClass("success")
                    $("#account").parent("div").append("<span class='alert-msg' id='showmsg'><i class='icon-ok-sign'></i> 用户名可以使用</span>");
                }
            }
        })
    }
    function redirect() {
        var url="?account="+$(".account").val()+"&nickname="+$(".nickname").val()+"&role="+$(".role").val()+"&status="+$(".status").val()+"&perpage={{$data['per_page']}}";
        location.href=url;
    }
    function checkEnter(event){
        if(event.keyCode==13){
            redirect();
        }
    }
    function modifyuser(uid,status) {
        if(!uid||!status){
            layer.alert('修改失败，请刷新页面后再试！');
            return false;
        }
        $.ajax({
            url:'/user/forbid',
            type:'POST',
            data:'uid='+uid+'&status='+status+'&_token={{csrf_token()}}',
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
    function deleteuser(uid) {
        if(uid){
            $.ajax({
                url:'/user/del',
                data:'uid='+uid+'&_token={{csrf_token()}}',
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