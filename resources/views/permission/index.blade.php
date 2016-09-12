
@include('layout.top')

@include('layout.left')

<!-- main container -->
<div class="content">

    @include('layout.skin')

    <div class="container-fluid">
        <div id="pad-wrapper">

            <!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>权限信息</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <div class="ui-select">
                            <select class="searchkey">
                                <option value=""/>请选择
                                <option value="display_name"
                                        @if($data['searchkey']=='display_name')
                                            selected
                                        @endif
                                />名称
                                <option value="name"
                                        @if($data['searchkey']=='name')
                                        selected
                                        @endif
                                />路由
                                <option value="discription"
                                        @if($data['searchkey']=='discription')
                                        selected
                                        @endif
                                />描述
                            </select>
                        </div>
                        <input type="text" class="search searchvalue" placeholder="查找" onkeydown="checkEnter(event)" value="{{$data['searchvalue']}}"/>
                        <a class="btn-flat danger clear">清空条件</a>
                        <a class="btn-flat success new-product">添加权限</a>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                名称
                            </th>
                            <th class="span3">
                                <span class="line"></span>图标
                            </th>
                            <th class="span3">
                                <span class="line"></span>路由
                            </th>
                            <th class="span3">
                                <span class="line"></span>描述
                            </th>
                            <th class="span3">
                                <span class="line"></span>父级目录
                            </th>
                            <th class="span3">
                                <span class="line"></span>序号
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
                                        {{$v['display_name']}}
                                    </label>
                                    <input type="text" class="modifyform display_name hide" value="{{$v['display_name']}}"/>
                                </td>
                                <td class="class">
                                    <i class="{{$v['class']}}" id="i{{$v['id']}}"></i>
                                    <a class="modifyform hide choseicon" key="{{$v['id']}}" style="cursor: pointer;text-decoration: none;">选择图标</a>
                                    <input type="hidden" class="classname" id="class{{$v['id']}}" value="{{$v['class']}}">
                                </td>
                                <td class="name">
                                    <label>
                                        {{$v['name']}}
                                    </label>
                                    <input type="text" class="modifyform display_name hide" value="{{$v['name']}}"/>
                                </td>
                                <td class="description">
                                    <label>
                                        {{$v['description']}}
                                    </label>

                                    <input type="text" class="modifyform display_name hide" value="{{$v['description']}}"/>
                                </td>
                                <td class="fid">
                                        @if(isset($v['fname']))
                                            <label>
                                                {{$v['fname']}}
                                            </label>
                                            <div class="ui-select modifyform hide">
                                                <select class="fid">
                                                    <option value="{{$v['fid']}}" selected/>{{$v['fname']}}
                                                    @foreach($data['fpermissions'] as $key => $val)
                                                        <option value="{{$val['id']}}" />{{$val['display_name']}}
                                                    @endforeach
                                                </select>
                                            </div>
                                        @else
                                            <label>
                                                无
                                            </label>
                                            <div class="ui-select modifyform hide">
                                                <select class="fid ">
                                                    <option value="0" selected/>无
                                                    @foreach($data['fpermissions'] as $key => $val)
                                                        <option value="{{$val['id']}}" />{{$val['display_name']}}
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                </td>
                                <td class="order">
                                    <label>
                                        {{$v['order']}}
                                    </label>
                                    <input type="text" class="modifyform order hide" value="{{$v['order']}}"/>
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
        </div>
    </div>
</div>
<!-- end main container -->



