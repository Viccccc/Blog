<?php

namespace app\admin\controller;
/**
 * Class Category
 * @package app\admin\controller
 * 分类管理控制器
 */
class Category extends Common {
    private $model;

    /**
     * 构造方法 实例化模型
     */
    public function __construct()
    {
        $this->model = new \system\model\Category();
        parent::__construct();  // 覆盖父类的构造方法
    }

    /**
     * 列表页
     */
    public function index(){
        $data = Db::table("category")->get();
//        $page = $data->links();
        $treeData = Data::tree($data,"cname");
        // 分配变量
        View::with("treeData",$treeData);
        // 载入模板
        return view();
    }

    /**
     * 添加
     */
    public function add () {
        $data = Db::table("category")->get();
        $treeData = Data::tree($data,"cname");
        // 分配变量
        View::with("treeData",$treeData);
        if (IS_POST) {
            if ($this->model->add()) {
                message("添加成功",u("admin.category.index"),"success");
            } else {
                message($this->model->getError(),"back","error");
            }
        }
        // 载入模板
        return view();
    }

    /**
     * 添加子分类
     */
    public function addSon () {
        $cid = Q("get.cid");
        // 获得要添加子分类的分类的数据
        $data = Db::table("category")->where("cid",$cid)->first();
        $cname = $data["cname"];
        // 分配变量
        View::with("cid",$cid)->with("cname",$cname);
        if (IS_POST) {
            if ($this->model->addSon()) {
                message("添加成功",u("admin.category.index"),"success");
            } else {
                message($this->model->getError(),"back","error");
            }
        }
        // 载入模板
        return view();
    }

    /**
     * 编辑
     */
    public function edit () {
        // 获取要编辑的分类的cid
        $cid = Q("get.cid");
        // 获取旧数据
        $oldData = Db::table("category")->where("cid",$cid)->first();
        $fatherCid = $oldData["pid"];
        // 获得除了要编辑的类和其子类的数据
        $data = Db::table("category")->where("cid","!=",$cid)->get();
        $treeData = Data::tree($data,"cname");
        // 分配变量
        View::with("oldData",$oldData)->with("treeData",$treeData)->with("fatherCid",$fatherCid);
        // 进行编辑
        if (IS_POST) {
            if ($this->model->edit()) {
                message("编辑成功",u("admin.category.index"),"success");
            } else {
                message($this->model->getError(),"back","error");
            }
        }
        // 载入模板
        return view();
    }

    /**
     * 删除
     */
    public function del () {
        if ($this->model->del()) {
            message("删除成功",u("admin.category.index"),"success");
        } else {
            message($this->model->getError(),"back","error");
        }
    }
}
