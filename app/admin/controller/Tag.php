<?php

namespace app\admin\controller;
/**
 * Class Tag
 * @package app\admin\controller
 * 标签管理控制器
 */
class Tag extends Common {
    private $model;

    /**
     * 构造方法 实例化模型
     */
    public function __construct()
    {
        $this->model = new \system\model\Tag();
        parent::__construct();  // 覆盖父类的构造方法
    }

    /**
     * 列表页
     * 1.载入模板
     * 2.分页
     * 3.分配变量
     */
    public function index(){
        // 分页
        $data = Db::table("tag")->paginate(6);
        $page = $data->links();
        // 分配变量
        View::with("data",$data)->with("page",$page);
        // 载入模板
        return view();
    }

    /**
     * 添加
     * 1.载入模板
     * 2.进行添加
     */
    public function add () {
        // 进行添加
        if (IS_POST) {
            if ($this->model->add()) {
                message("添加成功",u("admin.tag.index"),"success");
            } else {
                message($this->model->getError(),"back","error");
            }
        }
        // 载入模板
        return view();
    }

    /**
     * 编辑
     * 1.载入模板
     * 2.获得要编辑的标签的tid
     * 3.获取旧数据
     * 4.分配变量
     * 5.进行编辑
     */
    public function edit () {
        // 获得要编辑的标签的tid
        $tid = Q("get.tid");
        // 获取旧数据
        $oldData = Db::table("tag")->where("tid",$tid)->first();
        // 分配变量
        View::with("oldData",$oldData);
        // 进行编辑
        if (IS_POST) {
            if ($this->model->edit()) {
                message("编辑成功",u("admin.tag.index"),"success");
            } else {
                message($this->model->getError(),"back","error");
            }
        }
        // 载入模板
        return view();
    }

    /**
     * 删除
     * 1.获得要删除的标签的tid
     * 2.删除
     */
    public function del () {
        // 获得要删除的标签的tid
        $tid = Q("get.tid");
        // 进行删除操作
        $this->model->where("tid",$tid)->delete();
        message("删除成功",u("admin.tag.index"),"success");
    }
}
