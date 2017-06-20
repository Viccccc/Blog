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
    
<!--以上为home-->
        <div class="widewrapper subheader">
            <div class="container">
                <div class="clean-breadcrumb">
                    <a href="#">留下你的联系方式吧</a>
                </div>

            </div>
        </div>
    </header>

    <div class="widewrapper main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 clean-superblock" id="contact">
                    <h2>联系方式</h2>
                    
                    <form name="form" method="post" accept-charset="utf-8" class="contact-form">
                        <input type="text" name="username" id="contact-name" placeholder="名字" class="form-control input-lg">
                        <input type="email" name="email" id="contact-email" placeholder="邮箱" class="form-control input-lg">
                        <textarea rows="10" name="message" id="contact-body" placeholder="信息" class="form-control input-lg"></textarea>
                        <div class="buttons clearfix">
                            <button type="submit" class="btn btn-xlarge btn-clean-one">提交</button>
                        </div>                    
                    <input type='hidden' name='__TOKEN__' value='31cd2a5659e5999f01faf7bebf6a5944'/></form>
                </div>
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

