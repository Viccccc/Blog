<extend file='../master'/>
<block name="content">
    <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
        <li>
            <a href="javascript:;"><i class="fa fa-cogs"></i>
                密码管理</a>
        </li>
        <li class="active">
            <a href="javascript:;">修改密码</a>
        </li>
    </ol>
    <form action="" method="post" class="form-horizontal" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">修改密码</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">原始密码</label>
                    <div class="col-sm-9">
                        <input required type="text" name="password"  class="form-control" placeholder="请填写原始密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">新密码</label>
                    <div class="col-sm-9">
                        <input required type="text" name="new_password"  class="form-control" placeholder="请填写新密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-9">
                        <input required type="text" name="confirm_password"  class="form-control" placeholder="请填写确认密码">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">确定</button>
    </form>
</block>
<script>
    
</script>

