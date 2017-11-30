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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('image/favicons.png') }}">
    <link rel="shortcut icon" href="{{ URL::asset('image/favicons_s.png') }}">

    <!-- Css -->
    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('css/index/site.min.css') !!}

    <style>
        .tool-bar{
            margin-bottom: 20px;
        }

        .edit-btn{
            font-size: 24px;
            color: #5bc0de;
            position:absolute;
            left: 15%;
            bottom:5px;
            width:40px;
            z-index:10;
        }

        .remove-btn{
            font-size: 24px;
            color: #d9534f;
            position:absolute;
            right: 15%;
            bottom:5px;
            z-index:10;
        }

        .glyphicon{
            cursor: pointer;
        }
    </style>
</head>

<body class="home-template">

<div class="header" style="background-image: url({{ URL::asset('image/header-bg.jpg') }})">
    <div class="logoimg">
        <a href="http://nav.local" title="Bootstrap 优站精选"><img src="{{ URL::asset('image/logo.png') }}" alt="My Local Projects" width="78"></a>
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
        <div class="tool-bar">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModel" data-whatever="@mdo">新建项目</button>
            <div class="modal fade" id="insertModel" tabindex="-1" role="dialog" aria-labelledby="insertModelLabel">

                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">新建项目</h4>
                        </div>
                        <form id="insert-form">
                            <div class="modal-body">
                                    <div class="form-group">
                                        <label for="server_name" class="control-label">主机名称:</label>
                                        <input class="form-control" id="server_name" name="server_name" placeholder="主机名(项目域名)">
                                    </div>
                                    <div class="form-group">
                                        <label for="project_name" class="control-label">项目名称:</label>
                                        <input class="form-control" id="project_name" name="project_name" placeholder="项目名称">
                                    </div>
                                    <div class="form-group">
                                        <label for="path" class="control-label">项目目录</label>
                                        <input class="form-control" id="path" name="path" placeholder="与项目根目录的相对地址">
                                    </div>
                                    <div class="form-group">
                                        <label for="upload" class="control-label">封面:</label>
                                        <input id="upload" name="upload" type="file" class="file-loading">
                                        <input id="cover" name="cover" type="hidden" value="projects/default.png"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc" class="control-label">描述:</label>
                                        <textarea class="form-control" id="desc" name="desc" placeholder="描述"></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
                                <input type="submit" class="btn btn-success" value="提交" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="post-list">


        </div>
        @include('partials.pageination')
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
@include('partials.widget')

<script>
    $(function(){
        //event
        $("#list-rows").change(function(){
            loadList(1);
        });

        $("#btn-search").click(function(){
            loadList(1);
        });

        $('#insertModal').modal()

        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        });

        //auto loading
        loadList(1);

        var $upload = $("#upload")
        $upload.fileinput({
            uploadUrl: base_path + "/api/uploadPic",
            uploadExtraData: {folder: 'projects'},
            uploadAsync: false,
            showUpload: false, // hide upload button
            showRemove: false, // hide remove button
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
            //minFileCount: 1,
            maxFileCount: 1,
            allowedFileExtensions: ["jpg", "png", "gif"],
            initialPreview: [ '{{ Storage::url('projects/default.png') }}'],
            initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
            initialPreviewFileType: 'image', // image is the default and can be overridden in config below
            initialPreviewConfig: [
                {caption: "默认封面", url: base_path + "/api/removePic", key: 0}
            ],
            overwriteInitial: true
        }).on("filebatchselected", function(event, files) {
            // trigger upload method immediately after files are selected
            $upload.fileinput("upload");
        });

        //image upload callback
        $upload.on('filebatchpreupload', function(event, data) {
            data.jqXHR.complete(function(response){
                $("#cover").val(response.responseJSON.data);
            })
        });

        //image remove callback
        $upload.on('filesuccessremove', function(event, id) {
            //console.log('Uploaded thumbnail successfully removed');
            $("#cover").val("");
        });

        //form validate
        $("#insert-form").validate({
            rules: {
                server_name: "required",
                project_name: "required",
                cover: "required",
                path: "required"
            },
            messages:{
                server_name : "请填写主机名",
                project_name : "请填写项目名称",
                cover : "请上传项目封面",
                path : "请填写项目地址"
            },
            submitHandler: function (form) {
                var _values = $(form).serializeArray();
                $.ajax({
                    type: "post",
                    url: base_path + "/api/virtualHost/create",
                    data: _values,
                    error: function (request) {
                        error(request.responseJSON.ErrorMsg);
                    },
                    success: function (response){
                        $('#insertModel').modal('hide');
                        loadList(1);
                        success(response.message);
                    }
                });
                return false; // required to block normal submit since you used ajax
            }
        });

        function loadList(page){
            var _data = {};
            _data.page = page;
            _data.listRows = $("#list-rows").val();

            $.ajax({
                type: "post",
                url: base_path + "/api/virtualHost/dataList",
                data: _data,
                dataType:'json',
                error: function (request) {
                    error(request.responseJSON.ErrorMsg);
                },
                success: function(response){
                    var html = "";
                    var list = response.data.list;
                    $.each(list,function(index,value){
                        html += '<div class="col-xs-12 col-sm-6">';
                        html += '<article class="post tag-foreign-website tag-bootstrap-v3 tag-opensource-project">';
                        html += '<span  tag="'+ value['id'] +'" class="edit-btn"><i class="glyphicon glyphicon-edit"></i></span>';
                        html += '<h2 class="post-title">';
                        html += '<a href="http://'+ value['server_name'] +'"  target="_blank">'+ value['project_name'] +'</a></h2>';
                        html += '<span tag="'+ value['id'] +'" class="remove-btn"><i class="glyphicon glyphicon-trash"></i></span>';
                        html += '<div class="post-featured-image">';
                        html += '<a class="thumbnail loaded" href="http://'+ value['server_name'] +'"  target="_blank">';
                        html += '<img src="'+ '{!! URL::asset('storage') !!}/' + value['cover'] +'" alt="'+ value['desc'] +'" >';
                        html += '</a></div></article></div>';
                    });

                    var list = $("#post-list");
                    list.empty();
                    list.append(html);

                    //defined event
                    $(".remove-btn").click(function(){
                        if(confirm("是否真的删除该项目")){
                            var _id = $(this).attr('tag');
                            $.ajax({
                                type: "post",
                                url: base_path + "/api/virtualHost/delete",
                                data: {id:_id},
                                error: function (request) {
                                    error(request.responseJSON.ErrorMsg);
                                },
                                success: function (response){
                                    loadList(1);
                                    success(response.message);
                                }
                            });
                        }
                    });

                    //pagination
                    $('.pagination').jqPagination({
                        page_string: ' {current_page}／{max_page} 页 ',
                        max_page:response.data.max_page,
                        paged: function(page) {
                            // do something with the page variable
                            loadList(page);
                        }
                    });
                }
            });
        }
    });
</script>
</body>
</html>


