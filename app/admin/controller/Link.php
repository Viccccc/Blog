<?php

namespace app\admin\controller;
/**
 * Class Link
 * @package app\admin\controller
 * 友情链接控制器
 */
class Link extends Common {
    private $model;
    /**
     * 构造方法 实例化模型
     */
    public function __construct()
    {
        $this->model = new \system\model\Link();
        parent::__construct();
    }

    public function index(){
        // 获取数据
        $data = Db::table("link")->get();
        View::with("data",$data);
        // 载入模板
        return view();
    }

    /**
     * 添加
     */
    public function add () {
        // 添加
        if(IS_POST){
            if($this->model->add()){
                message("添加成功",u("admin.link.index"),"success");
            }else{
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
        $lid = Q("get.lid");
        // 获取旧数据
        $oldData = Db::table("link")->where("lid",$lid)->first();
        View::with("oldData",$oldData);
        // 进行编辑
        if(IS_POST){
            if($this->model->edit()){
                message("编辑成功",u("admin.link.index"),"success");
            }else{
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
        $lid = Q("get.lid");
        $this->model->where("lid",$lid)->delete();
        message("删除成功",u("admin.link.index"),"success");
    }
}
