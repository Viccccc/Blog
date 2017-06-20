<extend file="../home" />
<block name="content">
    <div class="widewrapper subheader">
        <div class="container">
            <h2 style="margin: 0 auto;" class="clean-breadcrumb col-sm-12">
                {{$HeadData["type"]}}:{{$HeadData["name"]}}
            </h2>
            <div style="margin: 0 auto; class="clean-breadcrumb">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp共 {{$HeadData["total"]}} 篇文章
            </div>
        </div>
    </div>
    </header>
    <div class="widewrapper main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <foreach from="$ArticleData" key="$k" value="$v">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <article class=" blog-teaser">
                                    <header>
                                        <img style="width: 750px;height: 400px;" src="{{$v['thumb']}}" alt="">
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