<div id="iconstyles" class="container-fluid hide">
    <div id="pad-wrapper">
        <!-- Web Applications Icons -->
        <div class="icons-wrapper">
            <div class="row-fluid head">
                <div class="span12">
                    <h4>Web Application Icons <small>Font Awesome</small></h4>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span3">
                    <ul>
                        <li><i class="icon-adjust"></i>icon-adjust</li>
                        <li><i class="icon-asterisk"></i>icon-asterisk</li>
                        <li><i class="icon-ban-circle"></i>icon-ban-circle</li>
                        <li><i class="icon-bar-chart"></i>icon-bar-chart</li>
                        <li><i class=" icon-barcode"></i> icon-barcode</li>
                        <li><i class="icon-beaker"></i>icon-beaker</li>
                        <li><i class="icon-beer"></i>icon-beer</li>
                        <li><i class="icon-bell"></i>icon-bell</li>
                        <li><i class="icon-bell-alt"></i>icon-bell-alt</li>
                        <li><i class="icon-bolt"></i>icon-bolt</li>
                        <li><i class="icon-book"></i>icon-book</li>
                        <li><i class="icon-bookmark"></i>icon-bookmark</li>
                        <li><i class="icon-bookmark-empty"></i>icon-bookmark-empty</li>
                        <li><i class="icon-briefcase"></i>icon-briefcase</li>
                        <li><i class="icon-bullhorn"></i>icon-bullhorn</li>
                        <li><i class="icon-calendar"></i>icon-calendar</li>
                        <li><i class="icon-camera"></i>icon-camera</li>
                        <li><i class="icon-camera-retro"></i>icon-camera-retro</li>
                        <li><i class="icon-certificate"></i>icon-certificate</li>
                        <li><i class="icon-check"></i>icon-check</li>
                        <li><i class="icon-check-empty"></i>icon-check-empty</li>
                        <li><i class="icon-circle"></i>icon-circle</li>
                        <li><i class="icon-circle-blank"></i>icon-circle-blank</li>
                        <li><i class="icon-cloud"></i>icon-cloud</li>
                        <li><i class="icon-cloud-download"></i>icon-cloud-download</li>
                        <li><i class="icon-cloud-upload"></i>icon-cloud-upload</li>
                        <li><i class="icon-coffee"></i>icon-coffee</li>
                        <li><i class="icon-cog"></i>icon-cog</li>
                        <li><i class="icon-cogs"></i>icon-cogs</li>
                        <li><i class="icon-comment"></i>icon-comment</li>
                        <li><i class="icon-comment-alt"></i>icon-comment-alt</li>
                        <li><i class="icon-comments"></i>icon-comments</li>
                        <li><i class="icon-comments-alt"></i>icon-comments-alt</li>
                        <li><i class="icon-credit-card"></i>icon-credit-card</li>
                        <li><i class="icon-dashboard"></i>icon-dashboard</li>
                        <li><i class="icon-desktop"></i>icon-desktop</li>
                        <li><i class="icon-download"></i>icon-download</li>
                        <li><i class="icon-download-alt"></i>icon-download-alt</li>
                    </ul>
                </div>
                <div class="span3">
                    <ul>
                        <li><i class="icon-edit"></i>icon-edit</li>
                        <li><i class="icon-envelope"></i>icon-envelope</li>
                        <li><i class="icon-envelope-alt"></i>icon-envelope-alt</li>
                        <li><i class="icon-exchange"></i>icon-exchange</li>
                        <li><i class="icon-exclamation-sign"></i>icon-exclamation-sign</li>
                        <li><i class="icon-external-link"></i>icon-external-link</li>
                        <li><i class="icon-eye-close"></i>icon-eye-close</li>
                        <li><i class="icon-eye-open"></i>icon-eye-open</li>
                        <li><i class="icon-facetime-video"></i>icon-facetime-video</li>
                        <li><i class="icon-fighter-jet"></i>icon-fighter-jet</li>
                        <li><i class="icon-film"></i>icon-film</li>
                        <li><i class="icon-filter"></i>icon-filter</li>
                        <li><i class="icon-fire"></i>icon-fire</li>
                        <li><i class="icon-flag"></i>icon-flag</li>
                        <li><i class="icon-folder-close"></i>icon-folder-close</li>
                        <li><i class="icon-folder-open"></i>icon-folder-open</li>
                        <li><i class="icon-folder-close-alt"></i>icon-folder-close-alt</li>
                        <li><i class="icon-folder-open-alt"></i>icon-folder-open-alt</li>
                        <li><i class="icon-food"></i>icon-food</li>
                        <li><i class="icon-gift"></i>icon-gift</li>
                        <li><i class="icon-glass"></i>icon-glass</li>
                        <li><i class="icon-globe"></i>icon-globe</li>
                        <li><i class="icon-group"></i>icon-group</li>
                        <li><i class="icon-hdd"></i>icon-hdd</li>
                        <li><i class="icon-headphones"></i>icon-headphones</li>
                        <li><i class="icon-heart"></i>icon-heart</li>
                        <li><i class="icon-heart-empty"></i>icon-heart-empty</li>
                        <li><i class="icon-home"></i>icon-home</li>
                        <li><i class="icon-inbox"></i>icon-inbox</li>
                        <li><i class="icon-info-sign"></i>icon-info-sign</li>
                        <li><i class="icon-key"></i>icon-key</li>
                        <li><i class="icon-leaf"></i>icon-leaf</li>
                        <li><i class="icon-laptop"></i>icon-laptop</li>
                        <li><i class="icon-legal"></i>icon-legal</li>
                        <li><i class="icon-lemon"></i>icon-lemon</li>
                        <li><i class="icon-lightbulb"></i>icon-lightbulb</li>
                        <li><i class="icon-lock"></i>icon-lock</li>
                        <li><i class="icon-unlock"></i>icon-unlock</li>
                    </ul>
                </div>
                <div class="span3">
                    <ul>
                        <li><i class="icon-magic"></i>icon-magic</li>
                        <li><i class="icon-magnet"></i>icon-magnet</li>
                        <li><i class="icon-map-marker"></i>icon-map-marker</li>
                        <li><i class="icon-minus"></i>icon-minus</li>
                        <li><i class="icon-minus-sign"></i>icon-minus-sign</li>
                        <li><i class="icon-mobile-phone"></i>icon-mobile-phone</li>
                        <li><i class="icon-money"></i>icon-money</li>
                        <li><i class="icon-move"></i>icon-move</li>
                        <li><i class="icon-music"></i>icon-music</li>
                        <li><i class="icon-off"></i>icon-off</li>
                        <li><i class="icon-ok"></i>icon-ok</li>
                        <li><i class="icon-ok-circle"></i>icon-ok-circle</li>
                        <li><i class="icon-ok-sign"></i>icon-ok-sign</li>
                        <li><i class="icon-pencil"></i>icon-pencil</li>
                        <li><i class="icon-picture"></i>icon-picture</li>
                        <li><i class="icon-plane"></i>icon-plane</li>
                        <li><i class="icon-plus"></i>icon-plus</li>
                        <li><i class="icon-plus-sign"></i>icon-plus-sign</li>
                        <li><i class="icon-print"></i>icon-print</li>
                        <li><i class="icon-pushpin"></i>icon-pushpin</li>
                        <li><i class="icon-qrcode"></i>icon-qrcode</li>
                        <li><i class="icon-question-sign"></i>icon-question-sign</li>
                        <li><i class="icon-quote-left"></i>icon-quote-left</li>
                        <li><i class="icon-quote-right"></i>icon-quote-right</li>
                        <li><i class="icon-random"></i>icon-random</li>
                        <li><i class="icon-refresh"></i>icon-refresh</li>
                        <li><i class="icon-remove"></i>icon-remove</li>
                        <li><i class="icon-remove-circle"></i>icon-remove-circle</li>
                        <li><i class="icon-remove-sign"></i>icon-remove-sign</li>
                        <li><i class="icon-reorder"></i>icon-reorder</li>
                        <li><i class="icon-reply"></i>icon-reply</li>
                        <li><i class="icon-resize-horizontal"></i>icon-resize-horizontal</li>
                        <li><i class="icon-resize-vertical"></i>icon-resize-vertical</li>
                        <li><i class="icon-retweet"></i>icon-retweet</li>
                        <li><i class="icon-road"></i>icon-road</li>
                        <li><i class="icon-rss"></i>icon-rss</li>
                        <li><i class="icon-screenshot"></i>icon-screenshot</li>
                        <li><i class="icon-search"></i>icon-search</li>
                    </ul>
                </div>
                <div class="span3">
                    <ul>
                        <li><i class="icon-share"></i>icon-share</li>
                        <li><i class="icon-share-alt"></i>icon-share-alt</li>
                        <li><i class="icon-shopping-cart"></i>icon-shopping-cart</li>
                        <li><i class="icon-signal"></i>icon-signal</li>
                        <li><i class="icon-signin"></i>icon-signin</li>
                        <li><i class="icon-signout"></i>icon-signout</li>
                        <li><i class="icon-sitemap"></i>icon-sitemap</li>
                        <li><i class="icon-sort"></i>icon-sort</li>
                        <li><i class="icon-sort-down"></i>icon-sort-down</li>
                        <li><i class="icon-sort-up"></i>icon-sort-up</li>
                        <li><i class="icon-spinner"></i>icon-spinner</li>
                        <li><i class="icon-star"></i>icon-star</li>
                        <li><i class="icon-star-empty"></i>icon-star-empty</li>
                        <li><i class="icon-star-half"></i>icon-star-half</li>
                        <li><i class="icon-tablet"></i>icon-tablet</li>
                        <li><i class="icon-tag"></i>icon-tag</li>
                        <li><i class="icon-tags"></i>icon-tags</li>
                        <li><i class="icon-tasks"></i>icon-tasks</li>
                        <li><i class="icon-thumbs-down"></i>icon-thumbs-down</li>
                        <li><i class="icon-thumbs-up"></i>icon-thumbs-up</li>
                        <li><i class="icon-time"></i>icon-time</li>
                        <li><i class="icon-tint"></i>icon-tint</li>
                        <li><i class="icon-trash"></i>icon-trash</li>
                        <li><i class="icon-trophy"></i>icon-trophy</li>
                        <li><i class="icon-truck"></i>icon-truck</li>
                        <li><i class="icon-umbrella"></i>icon-umbrella</li>
                        <li><i class="icon-upload"></i>icon-upload</li>
                        <li><i class="icon-upload-alt"></i>icon-upload-alt</li>
                        <li><i class="icon-user"></i>icon-user</li>
                        <li><i class="icon-user-md"></i>icon-user-md</li>
                        <li><i class="icon-volume-off"></i>icon-volume-off</li>
                        <li><i class="icon-volume-up"></i>icon-volume-up</li>
                        <li><i class="icon-warning-sign"></i>icon-warning-sign</li>
                        <li><i class="icon-wrench"></i>icon-wrench</li>
                        <li><i class="icon-zoom-in"></i>icon-zoom-in</li>
                        <li><i class="icon-zoom-out"></i>icon-zoom-out</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Video Player Icons -->
        <div class="icons-wrapper icons-wrapper-border">
            <div class="row-fluid head">
                <div class="span12">
                    <h4>Video Player Icons</h4>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span3">
                    <ul>
                        <li><i class="icon-play-circle"></i> icon-play-circle</li>
                        <li><i class="icon-play"></i> icon-play</li>
                        <li><i class="icon-pause"></i> icon-pause</li>
                        <li><i class="icon-stop"></i> icon-stop</li>
                    </ul>
                </div>
                <div class="span3">
                    <ul>
                        <li><i class="icon-step-backward"></i> icon-step-backward</li>
                        <li><i class="icon-fast-backward"></i> icon-fast-backward</li>
                        <li><i class="icon-backward"></i> icon-backward</li>
                        <li><i class="icon-forward"></i> icon-forward</li>
                    </ul>
                </div>
                <div class="span3">
                    <ul>
                        <li><i class="icon-fast-forward"></i> icon-fast-forward</li>
                        <li><i class="icon-step-forward"></i> icon-step-forward</li>
                        <li><i class="icon-eject"></i> icon-eject</li>
                    </ul>
                </div>
                <div class="span3">
                    <ul>
                        <li><i class="icon-fullscreen"></i> icon-fullscreen</li>
                        <li><i class="icon-resize-full"></i> icon-resize-full</li>
                        <li><i class="icon-resize-small"></i> icon-resize-small</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Social Icons -->
        <div class="icons-wrapper icons-wrapper-border">
            <div class="row-fluid head">
                <div class="span12">
                    <h4>Social Icons</h4>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span3">
                    <ul>
                        <li><i class="icon-html5"></i>icon-html5</li>
                        <li><i class="icon-phone-sign"></i>icon-phone-sign</li>
                        <li><i class="icon-facebook"></i>icon-facebook</li>
                        <li><i class="icon-facebook-sign"></i>icon-facebook-sign</li>
                    </ul>
                </div>
                <div class="span3">
                    <ul>
                        <li><i class="icon-twitter"></i>icon-twitter</li>
                        <li><i class="icon-twitter-sign"></i>icon-twitter-sign</li>
                        <li><i class="icon-github"></i>icon-github</li>
                        <li><i class="icon-css3"></i>icon-css3</li>
                    </ul>
                </div>
                <div class="span3">
                    <ul>
                        <li><i class="icon-github-sign"></i>icon-github-sign</li>
                        <li><i class="icon-linkedin"></i>icon-linkedin</li>
                        <li><i class="icon-linkedin-sign"></i>icon-linkedin-sign</li>
                        <li><i class="icon-pinterest"></i>icon-pinterest</li>
                    </ul>
                </div>
                <div class="span3">
                    <ul>
                        <li><i class="icon-pinterest-sign"></i>icon-pinterest-sign</li>
                        <li><i class="icon-google-plus"></i>icon-google-plus</li>
                        <li><i class="icon-google-plus-sign"></i>icon-google-plus-sign</li>
                        <li><i class="icon-sign-blank"></i>icon-sign-blank</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

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
        $(".clear").click(function () {
            $(".searchkey").val("");
            $(".searchvalue").val("");
        })
       $(".choseicon").click(function () {
           var key = $(this).attr("key");
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
                   layer.alert('删除完成！',2000);
                   location.reload();
               }else{
                   layer.alert(data.msg);
               }
            }});
        }
    }
</script>
</html>