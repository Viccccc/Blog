<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo $conf["title"]?></title>
    <!--描述和摘要-->
    <meta name="Description" content=""/>
    <meta name="Keywords" content=""/>
    <!--载入公共模板-->
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="./resource/home/org/bootstrap-3.3.5-dist/css/bootstrap.min.css" />
    <script src="./resource/home/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="./resource/home/org/bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="./resource/home/css/index.css" />
    <link rel="stylesheet" type="text/css" href="./resource/home/css/backTop.css"/>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>欢迎来到CheliOus-BLOG教学系统</h1>
            </div>
        </div>
    </div>
</header>
<nav role="navigation" class="navbar navbar-default">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" >

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">

                        <span class="sr-only">切换导航</span>

                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>


                <div class="collapse navbar-collapse" id="example-navbar-collapse">
                    <ul class="_menu" >
                        <li <?php if(CONTROLLER==Entry){?>
                class="_active"
               <?php }?>><a href="<?php echo entry?>">首页</a></li>
                        <?php if(!empty($comHead)){ foreach ($comHead as $k=>$v){?>
                            <li <?php if($v['cid']==Q('get.cid')){?>
                class="_active"
               <?php }?>><a href="cate_<?php echo $v['cid']?>.html"><?php echo $v['cname']?></a></li>
                        <?php }}?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<section>
    <div class="container">
        <div class="row">
            <!--标签规定文档的主要内容main-->
            <main class="col-md-8">
                <!--blade_content--></blade>
            </main>
            <aside class="col-md-4 hidden-sm hidden-xs">
                <div class="_widget">
                    <h4>关于自己</h4>
                    <div class="_info">
                        <p>多年一线开发经验与讲师经验。擅长引导思维，而不是一味灌输，新生代优秀青年讲师的代表...</p>
                        <p>
                            <i class="glyphicon glyphicon-volume-down"></i>
                            目前就职于
                            <a href="http://www.chelious.com" target="_blank">不告诉你</a>
                        </p>
                    </div>
                </div>
                <div class="_widget">
                    <h4>分类列表</h4>
                    <div>
                        <?php if(!empty($comCate)){ foreach ($comCate as $k=>$v){?>
                            <a href="cate_<?php echo $v['cid']?>.html"><?php echo $v["cname"]?> (<?php echo $v["total"]?>)</a>
                        <?php }}?>
                    </div>
                </div>
                <div class="_widget">
                    <h4>标签云</h4>
                    <div class="_tag">
                        <?php if(!empty($comTag)){ foreach ($comTag as $k=>$v){?>
                            <a href="tag_<?php echo $v['tid']?>.html"><?php echo $v["tname"]?></a>
                        <?php }}?>
                    </div>
                </div>

            </aside>
        </div>
    </div>
</section>
<footer class="hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h4 class="_title">最新文章</h4>
                <?php if(!empty($newArticle)){ foreach ($newArticle as $k=>$v){?>
                <div id="" class="_single">
                    <p><a href=""><?php echo $v["title"]?></a></p>
                    <time><?php echo date("Y-m-d H:i:s",$v["created_at"])?></time>
                </div>
                <?php }}?>
            </div>
            <div class="col-sm-4 footer_tag">
                <div id="">
                    <h4 class="_title">标签云</h4>
                    <?php if(!empty($comTag)){ foreach ($comTag as $k=>$v){?>
                        <a href="tag_<?php echo $v['tid']?>.html"><?php echo $v["tname"]?></a>
                    <?php }}?>
                </div>
            </div>
            <div class="col-sm-4">
                <h4 class="_title">友情链接</h4>
                <div id="" class="_single">
                    <?php if(!empty($link)){ foreach ($link as $k=>$v){?>
                    <p><a href="<?php echo $v['url']?>" target="_blank"><?php echo $v["lname"]?></a>
                        <img style="width: 15px;height: 15px;" src="<?php echo $v['logo']?>" alt="">
                    </p>
                    <?php }}?>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php if(!empty($comWebSet)){ foreach ($comWebSet as $k=>$v){?>
                    <a href=""><?php echo $v?></a>
                <?php }}?>
            </div>
        </div>
    </div>
</div>
<!--返回顶部自己写的插件-->
<script src="./resource/home/js/backTop.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(function(){
        //插件使用
        $('.back_top').backTop({right:30});
    })
</script>
<div class="back_top hidden-xs hidden-md">
    <i class="glyphicon glyphicon-menu-up"></i>
</div>
</body>
</html>