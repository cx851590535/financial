<!--

分页
-->
<div class="row ctrls">
    <div class="btn-group pull-right">
        <button class="btn glow">每页显示</button>
        <button class="btn glow dropdown-toggle" data-toggle="dropdown">{{$data['per_page']}}条
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="javascript:;" onclick="hrefadd('?perpage=20')">20条</a></li>
            <li><a href="javascript:;" onclick="hrefadd('?perpage=50')">50条</a></li>
            <li><a href="javascript:;" onclick="hrefadd('?perpage=100')">100条</a></li>
        </ul>
    </div>
    <div class="pagination pull-right" style="margin: 0 12px;padding: 0px">
        <ul>
            @if(!empty($data['prev_page_url']))
                <li><a href="javascript:;" onclick="hrefadd('{{$data['prev_page_url']}}&perpage={{$data['per_page']}}')">‹</a></li>
            @else
                <li><a href="#">‹</a></li>
            @endif
            <li><a href="javascript:;" onclick="hrefadd('?page=1&perpage={{$data['per_page']}}')">1</a></li>
            @for($i=2;$i<$data['last_page'];$i++)
                @if($i>($data['current_page']-3)&&$i<($data['current_page']+3))
                    @if($i==$data['current_page'])
                        <li><a class="active" href="#">{{$data['current_page']}}</a></li>
                    @else
                        <li><a href="javascript:;" onclick="hrefadd('?page={{$i}}&perpage={{$data['per_page']}}')">{{$i}}</a></li>
                    @endif
                @else
                    @if($i==($data['current_page']-3)||$i==($data['current_page']+3))
                        <li><a href="">…</a></li>
                    @endif

                @endif
            @endfor
            @if($data['last_page']!=1)
                <li><a href="javascript:;" onclick="hrefadd('?page={{$data['last_page']}}&perpage={{$data['per_page']}}')">{{$data['last_page']}}</a></li>
            @endif
            @if(!empty($data['next_page_url']))
                <li><a href="javascript:;" onclick="hrefadd('{{$data['next_page_url']}}&perpage={{$data['per_page']}}')">›</a></li>
            @else
                <li><a href="#">›</a></li>
            @endif
        </ul>
    </div>
</div>
