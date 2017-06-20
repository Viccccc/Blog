<extend file="../home" />
<block name="content">
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
                    </form>
                </div>
            </div>        
        </div>
    </div>
</block>
