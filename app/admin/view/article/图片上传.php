<div class="col-sm-9">
    <div class="input-group">
        <input type="text" class="form-control" name="thumb" readonly="" >
        <div class="input-group-btn">
            <button  class="btn btn-default" type="button" onclick="upImage(this)">选择图片
            </button>
        </div>
    </div>
    <div class="input-group" style="margin-top:5px;">
        <img src="resource/images/nopic.jpg" class="img-responsive img-thumbnail haibao"
             width="150">
        <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="removeImg(this)">×</em>
    </div>
    <span class="help-block">建议大小(宽100高100)</span>
</div>

<script>
    //上传图片
    function upImage(obj) {
        require(['util'], function (util) {
            options = {
                multiple: false,//是否允许多图上传
                data:'',
                hash:1
                //hash为确定上传文件标识（可以是用户编号，标识为此用户上传的文件，系统使用这个字段值来显示文件列表），data为文件的附加数据值，开发者根据业务需要自行添加
            };
            util.image(function (images) {          //上传成功的图片，数组类型 
                $("[name='thumb']").val(images[0]);
                $(".img-thumbnail").attr('src', images[0]);
            }, options)
        });
    }

    //移除图片 
    function removeImg(obj) {
        $(obj).prev('img').attr('src', 'resource/images/nopic.jpg');
        $(obj).parent().prev().find('input').val('');
    }

</script>


******注意:
******所需表:core_attachment.sql