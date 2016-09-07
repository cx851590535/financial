<!-- sidebar -->
<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a href="/home/index">
                <i class="icon-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="chart-showcase.html">
                <i class="icon-signal"></i>
                <span>Charts</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>Users</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="user-list.html">User list</a></li>
                <li><a href="new-user.html">New user form</a></li>
                <li><a href="user-profile.html">User profile</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-edit"></i>
                <span>Forms</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="form-showcase.html">Form showcase</a></li>
                <li><a href="form-wizard.html">Form wizard</a></li>
            </ul>
        </li>
        <li>
            <a href="gallery.html">
                <i class="icon-picture"></i>
                <span>Gallery</span>
            </a>
        </li>
        <li>
            <a href="calendar.html">
                <i class="icon-calendar-empty"></i>
                <span>Calendar</span>
            </a>
        </li>
        <li>
            <a href="tables.html">
                <i class="icon-th-large"></i>
                <span>Tables</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle ui-elements" href="#">
                <i class="icon-code-fork"></i>
                <span>UI Elements</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="ui-elements.html">UI Elements</a></li>
                <li><a href="icons.html">Icons</a></li>
            </ul>
        </li>
        <li>
            <a href="personal-info.html">
                <i class="icon-cog"></i>
                <span>My Info</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-share-alt"></i>
                <span>Extras</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="code-editor.html">Code editor</a></li>
                <li><a href="grids.html">Grids</a></li>
                <li><a href="signin.html">Sign in</a></li>
                <li><a href="signup.html">Sign up</a></li>
            </ul>
        </li>
        @foreach(session('user')['permissions'] as $k => $v)
            @if(isset($v['item']))
                <li>
                    <a class="dropdown-toggle" href="#">
                        <i class="{{$v['class']}}"></i>
                        <span>{{$v['display_name']}}</span>
                        <i class="icon-chevron-down"></i>
                    </a>
                    <ul class="submenu">
                        @foreach($v['item'] as $key => $val)
                            <li><a href="{{$val['name']}}">{{$val['display_name']}}</a></li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{$v['name']}}">
                        <i class="{{$v['class']}}"></i>
                        <span>{{$v['display_name']}}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
<!-- end sidebar -->