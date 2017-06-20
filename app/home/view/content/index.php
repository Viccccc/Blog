<extend file="../home" />
<block name="content">

        <div class="widewrapper subheader">
            <div class="container">
                <div class="clean-breadcrumb">
                    <foreach from="$fatherName" key="$k" value="$v">
                    <a href="#">{{$v}}</a> /
                    </foreach>
                    <a href="#">{{$cate}}</a>
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
                                <img src="{{$data['thumb']}}" alt="" class="img-responsive col-md-12 col-sm-12">
                                
                            </div>
                        </header>
                        <div class="body col-md-12 col-sm-12">
                            <h1>{{$data["title"]}}</h1>
                            <div class="meta">
                                <i class="fa fa-user"></i> {{$data["author"]}}
                                <i class="fa fa-calendar"></i>{{date("Y-m-d H:i:s",$data["created_at"])}}
                                <i class="fa fa-comments"></i>
                                <span class="data"><a href="#comments"><span class="message_count">{{$data["message_count"]}} </span> 条评论</a></span>
                            </div>
                            <p class="col-md-12 col-sm-12">{{$data["content"]}}</p>

                        </div>
                    </article>

<!--                    <aside class="social-icons clearfix">-->
<!--                        <h3> 分享 </h3>-->
<!--                        <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-google"></i></a>-->
<!--                    </aside>-->

                    <aside class="comments" id="comments">
                        <hr>

                        <h2><i class="fa fa-comments"></i><span class="message_count">{{$data["message_count"]}} </span>条评论</h2>
                        <foreach from="$data['message']" key="$k" value="$v">
                        <article class="comment">
                            <header class="clearfix">
                                <img src="./resource/img/avatar.png" alt="A Smart Guy" class="avatar">
                                <div class="meta">
                                    <h3><a href="#">{{$v["username"]}}</a></h3>
                                    <span class="date">{{date("Y-m-d H:i:s",$v["message_time"])}}</span>
                                    <span class="separator"> - </span>
                                    <a href="#create-comment" class="reply-link">发布</a>
                                </div>
                            </header>
                             <div class="body">{{$v["user_message"]}}</div>
                        </article>
                        </foreach>
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
                        </form>
                        <input id="aid" type="hidden" name="aid" value="{{$data['aid']}}">
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