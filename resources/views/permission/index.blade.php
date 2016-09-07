
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
                            <select>
                                <option />Filter users
                                <option />Signed last 30 days
                                <option />Active users
                            </select>
                        </div>
                        <input type="text" class="search" />
                        <a class="btn-flat success new-product">添加权限</a>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                <input type="checkbox" />
                                名称
                            </th>
                            <th class="span3">
                                <span class="line"></span>路由
                            </th>
                            <th class="span3">
                                <span class="line"></span>描述
                            </th>
                            <th class="span3">
                                <span class="line"></span>操作
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        @foreach($permissions as $k => $v)
                            <tr class="first">
                                <td>
                                    <input type="checkbox" value="{{$v['id'}}"/>
                                    <a href="#" class="name">{{$v['name'}} </a>
                                </td>
                                <td class="description">
                                    if you are going to use a passage of Lorem Ipsum.
                                </td>
                                <td>
                                    <span class="label label-success">Active</span>
                                    <ul class="actions">
                                        <li><a href="#">Edit</a></li>
                                        <li class="last"><a href="#">Delete</a></li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        <!-- row -->
                        <tr>
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="/img/table-img.png" />
                                </div>
                                <a href="#" class="name">Internet tend</a>
                            </td>
                            <td class="description">
                                There are many variations of passages.
                            </td>
                            <td>
                                <ul class="actions">
                                    <li><a href="#">Edit</a></li>
                                    <li class="last"><a href="#">Delete</a></li>
                                </ul>
                            </td>
                        </tr>
                        <!-- row -->
                        <tr>
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="/img/table-img.png" />
                                </div>
                                <a href="#" class="name">Generate Lorem </a>
                            </td>
                            <td class="description">
                                if you are going to use a passage of Lorem Ipsum.
                            </td>
                            <td>
                                <ul class="actions">
                                    <li><a href="#">Edit</a></li>
                                    <li class="last"><a href="#">Delete</a></li>
                                </ul>
                            </td>
                        </tr>
                        <!-- row -->
                        <tr>
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="/img/table-img.png" />
                                </div>
                                <a href="#" class="name">Internet tend</a>
                            </td>
                            <td class="description">
                                There are many variations of passages.
                            </td>
                            <td>
                                <span class="label label-info">Standby</span>
                                <ul class="actions">
                                    <li><a href="#">Edit</a></li>
                                    <li class="last"><a href="#">Delete</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="/img/table-img.png" />
                                </div>
                                <a href="#" class="name">Generate Lorem </a>
                            </td>
                            <td class="description">
                                if you are going to use a passage of Lorem Ipsum.
                            </td>
                            <td>
                                <span class="label label-success">Active</span>
                                <ul class="actions">
                                    <li><a href="#">Edit</a></li>
                                    <li class="last"><a href="#">Delete</a></li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end products table -->

        </div>
    </div>
</div>
<!-- end main container -->


</body>
</html>