<extend file='../master'/>
<block name="content">
    <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
        <li>
            <a href=""><i class="fa fa-cogs"></i>
                链接管理</a>
        </li>
        <li class="active">
            <a href="">链接编辑</a>
        </li>
    </ol>
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="">链接管理</a></li>
        <li class="active"><a href="">链接编辑</a></li>
    </ul>
    <form class="form-horizontal" id="form"  action="" method="post" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">链接管理</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">链接名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="lname"  class="form-control" placeholder="链接名称" value="{{$oldData['lname']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">URL</label>
                    <div class="col-sm-9">
                        <input type="text" name="url"  class="form-control" placeholder="URL" value="{{$oldData['url']}}">
                    </div>
                </div>

                <div class="form-group">
                <label for="" class="col-sm-2 control-label">LOGO</label>
<!--                单图上传-->
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" name="logo" readonly="" value="{{$oldData['logo']}}">
                            <div class="input-group-btn">
                                <button  class="btn btn-default" type="button" onclick="upImage(this)">选择图片
                                </button>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <img src="{{$oldData['logo']}}" class="img-responsive img-thumbnail haibao"
                                 width="100">
                            <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="removeImg(this)">×</em>
                        </div>
                        <span class="help-block">建议大小(宽50高50)</span>
                    </div>
                    <script>
                        //上传图片
                        function upImage(obj) {
                            require(['util'], function (util) {
                                options = {
                                    multiple: false,//是否允许多图上传
                                    data:'',
                                    hash:1
                                    //hash为确定上传文件标识（可以是用户编号，标识为此用户上传的文件，系统使用这个字段值来显示文件列表），data为文件的附加数据值，开发者根据业务需要自行添加
                                };
                                util.image(function (images) {          //上传成功的图片，数组类型 
                                    $("[name='logo']").val(images[0]);
                                    $(".img-thumbnail").attr('src', images[0]);
                                }, options)
                            });
                        }

                        //移除图片 
                        function removeImg(obj) {
                            $(obj).prev('img').attr('src', 'resource/images/nopic.jpg');
                            $(obj).parent().prev().find('input').val('');
                        }

                    </script>

                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="number" name="sort"  class="form-control" placeholder="请填写序号" value="{{$oldData['sort']}}">
                    </div>
                </div>


            </div>
        </div>
        <button class="btn btn-primary" type="submit">确定</button>
    </form>

</block>
<script>

</script>