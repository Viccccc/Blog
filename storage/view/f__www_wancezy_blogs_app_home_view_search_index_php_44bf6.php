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
                            <a href="entry">Home</a>
                        </li>
                        <li>
                            <a href="about">About</a>
                        </li>
                        <li>
                            <a href="contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>
    </div>
    <!--以上为home-->
    
    <div class="widewrapper subheader">
        <div class="container">
            <h2 style="margin: 0 auto;" class="clean-breadcrumb col-sm-12">
                关键字为:<?php echo $searchBox?>
            </h2>
            <div style="margin: 0 auto; class="clean-breadcrumb">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp共 <?php echo count($searchValue)?> 篇文章
            </div>
        </div>
    </div>
    </header>
    <div class="widewrapper main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <?php if(!empty($searchValue)){ foreach ($searchValue as $k=>$v){?>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <article class=" blog-teaser">
                                    <header>
                                        <img src="<?php echo $v['thumb']?>" alt="">
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
                                    <li><a href="cate_<?php echo $v['cid']?>.html"><?php echo $v["cname"]?></a></li>
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
                                                        <li><a href="arc_9.html">北京雾霾</a></li>
                                                        <li><a href="arc_8.html">世界上最好的语言</a></li>
                                                        <li><a href="arc_7.html">用30行代码做出京东页面</a></li>
                                                    </ul>
                    </div>

                    <div class="col-md-4 footer-widget">
                        <h3> <i class="fa fa-envelope"></i>联系我吧</h3>
                        <p>请留下你的联系方式</p>
                        <div class="footer-widget-icon">
                            <i class="fa fa-facebook"></i><i class="fa fa-twitter"></i><i class="fa fa-google"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="widewrapper copyright">
            Copyright© 2017 | Mr.Rao
        </div>
    </footer>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="./resource/js/bootstrap.min.js"></script>
    <script src="./resource/js/modernizr.js"></script>

</body>
</html>
