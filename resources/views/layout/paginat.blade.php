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
            <li><a href="?perpage=20&searchkey={{$data['searchkey']}}&searchvalue={{$data['searchvalue']}}">20条</a></li>
            <li><a href="?perpage=50&searchkey={{$data['searchkey']}}&searchvalue={{$data['searchvalue']}}">50条</a></li>
            <li><a href="?perpage=100&searchkey={{$data['searchkey']}}&searchvalue={{$data['searchvalue']}}">100条</a></li>
        </ul>
    </div>
</div>

<div class="pagination pull-right">
    <ul>
        @if(!empty($data['prev_page_url']))
            <li><a href="{{$data['prev_page_url']}}&perpage={{$data['per_page']}}&searchkey={{$data['searchkey']}}&searchvalue={{$data['searchvalue']}}">‹</a></li>
        @else
            <li><a href="#">‹</a></li>
        @endif
        <li><a href="?page=1&perpage={{$data['per_page']}}&searchkey={{$data['searchkey']}}&searchvalue={{$data['searchvalue']}}">1</a></li>
        @for($i=2;$i<$data['last_page'];$i++)
            @if($i>($data['current_page']-3)&&$i<($data['current_page']+3))
                @if($i==$data['current_page'])
                    <li><a class="active" href="#">{{$data['current_page']}}</a></li>
                @else
                    <li><a href="?page={{$i}}&perpage={{$data['per_page']}}&searchkey={{$data['searchkey']}}&searchvalue={{$data['searchvalue']}}">{{$i}}</a></li>
                @endif
            @else
                @if($i==($data['current_page']-3)||$i==($data['current_page']+3))
                    <li><a href="">…</a></li>
                @endif

            @endif
        @endfor
        @if($data['last_page']!=1)
            <li><a href="?page={{$data['last_page']}}&perpage={{$data['per_page']}}&searchkey={{$data['searchkey']}}&searchvalue={{$data['searchvalue']}}">{{$data['last_page']}}</a></li>
        @endif
        @if(!empty($data['next_page_url']))
            <li><a href="{{$data['next_page_url']}}&perpage={{$data['per_page']}}&searchkey={{$data['searchkey']}}&searchvalue={{$data['searchvalue']}}">›</a></li>
        @else
            <li><a href="#">›</a></li>
        @endif
    </ul>
</div>