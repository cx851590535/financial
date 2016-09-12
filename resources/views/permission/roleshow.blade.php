

@include('layout.top')
<link rel="stylesheet" href="/css/compiled/grids.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/css/compiled/form-showcase.css" type="text/css" media="screen">
<link rel="stylesheet" href="/css/lib/uniform.default.css" type="text/css">
<link rel="stylesheet" href="/css/lib/font-awesome.css" type="text/css">
<script src="/js/jquery.uniform.min.js"></script>
<script type="text/javascript">
    $(function () {

        // add uniform plugin styles to html elements
        $("input:checkbox").uniform();


    });
</script>

@include('layout.left')

<!-- main container -->
<div class="content">

@include('layout.skin')

    <div class="container-fluid section">
        <div id="pad-wrapper">
            <!-- grid with .row-fluid -->
            <div class="grid-wrapper">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>权限分配</h4>
                    </div>
                </div>
                <div class="row-fluid form-wrapper payment-info">
                    <div class="span8">
                        <form>
                            <div class="field-box">
                                <label>角色选择:</label>
                                <select id="plan" class="span5">
                                    <option value="0">请选择</option>
                                    @foreach($data['roles'] as $k => $v)
                                        <option value="{{$v['id']}}">{{$v['name']}}</option>
                                    @endforeach
                                </select>
                                <a class="btn-flat success bt-save">保存</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row-fluid form-page">
                    <div class="span12 form-wrapper" style="text-align: left">
                        <label class="checkbox" style="font-weight: 600">
                            <div class="checker">
                                    <span>
                                        <input type="checkbox" class="check-all">
                                    </span>
                            </div>
                            全选
                        </label>
                        <br><br>
                        @foreach($data['permissions'] as $k => $v)
                            <div class="row-fluid" style="border: 1px solid #edeff1;">
                                <div class="span12 form-wrapper" style="text-align: left">
                                    <label class="checkbox" style="font-weight: 600">
                                        <div class="checker">
                                            <span>
                                                <input type="checkbox" id="check{{$v['id']}}" class="checkbox_f" value="{{$v['id']}}">
                                            </span>
                                        </div>
                                        {{$v['display_name']}}({{$v['description']}})
                                    </label>
                                    <br><br>
                                    @if(isset($v['item'])&&count($v['item'])>0)
                                    <div class="row-fluid">
                                       @foreach($v['item'] as $key => $val)
                                             <div class="span3" style="text-align: left">
                                                <label class="checkbox" style="width: 100%">
                                                    <div class="checker">
                                                    <span>
                                                        <input type="checkbox"  class="check_{{$val['fid']}}" value="{{$val['id']}}" key="{{$val['fid']}}" onchange="checkF($(this))">
                                                    </span>
                                                    </div>
                                                    {{$val['display_name']}} ({{$val['type']==1?'菜单':'功能'}}：{{$v['description']}})
                                                </label>
                                             </div>
                                       @endforeach
                                    </div>
                                    @endif

                                </div>
                            </div>
                            <br>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->
<script>

    $(function () {
        $(".check-all").click(function () {
            if($(this).prop('checked')){
                $("input[type='checkbox']").parent("span").addClass("checked");
                $("input[type='checkbox']").prop('checked',true);
            }else{
                $("input[type='checkbox']").parent("span").removeClass("checked");
                $("input[type='checkbox']").prop('checked',false);
            }
        });
        $(".checkbox_f").click(function () {
            var key = $(this).val();
            if($(this).prop('checked')){
                $(".check_"+key).parent("span").addClass("checked");
                $(".check_"+key).prop('checked',true);
            }else{
                $(".check_"+key).parent("span").removeClass("checked");
                $(".check_"+key).prop('checked',false);
            }
        });
    });
    function checkF(obj) {
        if(obj.prop("checked")){
            $("#check"+obj.attr("key")).parent("span").addClass("checked");
            $("#check"+obj.attr("key")).prop('checked',true);
        }

    }
</script>


</body>
</html>