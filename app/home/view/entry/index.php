<extend file="../home" />
<block name="content">
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
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="widewrapper main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <foreach from="$data" key="$k" value="$v">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <article class=" blog-teaser">
                                <header>
                                    <img style="width: 750px;height: 400px;" src="{{$v['thumb']}}"  class="img-responsive"/>
                                    <h3><a href="arc_{{$v['aid']}}.html">{{$v['title']}}</a></h3>
                                    <span class="meta">{{date("Y-m-d H:i:s",$v["created_at"])}} from {{$v['author']}}</span>
                                    <hr>
                                </header>

                            </article>
                        </div>

                    </div>
                    </foreach>
                    {{$page}}
                    
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
                                <foreach from="$hotArticle" key="$k" value="$v">
                                <li><a href="arc_{{$v['aid']}}.html">{{$v["title"]}}</a></li>
                                </foreach>
                            </ul>
                        </div>
                    </div>

                    <div class="aside-widget">
                        <header>
                            <h3>分类</h3>
                        </header>
                        <div class="body clearfix">
                            <ul class="tags">
                                <foreach from="$comCate" key="$k" value="$v">
                                    <li><a href="cate_{{$v['cid']}}.html">{{$v["cname"]}}({{$v["total"]}})</a></li>
                                </foreach>
                            </ul>
                        </div>
                    </div>

                    <div class="aside-widget">
                        <header>
                            <h3>标签</h3>
                        </header>
                        <div class="body clearfix">
                            <ul class="tags">
                                <foreach from="$comTag" key="$k" value="$v">
                                <li><a href="tag_{{$v['tid']}}.html">{{$v["tname"]}}</a></li>
                                </foreach>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    </block>

