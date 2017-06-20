<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mr.Rao's Blog</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="./resource/css/bootstrap.min.css">


    <!-- Font-Awesome -->
    <link rel="stylesheet" href="./resource/css/font-awesome/css/font-awesome.min.css">

    <!-- Google Webfonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600|PT+Serif:400,400italic' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" href="./resource/css/style.css" id="theme-styles">

    <!--[if lt IE 9]>
    <script src="./resource/js/vendor/google/html5-3.6-respond-1.1.0.min.js"></script>
    <![endif]-->
    <script src="./resource/js/jquery.min.js"></script>

</head>
<body>
<header>
    <div class="widewrapper masthead">
        <div class="container">
            <a style="font-size: 40px;" href="javascript:;" id="logo">
                Mr.Rao's Blog
            </a>

            <div id="mobile-nav-toggle" class="pull-right">
                <a href="#" data-toggle="collapse" data-target=".clean-nav .navbar-collapse">
                    <i class="fa fa-bars"></i>
                </a>
            </div>

            <nav class="pull-right clean-nav">
                <div class="collapse navbar-collapse">
                    <ul class="nav nav-pills navbar-nav">

                        <li>
                            <a href="entry">首页</a>
                        </li>
                        <li>
                            <a href="about">关于我</a>
                        </li>
                        <li>
                            <a href="contact">联系我</a>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>
    </div>
    <!--以上为home-->
    

        <div class="widewrapper subheader">
            <div class="container">
                <div class="clean-breadcrumb">
                    <?php if(!empty($fatherName)){ foreach ($fatherName as $k=>$v){?>
                    <a href="#"><?php echo $v?></a> /
                    <?php }}?>
                    <a href="#"><?php echo $cate?></a>
                </div>

            </div>
        </div>
    </header>

    <div class="widewrapper main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <article class="blog-post social-icons clearfix">
                        <header>
                           
                            <div class="lead-image">
                                <img src="<?php echo $data['thumb']?>" alt="" class="img-responsive col-md-12 col-sm-12">
                                
                            </div>
                        </header>
                        <div class="body col-md-12 col-sm-12">
                            <h1><?php echo $data["title"]?></h1>
                            <div class="meta">
                                <i class="fa fa-user"></i> <?php echo $data["author"]?>
                                <i class="fa fa-calendar"></i><?php echo date("Y-m-d H:i:s",$data["created_at"])?>
                                <i class="fa fa-comments"></i>
                                <span class="data"><a href="#comments"><span class="message_count"><?php echo $data["message_count"]?> </span> 条评论</a></span>
                            </div>
                            <p class="col-md-12 col-sm-12"><?php echo $data["content"]?></p>

                        </div>
                    </article>

