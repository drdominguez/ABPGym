<?php
//file: view/layouts/default.php
$view = ViewManager::getInstance();
?>
<!DOCTYPE html>
<html>

    <head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0">
<link type="text/css" media="all" href="http://envision.wptation.com/wp-content/cache/autoptimize/css/autoptimize_3c537462b0c08cd21469a2a77da37cad.css" rel="stylesheet"/><link type="text/css" media="screen" href="http://envision.wptation.com/wp-content/cache/autoptimize/css/autoptimize_8e3c7dac90177214b6583286ddaa141f.css" rel="stylesheet"/>
<!--[if IE 8]> 
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<link rel="alternate" type="application/rss+xml" title="Envision &raquo; Feed" href="http://envision.wptation.com/feed/"/>
<link rel="alternate" type="application/rss+xml" title="Envision &raquo; Comments Feed" href="http://envision.wptation.com/comments/feed/"/>
<link rel="alternate" type="application/rss+xml" title="Envision &raquo; Login &#8211; Full Page Video Background Comments Feed" href="http://envision.wptation.com/login-full-page-video-background/feed/"/>        
    </head>
    <body class="page page-id-1428 page-template page-template-page-no-header-footer page-template-page-no-header-footer-php run layout--fullwidth">
    <div id="side-panel-pusher">
    <div id="main-container">
    <div id="page-wrap">
    <div id="header-overlapping-helper"></div><div id="page-content" class="no-sidebar-layout"><div class="container"><div id="the-content">
    
    <div id="flash"><?= $view->popFlash()?></div>
    <div id="video-background-1" class="ui--video-background-wrapper fullwidth-content clearfix ui--section-content-v-center color--dark" style="margin-top: -30px;  margin-bottom: -12px;"><div class="ui--video-background-holder"><div class="ui--video-background-video hidden-phone "><video autoplay="autoplay" loop="loop" muted="muted" width="640" height="360"><source src="./view/video/login_video.mp4" type="video/mp4"/></video></div><div class="ui--video-background-poster"></div><div class="ui--video-background"><div class="ui--gradient"></div></div></div><div class="ui--section-content container clearfix"><div class="ui--animation-in make--fx--flipIn-X ui--pass clearfix" data-fx="fx--flipIn-X" data-delay="200" data-start-delay="0"><div class="ui-row row">
    <div class="ui-column span3"></div>
    <div class="ui-column span6"><div class="ui--icon-box position--top"><div class="ui--icon-box-content"></div></div>
    <div class="ui--space clearfix" data-responsive="{&quot;css&quot;:{&quot;height&quot;:{&quot;phone&quot;:null,&quot;tablet&quot;:null,&quot;widescreen&quot;:null}}}"></div><div class="ui-row row">
    <div class="ui-column span4"></div>
    <div class="ui-column span4"><div class="ui--custom-login ui--pass"><img src="./view/Icons/logo.png"><div id="login-form-container" class="ui--custom-login login-form-container">
        <form name='Form' action="index.php?controller=Login&amp;action=login" class="form-signin" accept-charset="UTF-8" method="POST" onsubmit="return validarLogin()">
        <div class="form-group">
        <label for="exampleInputEmail1">Login</label>
        <input class="form-control" name="dni" id="exampleInputEmail1" type="TEXT" aria-describedby="emailHelp" placeholder="   Introduzca DNI" onchange="comprobarVacio(this)  && comprobarDni(this)">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="contraseña" type="password" placeholder="Password" onchange="comprobarVacio(this)">
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">ENTRAR</button>
        </form>
                </div>
            </div>
        </div>
    <script type="text/javascript">
// <![CDATA[
    var styleElement = document.createElement("style");
        styleElement.type = "text/css";

    var cloudfw_dynamic_css_code = "@media ( min-width: 979px ) { .modern-browser #header-container.stuck #logo img {height: 30px;  margin-top: 20px !important;  margin-bottom: 20px !important;}  }\r\n\r\n\r\nhtml #video-background-1 .ui--video-background {-ms-filter: \"progid:DXImageTransform.Microsoft.Alpha(Opacity=65)\";opacity: 0.65;} html #video-background-1 .ui--video-background .ui--gradient {background-color:#3a1e40; *background-color: #0e6591; background-image:url('data:image\/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPg0KICAgIDxkZWZzPg0KICAgICAgICA8bGluZWFyR3JhZGllbnQgaWQ9ImxpbmVhci1ncmFkaWVudCIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiIHNwcmVhZE1ldGhvZD0icGFkIj4NCiAgICAgICAgICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiMwZTY1OTEiIHN0b3Atb3BhY2l0eT0iMSIvPg0KICAgICAgICAgICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjM2ExZTQwIiBzdG9wLW9wYWNpdHk9IjEiLz4NCiAgICAgICAgPC9saW5lYXJHcmFkaWVudD4NCiAgICA8L2RlZnM+DQogICAgPHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgc3R5bGU9ImZpbGw6IHVybCgjbGluZWFyLWdyYWRpZW50KTsiLz4NCjwvc3ZnPg=='); background-image: -moz-linear-gradient(top, #0e6591, #3a1e40) ; background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0e6591), to(#3a1e40)); background-image: -webkit-linear-gradient(top, #0e6591, #3a1e40); background-image: -o-linear-gradient(top, #0e6591, #3a1e40); background-image: linear-gradient(to bottom, #0e6591, #3a1e40); filter:  progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#0e6591', endColorstr='#3a1e40'); -ms-filter: \"progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#0e6591', endColorstr='#3a1e40')\"; background-repeat: repeat-x ;} html #video-background-1 .ui--video-background-poster {-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http:\/\/envision.wptation.com\/wp-content\/uploads\/2014\/01\/login_bg_2.jpg',sizingMethod='scale'); -ms-filter: \"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http:\/\/envision.wptation.com\/wp-content\/uploads\/2014\/01\/login_bg_2.jpg', sizingMethod='scale')\";  background-image: url('http:\/\/envision.wptation.com\/wp-content\/uploads\/2014\/01\/login_bg_2.jpg');} html #video-background-1 .ui--section-content , html #video-background-1 .ui--section-content p, html #video-background-1 .ui--section-content h1, html #video-background-1 .ui--section-content h2, html #video-background-1 .ui--section-content h3, html #video-background-1 .ui--section-content h4, html #video-background-1 .ui--section-content h5, html #video-background-1 .ui--section-content h6 {color: #ffffff;} html #video-background-1 .ui--section-content a {color: #cccccc;} html #video-background-1 .ui--section-content a:hover {color: #ffffff;} ";

    if (styleElement.styleSheet) {
        styleElement.styleSheet.cssText = cloudfw_dynamic_css_code;
    } else {
        styleElement.appendChild(document.createTextNode(cloudfw_dynamic_css_code));
    }

    document.getElementsByTagName("head")[0].appendChild(styleElement);

// ]]>
</script><script type="text/javascript" defer src="http://envision.wptation.com/wp-content/cache/autoptimize/js/autoptimize_e992af318226692f9425e2de6197f77a.js"></script></body>
</html>

