<?php

namespace app\admin\controller;

class Webset extends Common {
    private $model;

    /**
     * 构造方法
     */
    public function __construct()
    {
        $this->model = new \system\model\Webset();
        parent::__construct();
    }
    /**
     * @return mixed
     * 首页显示
     */
    public function index(){
        $data = Db::table("webset")->get();
        View::with("data",$data);
        if (IS_POST) {
            $websetData = $_POST;
            foreach ($websetData as $k=>$v) {
                $this->model->where("wname",$k)->update(["wvalue"=>$v]);
            }
            message("操作成功",u("admin.webset.index"),"success");
        }
        return view();
    }
}