<!--                    <aside class="social-icons clearfix">-->
<!--                        <h3> 分享 </h3>-->
<!--                        <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-google"></i></a>-->
<!--                    </aside>-->

                    <aside class="comments" id="comments">
                        <hr>

                        <h2><i class="fa fa-comments"></i><span class="message_count"><?php echo $data["message_count"]?> </span>条评论</h2>
                        <?php if(!empty($data['message'])){ foreach ($data['message'] as $k=>$v){?>
                        <article class="comment">
                            <header class="clearfix">
                                <img src="./resource/img/avatar.png" alt="A Smart Guy" class="avatar">
                                <div class="meta">
                                    <h3><a href="#"><?php echo $v["username"]?></a></h3>
                                    <span class="date"><?php echo date("Y-m-d H:i:s",$v["message_time"])?></span>
                                    <span class="separator"> - </span>
                                    <a href="#create-comment" class="reply-link">发布</a>
                                </div>
                            </header>
                             <div class="body"><?php echo $v["user_message"]?></div>
                        </article>
                        <?php }}?>
                    </aside>

                    <aside class="create-comment" id="create-comment">
                        <hr>    

                        <h2><i class="fa fa-pencil"></i> 评论 </h2>

                        <form name="form" action="#" method="post" accept-charset="utf-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="username" id="comment-name" placeholder="你的名字" class="form-control input-lg">
                                </div>
                            </div>
                            <textarea rows="10" name="user_message" id="comment-body" placeholder="内容" class="form-control input-lg"></textarea>
                            <div class="buttons clearfix">
                                <button type="submit" class="btn btn-xlarge btn-clean-one">发布</button>
                            </div>
                        <input type='hidden' name='__TOKEN__' value='31cd2a5659e5999f01faf7bebf6a5944'/></form>
                        <input id="aid" type="hidden" name="aid" value="<?php echo $data['aid']?>">
                        <script>
                            $(function () {
                                $("form").submit(function (e) {
                                    e.preventDefault();
                                    var formData = $(this).serialize();
                                    $.ajax({
                                        type : "post",
                                        url : "./index.php?s=home/content/addComment&aid="+$("#aid").val(),
                                        data : formData,
                                        dataType : "json",
                                        success : function (phpData) {
                                            var str = '<article class="comment">';
                                            str += '<header class="cleaxfix">';
                                            str += '<img src="./resource/img/avatar.png" alt="A Smart Guy" class="avatar">';
                                            str += '<div class="meta">';
                                            str += '<h3><a href="#">'+phpData.username+'</a></h3>';
                                            str += '<span class="date">'+phpData.message_time+'</span>';
                                            str += '<span class="separator"> - </span>';
                                            str += '<a href="#" class="reply-link">发布</a>';
                                            str += '</div>';
                                            str += '</header>';
                                            str += '<div class="body">'+phpData.user_message+'</div>';
                                            str += '</article>';
                                            $("#comments").append(str);
                                            $(".message_count").html(Number($(".message_count").html())+1);
                                            $(this).reset();
                                        }
                                    });

                                });
                            });
                        </script>
                    </aside>

                </div>
                <aside class="col-md-4 blog-aside">

                    <div class="aside-widget">
                        <header>
                            <h3>热门文章</h3>
                        </header>
                        <div class="body">
                            <ul class="clean-list">
                                <?php if(!empty($hotArticle)){ foreach ($hotArticle as $k=>$v){?>
                                    <li><a href="arc_<?php echo $v['aid']?>.html"><?php echo $v["title"]?></a></li>
                                <?php }}?>
                            </ul>
                        </div>
                    </div>

                    <div class="aside-widget">
                        <header>
                            <h3>分类</h3>
                        </header>
                        <div class="body clearfix">
                            <ul class="tags">
                                <?php if(!empty($comCate)){ foreach ($comCate as $k=>$v){?>
                                    <li><a href="cate_<?php echo $v['cid']?>.html"><?php echo $v["cname"]?>(<?php echo $v["total"]?>)</a></li>
                                <?php }}?>
                            </ul>
                        </div>
                    </div>

                    <div class="aside-widget">
                        <header>
                            <h3>标签</h3>
                        </header>
                        <div class="body clearfix">
                            <ul class="tags">
                                <?php if(!empty($comTag)){ foreach ($comTag as $k=>$v){?>
                                    <li><a href="tag_<?php echo $v['tid']?>.html"><?php echo $v["tname"]?></a></li>
                                <?php }}?>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

</blade>
    <!--一下为home-->
    <footer>
        <div class="widewrapper footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-widget">
                        <h3> <i class="fa fa-user"></i>关于我</h3>
                        <p>我是一只来自东华理工大学的一只小小的程序猿.热爱学习,喜欢敲代码.</p>
                    </div>

                    <div class="col-md-4 footer-widget">
                        <h3> <i class="fa fa-pencil"></i>最新文章</h3>
                        <ul class="clean-list">
                                                        <li><a href="arc_15.html">犀牛书《JavaScript权威指南》应该怎么读？</a></li>
                                                        <li><a href="arc_14.html">颈椎病康复指南</a></li>
                                                        <li><a href="arc_13.html">死神来了</a></li>
                                                    </ul>
                    </div>

                    <div class="col-md-4 footer-widget">
                        <h3> <i class="fa fa-envelope"></i>友情链接</h3>
                        <div class="footer-widget-icon">
<!--                            <a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a>-->
<!--                            <a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a>-->
<!--                            <a href="http://www.google.com"><i class="fa fa-google"></i></a>-->
                                                            <p><a href="http://www.baidu.com" target="_blank"><i class="fa">百度</i></a>
                                    <img style="width: 15px;height: 15px;" src="attachment/2017/05/09/56641494326446.jpg" alt="">
                                </p>
                                                            <p><a href="http://www.sina.com" target="_blank"><i class="fa">新浪</i></a>
                                    <img style="width: 15px;height: 15px;" src="attachment/2017/05/09/10101494326492.jpg" alt="">
                                </p>
                                                            <p><a href="http://www.163.com" target="_blank"><i class="fa">网易</i></a>
                                    <img style="width: 15px;height: 15px;" src="attachment/2017/05/09/74911494326543.jpg" alt="">
                                </p>
                                                    </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="widewrapper copyright">
            Copyright © 2017 | Mr.Rao
        </div>
    </footer>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="./resource/js/bootstrap.min.js"></script>
    <script src="./resource/js/modernizr.js"></script>
    <!--返回顶部自己写的插件-->
<!--    <script src="./resource/home/js/backTop.js" type="text/javascript" charset="utf-8"></script>-->
<!--    <script type="text/javascript">-->
<!--        $(function(){-->
<!--            //插件使用-->
<!--            $('.back_top').backTop({right:30});-->
<!--        })-->
<!--    </script>-->
<!--    <div class="back_top hidden-xs hidden-md">-->
<!--        <i class="glyphicon glyphicon-menu-up"></i>-->
<!--    </div>-->
</body>
</html>
