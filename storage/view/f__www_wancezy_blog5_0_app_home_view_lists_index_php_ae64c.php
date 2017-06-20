<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>CheliOus教学博客-列表页</title>
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
                        <li ><a href="entry">首页</a></li>
                                                    <li                 class="_active"
               ><a href="cate_1.html">新闻</a></li>
                                                    <li ><a href="cate_4.html">世界</a></li>
                                                    <li ><a href="cate_22.html">娱乐</a></li>
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
                
    <article>
        <div class="_head category_title">
            <h2>
                <?php echo $HeadData["type"]?>：
                <!--分类：-->
                <?php echo $HeadData["name"]?>
            </h2>
            <span>
									共 <?php echo $HeadData["total"]?> 篇文章
								</span>
        </div>
    </article>
    <?php if(!empty($ArticleData)){ foreach ($ArticleData as $k=>$v){?>
    <article>
        <div class="_head">
            <h1><?php echo $v["title"]?></h1>
            <span>
								作者：
								<?php echo $v["author"]?>
								</span>
            •
            <!--pubdate表⽰示发布⽇日期-->
            <time pubdate="pubdate" datetime=""><?php echo date("Y-m-d H:i:s",$v["created_at"])?></time>
            •
            分类：
            <a href="cate_<?php echo $v['cid']?>.html"><?php echo $v["cname"]?></a>
        </div>
        <div class="_digest">
            <img src="<?php echo $v['thumb']?>"  class="img-responsive"/>
            <p>
                <?php echo $v["digest"]?>
            </p>
        </div>
        <div class="_more">
            <a href="arc_<?php echo $v['aid']?>.html" class="btn btn-default">阅读全文</a>
        </div>
        <div class="_footer">
            <i class="glyphicon glyphicon-tags"></i>
            <?php if(!empty($v['tag'])){ foreach ($v['tag'] as $kk=>$vv){?>
                <a href="tag_<?php echo $vv['tid']?>.html"><?php echo $vv["tname"]?></a>、
            <?php }}?>
        </div>
    </article>
    <?php }}?>
    <?php echo $page?>
</blade>
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
                                                    <a href="cate_1.html">新闻 (2)</a>
                                                    <a href="cate_2.html">腾讯新闻 (0)</a>
                                                    <a href="cate_3.html">新浪新闻 (0)</a>
                                                    <a href="cate_4.html">世界 (3)</a>
                                                    <a href="cate_5.html">亚洲 (1)</a>
                                                    <a href="cate_22.html">娱乐 (0)</a>
                                            </div>
                </div>
                <div class="_widget">
                    <h4>标签云</h4>
                    <div class="_tag">
                                                    <a href="tag_1.html">PHP</a>
                                                    <a href="tag_2.html">JS</a>
                                                    <a href="tag_3.html">jQuery</a>
                                                    <a href="tag_4.html">MySQL</a>
                                                    <a href="tag_5.html">CSS</a>
                                                    <a href="tag_6.html">HTML</a>
                                                    <a href="tag_8.html">Java</a>
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
                                <div id="" class="_single">
                    <p><a href="">世界上最好的语言</a></p>
                    <time>2017-05-10 17:28:09</time>
                </div>
                                <div id="" class="_single">
                    <p><a href="">用30行代码做出京东页面</a></p>
                    <time>2017-05-10 17:23:08</time>
                </div>
                            </div>
            <div class="col-sm-4 footer_tag">
                <div id="">
                    <h4 class="_title">标签云</h4>
                                            <a href="tag_1.html">PHP</a>
                                            <a href="tag_2.html">JS</a>
                                            <a href="tag_3.html">jQuery</a>
                                            <a href="tag_4.html">MySQL</a>
                                            <a href="tag_5.html">CSS</a>
                                            <a href="tag_6.html">HTML</a>
                                            <a href="tag_8.html">Java</a>
                                    </div>
            </div>
            <div class="col-sm-4">
                <h4 class="_title">友情链接</h4>
                <div id="" class="_single">
                                        <p><a href="www.baidu.com" target="_blank">百度</a>
                        <img style="width: 15px;height: 15px;" src="attachment/2017/05/09/56641494326446.jpg" alt="">
                    </p>
                                        <p><a href="www.sina.com" target="_blank">新浪</a>
                        <img style="width: 15px;height: 15px;" src="attachment/2017/05/09/10101494326492.jpg" alt="">
                    </p>
                                        <p><a href="www.163.com" target="_blank">网易</a>
                        <img style="width: 15px;height: 15px;" src="attachment/2017/05/09/74911494326543.jpg" alt="">
                    </p>
                                    </div>
            </div>
        </div>
    </div>
</footer>
<div class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
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
