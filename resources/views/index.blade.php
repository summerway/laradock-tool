<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="keywords" content="sms" />
    <meta name="author" content="maple.xia" />
    <meta name="description" content="my local projects">

    <title>Local projects</title>

    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">

    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="favicons.png">
    <link rel="shortcut icon" href="favicons_s.png">

    <!-- Css -->
    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('css/site.min.css') !!}
    {!! HTML::style('css/backtoup.css') !!}
</head>

<body class="home-template">

<div class="header" style="background-image: url(asset/image/header-bg.jpg)">
    <div class="logoimg">
        <a href="http://nav.local" title="Bootstrap 优站精选"><img src="asset/image/logo.png" alt="My Local Projects" width="78"></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="logotxt"><h1>Maple.Xia</h1></div>
                <h2 class="site-name text-center">Local Projects</h2>
            </div>
        </div>

    </div>
</div>
<main class="main" role="main">
    <div class="container">
        <div class="row" id="post-list">


        </div>
    </div>
</main>

<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">常用链接</h4>
                    <div class="content friend-links">
                        <a href="http://192.168.3.30/login.jsp" title="集成化研发管理平台"  target="_blank">集成化研发管理平台</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">常用工具</h4>
                    <div class="content tag-cloud">
                        <a href="http://tool.chinaz.com/Tools/unixtime.aspx" title="Timestamp" target="_blank">Timestamp</a>
                        <a href="https://jsonformatter.curiousconcept.com/" title="Jsonformatter" target="_blank">Jsonformatter</a>
                        <a href="http://tool.chinaz.com/tools/unicode.aspx" title="Unicode"  target="_blank">Unicode</a>
                        <a href="http://php.net/" title="PHP" target="_blank">PHP</a>
                        <a href="http://www.jquery123.com/" title="jQuery中文文档" target="_blank">jQuery</a>
                        <a href="http://babeljs.cn/" title="Babeljs中文网"  target="_blank">Babeljs</a>
                        <a href="http://lodashjs.com/" title="lodash中文网" target="_blank">Lodash</a>
                        <a href="http://www.gulpjs.com.cn/" title="Gulp中文网" target="_blank">Gulp</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">技术链接</h4>
                    <div class="content friend-links">
                        <a href="http://www.golaravel.com/" title="Laravel中文网"  target="_blank">Laravel中文网</a>
                        <a href="http://www.bootcss.com/" title="Bootstrap中文网"  target="_blank">Bootstrap中文网</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span>Copyright © <a href="#">maple</a></span>
                <!-- <span><a href="#" target="_blank">京ICP备 号</a></span> -->
            </div>
        </div>
    </div>
</div>
<!-- backtoup -->
<a href="#" class="cd-top" title="back to up">Top</a>

@include('partials.js_basic')

<script>
    $(function(){
        $.ajax({
            type: "post",
            url: base_path + "/api/sms/dataList",
            dataType:'json', //or HTML, JSON, etc.
            success: function(response){
                var html = ""
                $.each(response,function(index,value){
                    html += '<div class="col-xs-12 col-sm-6">';
                    html += '<article class="post tag-foreign-website tag-bootstrap-v3 tag-opensource-project"><h2 class="post-title">';
                    html += '<h2 class="post-title">';
                    html += '<a href="http://'+ value['server_name'] +'"  target="_blank">'+ value['desc'] +'</a></h2>';
                    html += '<div class="post-featured-image">';
                    html += '<a class="thumbnail loaded" href="http://'+ value['server_name'] +'"  target="_blank">';
                    html += '<img src="asset/image/projects/'+ value['server_name'] +'.png" alt="'+ value['desc'] +'" >';
                    html += '</a></div></article></div>';
                });

                var list = $("#post-list");

                list.empty();
                list.append(html);
            }
        });
    });
</script>
</body>
</html>


