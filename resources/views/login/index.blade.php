<!DOCTYPE html>
<html class="login-bg">
<head>
    <title>Detail Admin - 登录</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/css/icons.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="/css/lib/font-awesome.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="/css/compiled/signin.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='/css/font1.css' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
    <script src="/js/html5.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>


<!-- background switcher -->
<div class="bg-switch visible-desktop">
    <div class="bgs">
        <a href="#" data-img="landscape.jpg" class="bg active">
            <img src="/img/bgs/landscape.jpg" />
        </a>
        <a href="#" data-img="blueish.jpg" class="bg">
            <img src="/img/bgs/blueish.jpg" />
        </a>
        <a href="#" data-img="7.jpg" class="bg">
            <img src="/img/bgs/7.jpg" />
        </a>
        <a href="#" data-img="8.jpg" class="bg">
            <img src="/img/bgs/8.jpg" />
        </a>
        <a href="#" data-img="9.jpg" class="bg">
            <img src="/img/bgs/9.jpg" />
        </a>
        <a href="#" data-img="10.jpg" class="bg">
            <img src="/img/bgs/10.jpg" />
        </a>
        <a href="#" data-img="11.jpg" class="bg">
            <img src="/img/bgs/11.jpg" />
        </a>
    </div>
</div>


<div class="row-fluid login-wrapper">
    <a href="index.html">
        <img class="logo" src="/img/logo-white.png" />
    </a>

    <div class="span4 box">
        <div class="content-wrap">
            <h6>登录</h6>
            <input class="span12" id="username" type="text" placeholder="E-mail address" />
            <input class="span12" id="password" type="password" placeholder="Your password" />
            <a href="#" class="forgot">忘记密码?</a>
            <div class="remember">
                <input id="remember-me" type="checkbox" />
                <label for="remember-me">记住密码</label>
            </div>
            <a id="login" class="btn-glow primary login" href="javascript:;">登录</a>
        </div>
    </div>

    {{--<div class="span4 no-account">
        <p>Don't have an account?</p>
        <a href="signup.html">Sign up</a>
    </div>--}}
</div>

<!-- scripts -->
<script src="/js/jquery-latest.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/theme.js"></script>
<script src="/js/jquery-3.1.0.min.js"></script>
<script src="/js/layer.js"></script>

<!-- pre load bg imgs -->
<script type="text/javascript">
    $("#login").click(function () {
        var username = $("#username").val();
        var password = $("#password").val();
        if(!username||!password){
            layer.msg('用户名或密码不能为空！',{time:2000});
        }
        $.ajax({
            type:'post',
            data:'username='+username+'&password='+password+'&_token={{csrf_token()}}',
            url:'/login/login',
            success:function (data) {

                if(data.code!=200){
                    layer.msg(data.msg,{time:2000});
                }else{
                    location.href='/home/index';
                }
            }
        })

    });
    $(function () {
        // bg switcher
        var $btns = $(".bg-switch .bg");
        $btns.click(function (e) {
            e.preventDefault();
            $btns.removeClass("active");
            $(this).addClass("active");
            var bg = $(this).data("img");

            $("html").css("background-image", "url('/img/bgs/" + bg + "')");
        });

    });
</script>

</body>
</html>