<!DOCTYPE html>
<html>
<head>
	<title>detailAdmin简单清爽的响应式后台系统模板下载 - Home</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <!-- bootstrap -->
    <link href="/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/css/icons.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="/css/compiled/index.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='/css/font1.css' rel='stylesheet' type='text/css' />

    <!-- lato font -->
    <link href='/css/font2.css' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="/js/html5.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

    @include('layout.top')

    @include('layout.left')

	<!-- main container -->
    <div class="content">

        <!-- settings changer -->
        <div class="skins-nav">
            <a href="#" class="skin first_nav selected">
                <span class="icon"></span><span class="text">Default skin</span>
            </a>
            <a href="#" class="skin second_nav" data-file="css/skins/dark.css">
                <span class="icon"></span><span class="text">Dark skin</span>
            </a>
        </div>

        <div class="container-fluid">

            <!-- upper main stats -->
            <div id="main-stats">
                <div class="row-fluid stats-row">
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number">2457</span>
                            visits
                        </div>
                        <span class="date">Today</span>
                    </div>
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number">3240</span>
                            users
                        </div>
                        <span class="date">February 2014</span>
                    </div>
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number">322</span>
                            orders
                        </div>
                        <span class="date">This week</span>
                    </div>
                    <div class="span3 stat last">
                        <div class="data">
                            <span class="number">$2,340</span>
                            sales
                        </div>
                        <span class="date">last 30 days</span>
                    </div>
                </div>
            </div>
            <!-- end upper main stats -->

            <div id="pad-wrapper">

                <!-- statistics chart built with jQuery Flot -->
                <div class="row-fluid chart">
                    <h4>
                        Statistics
                         <div class="btn-group pull-right">
                            <button class="glow left">DAY</button>
                            <button class="glow middle active">MONTH</button>
                            <button class="glow right">YEAR</button>
                        </div>
                    </h4>
                    <div class="span12">
                        <div id="statsChart"></div>
                    </div>
                </div>
                <!-- end statistics chart -->

                <!-- UI Elements section -->
                <div class="row-fluid section ui-elements">
                    <h4>UI Elements</h4>
                    <div class="span5 knobs">
                        <div class="knob-wrapper">
                            <input type="text" value="50" class="knob" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#30a1ec" data-bgcolor="#d4ecfd" data-width="150" />
                            <div class="info">
                                <div class="param">
                                    <span class="line blue"></span>
                                    Active users
                                </div>
                            </div>
                        </div>
                        <div class="knob-wrapper">
                            <input type="text" value="75" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#3d88ba" data-bgcolor="#d4ecfd" data-width="150" />
                            <div class="info">
                                <div class="param">
                                    <span class="line blue"></span>
                                    % disk space usage
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="span6 showcase">
                        <div class="ui-sliders">
                            <div class="slider slider-sample1 vertical-handler"></div>
                            <div class="slider slider-sample2"></div>
                            <div class="slider slider-sample3"></div>
                        </div>
                        <div class="ui-group">
                            <a class="btn-flat inverse">Large Button</a>
                            <a class="btn-flat gray">Large Button</a>
                            <a class="btn-flat default">Large Button</a>
                            <a class="btn-flat primary">Large Button</a>
                        </div>                        

                        <div class="ui-group">
                            <a class="btn-flat icon">
                                <i class="tool"></i> Icon button
                            </a>
                            <a class="btn-glow small inverse">
                                <i class="shuffle"></i>
                            </a>
                            <a class="btn-glow small primary">
                                <i class="setting"></i>
                            </a>
                            <a class="btn-glow small default">
                                <i class="attach"></i>
                            </a>
                            <div class="ui-select">
                                <select>
                                    <option selected="" />Dropdown
                                    <option />Custom selects
                                    <option />Pure css styles
                                </select>
                            </div>

                            <div class="btn-group">
                                <button class="glow left">LEFT</button>
                                <button class="glow right">RIGHT</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end UI elements section -->

                <!-- table sample -->
                <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
                <div class="table-products section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>Products <small>Table sample</small></h4>
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
                            <a class="btn-flat new-product">+ Add product</a>
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
                                            <img src="/img/table-img.png" />
                                        </div>
                                        <a href="#">There are many variations </a>
                                    </td>
                                    <td class="description">
                                        if you are going to use a passage of Lorem Ipsum.
                                    </td>
                                    <td>
                                        <span class="label label-success">Active</span>
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
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
                                        <a href="#">Internet tend</a>
                                    </td>
                                    <td class="description">
                                        There are many variations of passages.
                                    </td>
                                    <td>
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
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
                                        <a href="#">Many desktop publishing </a>
                                    </td>
                                    <td class="description">
                                        if you are going to use a passage of Lorem Ipsum.
                                    </td>
                                    <td>
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
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
                                        <a href="#">Generate Lorem </a>
                                    </td>
                                    <td class="description">
                                        There are many variations of passages.
                                    </td>
                                    <td>
                                        <span class="label label-info">Standby</span>
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
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
                                        <a href="#">Internet tend</a>
                                    </td>
                                    <td class="description">
                                        There are many variations of passages.
                                    </td>
                                    <td>                                        
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                      <ul>
                        <li><a href="#">&#8249;</a></li>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">&#8250;</a></li>
                      </ul>
                    </div>
                </div>
                <!-- end table sample -->
            </div>
        </div>
    </div>


	<!-- scripts -->
    <script src="/js/jquery-latest.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-ui-1.10.2.custom.min.js"></script>
    <!-- knob -->
    <script src="/js/jquery.knob.js"></script>
    <!-- flot charts -->
    <script src="/js/jquery.flot.js"></script>
    <script src="/js/jquery.flot.stack.js"></script>
    <script src="/js/jquery.flot.resize.js"></script>
    <script src="/js/theme.js"></script>

    <script type="text/javascript">
        $(function () {

            // jQuery Knobs
            $(".knob").knob();



            // jQuery UI Sliders
            $(".slider-sample1").slider({
                value: 100,
                min: 1,
                max: 500
            });
            $(".slider-sample2").slider({
                range: "min",
                value: 130,
                min: 1,
                max: 500
            });
            $(".slider-sample3").slider({
                range: true,
                min: 0,
                max: 500,
                values: [ 40, 170 ],
            });

            

            // jQuery Flot Chart
            var visits = [[1, 50], [2, 40], [3, 45], [4, 23],[5, 55],[6, 65],[7, 61],[8, 70],[9, 65],[10, 75],[11, 57],[12, 59]];
            var visitors = [[1, 25], [2, 50], [3, 23], [4, 48],[5, 38],[6, 40],[7, 47],[8, 55],[9, 43],[10,50],[11,47],[12, 39]];

            var plot = $.plot($("#statsChart"),
                [ { data: visits, label: "Signups"},
                 { data: visitors, label: "Visits" }], {
                    series: {
                        lines: { show: true,
                                lineWidth: 1,
                                fill: true, 
                                fillColor: { colors: [ { opacity: 0.1 }, { opacity: 0.13 } ] }
                             },
                        points: { show: true, 
                                 lineWidth: 2,
                                 radius: 3
                             },
                        shadowSize: 0,
                        stack: true
                    },
                    grid: { hoverable: true, 
                           clickable: true, 
                           tickColor: "#f9f9f9",
                           borderWidth: 0
                        },
                    legend: {
                            // show: false
                            labelBoxBorderColor: "#fff"
                        },  
                    colors: ["#a7b5c5", "#30a0eb"],
                    xaxis: {
                        ticks: [[1, "JAN"], [2, "FEB"], [3, "MAR"], [4,"APR"], [5,"MAY"], [6,"JUN"], 
                               [7,"JUL"], [8,"AUG"], [9,"SEP"], [10,"OCT"], [11,"NOV"], [12,"DEC"]],
                        font: {
                            size: 12,
                            family: "Open Sans, Arial",
                            variant: "small-caps",
                            color: "#697695"
                        }
                    },
                    yaxis: {
                        ticks:3, 
                        tickDecimals: 0,
                        font: {size:12, color: "#9da3a9"}
                    }
                 });

            function showTooltip(x, y, contents) {
                $('<div id="tooltip">' + contents + '</div>').css( {
                    position: 'absolute',
                    display: 'none',
                    top: y - 30,
                    left: x - 50,
                    color: "#fff",
                    padding: '2px 5px',
                    'border-radius': '6px',
                    'background-color': '#000',
                    opacity: 0.80
                }).appendTo("body").fadeIn(200);
            }

            var previousPoint = null;
            $("#statsChart").bind("plothover", function (event, pos, item) {
                if (item) {
                    if (previousPoint != item.dataIndex) {
                        previousPoint = item.dataIndex;

                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(0),
                            y = item.datapoint[1].toFixed(0);

                        var month = item.series.xaxis.ticks[item.dataIndex].label;

                        showTooltip(item.pageX, item.pageY,
                                    item.series.label + " of " + month + ": " + y);
                    }
                }
                else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            });
        });
    </script>

</body>
</html>