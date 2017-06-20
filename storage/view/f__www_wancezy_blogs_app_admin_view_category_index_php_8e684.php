<html>
<head>
    <meta charset="utf-8"/>    <title>Mr.Rao的博客系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="http://localhost/wancezy/BlogS/resource/hdjs/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/wancezy/BlogS/resource/css/site.css" rel="stylesheet">
    <link href="http://localhost/wancezy/BlogS/resource/hdjs/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://localhost/wancezy/BlogS/resource/hdjs/js/jquery.min.js"></script>
    <script src="http://localhost/wancezy/BlogS/resource/hdjs/app/util.js"></script>
    <script src="http://localhost/wancezy/BlogS/resource/hdjs/require.js"></script>
    <script src="http://localhost/wancezy/BlogS/resource/hdjs/app/config.js"></script>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        if (navigator.appName == 'Microsoft Internet Explorer') {
            if (navigator.userAgent.indexOf("MSIE 5.0") > 0 || navigator.userAgent.indexOf("MSIE 6.0") > 0 || navigator.userAgent.indexOf("MSIE 7.0") > 0) {
                alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
            }
        }
    </script>
    <style>
        i {
            color: #337ab7;
        }
        .fa{
            margin-top: 12px;
        }
        .panel-heading .panel-title {
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container-fluid admin-top">
    <!--导航-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <h4 style="display: inline;line-height: 50px;float: left;margin: 0px"><a href="http://localhost/wancezy/BlogS/index.php?s=admin/Entry/index" style="color: white;margin-left: -14px">Mr.Rao的博客系统</a></h4>
                <div class="navbar-header">
                    <ul class="nav navbar-nav">

                        <li>
                            <a href="http://www.kancloud.cn/houdunwang/hdphp3/215156" target="_blank"><i class="fa fa-w fa-file-code-o"></i> 在线文档</a>
                        </li>
                        <li>
                            <a href="http://fontawesome.dashgame.com/" target="_blank"><i class="fa fa-w fa-hand-o-right"></i>   图标库</a>
                        </li>
                        <li>
                            <a href="http://www.chelious.com" target="_blank"><i class="fa fa-w fa-forumbee"></i> 论坛讨论</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-w fa-user"></i>
                            admin                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost/wancezy/BlogS/index.php?s=admin/user/changePsw">修改密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="http://localhost/wancezy/BlogS/index.php?s=admin/user/out">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
</div>
<!--主体-->
<div class="container-fluid admin_menu">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
            <div class="panel panel-default" id="menus" >
                <!--分类管理-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="border-top: 1px solid #ddd;border-radius: 0%">
                    <h4 class="panel-title">分类管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample">
                    <a href="http://localhost/wancezy/BlogS/index.php?s=admin/category/index" class="list-group-item" >
                        <i class="fa fa-align-center" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        分类列表
                    </a>
                    <a href="http://localhost/wancezy/BlogS/index.php?s=admin/category/add" class="list-group-item" >
                        <i class="fa fa-arrows" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        分类添加
                    </a>
                </ul>
                <!--学员管理菜单 end-->

                <!--课程管理菜单-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">标签管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample2" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample2">
                    <a href="http://localhost/wancezy/BlogS/index.php?s=admin/tag/index" class="list-group-item" >
                        <i class="fa fa-hand-spock-o" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        标签列表
                    </a>
                    <a href="http://localhost/wancezy/BlogS/index.php?s=admin/tag/add" class="list-group-item" >
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        标签添加
                    </a>
                </ul>
                <!--课程管理菜单 end-->

                <!--网站配置管理菜单-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">文章管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample3">
                    <a href="http://localhost/wancezy/BlogS/index.php?s=admin/article/index" class="list-group-item" >
                        <i class="fa fa-list" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        文章列表
                    </a>
                    <a href="http://localhost/wancezy/BlogS/index.php?s=admin/article/add" class="list-group-item" >
                        <i class="fa fa-file" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        文章添加
                    </a>
                    <a href="http://localhost/wancezy/BlogS/index.php?s=admin/article/recycle" class="list-group-item" >
                        <i class="fa fa-bitbucket" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        回收站
                    </a>
                </ul>
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample4" aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">站点配置</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample4" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample4">
                    <a href="http://localhost/wancezy/BlogS/index.php?s=admin/webset/index" class="list-group-item" >
                        <i class="fa fa-list" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        站点配置
                    </a>
                </ul>
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample5" aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">友情链接</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample5" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample5">
                    <a href="http://localhost/wancezy/BlogS/index.php?s=admin/link/index" class="list-group-item" >
                        <i class="fa fa-list" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        链接列表
                    </a>
                    <a href="http://localhost/wancezy/BlogS/index.php?s=admin/link/add" class="list-group-item" >
                        <i class="fa fa-file" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        链接添加
                    </a>
                </ul>

                <!--网站配置管理菜单 end-->
            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-lg-10">
            
    <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
        <li>
            <a href=""><i class="fa fa-cogs"></i>
                分类管理</a>
        </li>
        <li class="active">
            <a href="">分类展示</a>
        </li>
    </ol>
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="">分类管理</a></li>
        <li><a href="<?php echo u('category.add')?>">添加分类</a></li>
    </ul>
    <form action="" method="post">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="80">编号</th>
                        <th>分类名称</th>
                        <th width="200">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($treeData)){ foreach ($treeData as $k=>$v){?>
                        <tr>
                            <td><?php echo $v["cid"]?></td>
                            <td><?php echo $v["_cname"]?></td>
                            <td>
                                <div class="btn-group">
                                    <button data-toggle="dropdown"
                                            class="btn btn-primary btn-xs dropdown-toggle">操作 <span
                                                class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="<?php echo u('admin.category.addSon',['cid'=>$v['cid']])?>">添加子类</a>
                                        </li>
                                        <li><a href="<?php echo u('admin.category.edit',['cid'=>$v['cid']])?>">编辑</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:;" onclick="del(<?php echo $v['cid']?>)">删除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php }}?>
                    </tbody>
                </table>
            </div>
        </div>
    <input type='hidden' name='__TOKEN__' value='31cd2a5659e5999f01faf7bebf6a5944'/></form>
    <div class="pagination pagination-sm pull-right">
        <?php echo $page?>
    </div>

        </div>
    </div>
</div>
<!--<div class="master-footer" style="margin-top: 150px">-->
<!--    <a href="http://www.wanzcy.com">高端培训</a>-->
<!--    <a href="http://www.hdphp.com">开源框架</a>-->
<!--    <a href="#">Mr.Rao的论坛</a>-->
<!--    <br>-->
<!--    Powered by raohonghua v2.0 © 2016-2022 -->
<!--</div>-->
</body>
</html>
<script>
    require(['bootstrap'],function($){})
</script>

<script>
    function del(cid) {
        var obj = util.modal({
            title:'确认删除吗?',//标题
            content:'',//内容
            footer:'<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button><button type="button" class="btn btn-danger confirm" data-dismiss="modal">删除</button>',//底部
            width:600,//宽度
            events:{
                confirm:function(){
                    //哪个元素上有.confirm类，被点击就执行这个回调
                    location.href = "<?php echo u('admin.category.del')?>" + '&cid=' + cid;
                }
            }
        });
        //显示模态框
        obj.modal('show');
    }
</script>