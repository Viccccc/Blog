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
                    <a href="#">Blog</a>
                </div>

                <div class="clean-searchbox">
                    <form name="search_article" action="./index.php?s=home/search/index" method="post" accept-charset="utf-8">
                        <input class="searchfield" name="searchBox" id="searchbox" type="text" placeholder="文章的关键字">
                        <button class="searchbutton" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    <input type='hidden' name='__TOKEN__' value='31cd2a5659e5999f01faf7bebf6a5944'/></form>
                </div>
            </div>
        </div>
    </header>

    <div class="widewrapper main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <?php if(!empty($data)){ foreach ($data as $k=>$v){?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <article class=" blog-teaser">
                                <header>
                                    <img style="width: 750px;height: 400px;" src="<?php echo $v['thumb']?>"  class="img-responsive"/>
                                    <h3><a href="arc_<?php echo $v['aid']?>.html"><?php echo $v['title']?></a></h3>
                                    <span class="meta"><?php echo date("Y-m-d H:i:s",$v["created_at"])?> from <?php echo $v['author']?></span>
                                    <hr>
                                </header>

                            </article>
                        </div>

                    </div>
                    <?php }}?>
                    <?php echo $page?>
                    
<!--                    <div class="paging">-->
<!--                        <a href="#" class="older">Older Post</i></a>-->
<!--                    </div>-->
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


