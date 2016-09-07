
@include('layout.top')

@include('layout.left')

<!-- main container -->
<div class="content">

    <!-- settings changer -->
    <div class="skins-nav">
        <a href="#" class="skin first_nav selected">
            <span class="icon"></span><span class="text">Default</span>
        </a>
        <a href="#" class="skin second_nav" data-file="css/skins/dark.css">
            <span class="icon"></span><span class="text">Dark skin</span>
        </a>
    </div>

    <div class="container-fluid">
        <div id="pad-wrapper">

            <!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>Products</h4>
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
                        <a class="btn-flat success new-product">+ Add product</a>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                <input type="checkbox" />
                                Product
                            </th>
                            <th class="span3">
                                <span class="line"></span>Description
                            </th>
                            <th class="span3">
                                <span class="line"></span>Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <tr class="first">
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="img/table-img.png" />
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
                        <!-- row -->
                        <tr>
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="img/table-img.png" />
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
                                    <img src="img/table-img.png" />
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
                                    <img src="img/table-img.png" />
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
                                    <img src="img/table-img.png" />
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

            <!-- orders table -->
            <div class="table-wrapper orders-table section">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>Orders</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <div class="btn-group pull-right">
                            <button class="glow left large">All</button>
                            <button class="glow middle large">Pending</button>
                            <button class="glow right large">Completed</button>
                        </div>
                        <input type="text" class="search order-search" placeholder="Search for an order.." />
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span2">
                                Order ID
                            </th>
                            <th class="span3">
                                Date
                            </th>
                            <th class="span3">
                                <span class="line"></span>
                                Name
                            </th>
                            <th class="span3">
                                <span class="line"></span>
                                Status
                            </th>
                            <th class="span3">
                                <span class="line"></span>
                                Items
                            </th>
                            <th class="span3">
                                <span class="line"></span>
                                Total amount
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <tr class="first">
                            <td>
                                <a href="#">#459</a>
                            </td>
                            <td>
                                Jan 03, 2014
                            </td>
                            <td>
                                <a href="#">John Smith</a>
                            </td>
                            <td>
                                <span class="label label-success">Completed</span>
                            </td>
                            <td>
                                3
                            </td>
                            <td>
                                $ 3,500.00
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">#510</a>
                            </td>
                            <td>
                                Feb 22, 2014
                            </td>
                            <td>
                                <a href="#">Anna Richards</a>
                            </td>
                            <td>
                                <span class="label label-info">Pending</span>
                            </td>
                            <td>
                                5
                            </td>
                            <td>
                                $ 800.00
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">#590</a>
                            </td>
                            <td>
                                Mar 03, 2014
                            </td>
                            <td>
                                <a href="#">Steven McFly</a>
                            </td>
                            <td>
                                <span class="label label-success">Completed</span>
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                $ 1,350.00
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">#618</a>
                            </td>
                            <td>
                                Jan 03, 2014
                            </td>
                            <td>
                                <a href="#">George Williams</a>
                            </td>
                            <td>
                                <span class="label">Canceled</span>
                            </td>
                            <td>
                                8
                            </td>
                            <td>
                                $ 3,499.99
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end orders table -->

            <!-- users table -->
            <div class="table-wrapper users-table section">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>Users</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <a class="btn-flat pull-right success new-product add-user">+ Add user</a>
                        <input type="text" class="search user-search" placeholder="Search for users.." />
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span4">
                                Name
                            </th>
                            <th class="span3">
                                <span class="line"></span>Signed up
                            </th>
                            <th class="span2">
                                <span class="line"></span>Total spent
                            </th>
                            <th class="span3 align-right">
                                <span class="line"></span>Email
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <tr class="first">
                            <td>
                                <img src="img/contact-img.png" class="img-circle avatar hidden-phone" />
                                <a href="user-profile.html" class="name">Alejandra Galvan Castillo</a>
                                <span class="subtext">Graphic Design</span>
                            </td>
                            <td>
                                Jan 11, 2012
                            </td>
                            <td>
                                $ 500.00
                            </td>
                            <td class="align-right">
                                <a href="#">alejandra@gmail.com</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/contact-img2.png" class="img-circle avatar hidden-phone" />
                                <a href="user-profile.html" class="name">Alejandra Galvan Castillo</a>
                                <span class="subtext">Graphic Design</span>
                            </td>
                            <td>
                                Apr 23, 2012
                            </td>
                            <td>
                                $ 3,210.00
                            </td>
                            <td class="align-right">
                                <a href="#">alejandra@gmail.com</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/contact-img.png" class="img-circle avatar hidden-phone" />
                                <a href="user-profile.html" class="name">Alejandra Galvan Castillo</a>
                                <span class="subtext">Graphic Design</span>
                            </td>
                            <td>
                                Feb 03, 2014
                            </td>
                            <td>
                                $ 890.00
                            </td>
                            <td class="align-right">
                                <a href="#">alejandra@gmail.com</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/contact-img2.png" class="img-circle avatar hidden-phone" />
                                <a href="user-profile.html" class="name">Alejandra Galvan Castillo</a>
                                <span class="subtext">Graphic Design</span>
                            </td>
                            <td>
                                Sep 19, 2012
                            </td>
                            <td>
                                $ 899.99
                            </td>
                            <td class="align-right">
                                <a href="#">alejandra@gmail.com</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>
<!-- end main container -->


</body>
</html>