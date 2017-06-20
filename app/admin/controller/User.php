<?php

namespace app\admin\controller;

class User{
    private $model;

    /**
     * 构造方法
     */
    public function __construct()
    {
        $this->model = new \system\model\User();
    }

    /**
     * 登录
     * 1.载入模板
     * 2.操作模型方法
     */
    public function login(){
        if (IS_POST) {
            // 操作模型方法
            if ($this->model->login()) {
                message("登录成功",u("admin.entry.index"),"success");
            } else {
                message($this->model->getError(),"back","error");
            }
        }
        // 载入模板
        return view();
    }

    /**
     * 验证码
     */
    public function code () {
        // 使用框架内置的Code类
        Code::num(4)->make();
    }

    /**
     * 修改密码
     * 1.载入模板
     * 2.操作模型方法
     */
    public function changePsw () {
        if (IS_POST) {
            // 修改模型类
            if ($this->model->edit()) {
                message("修改密码成功","admin.user.login","success");
            } else {
                message($this->model->getError(),"back","error");
            }
        }
        // 载入模板
        return view();
    }

    /**
     * 退出
     * 1.删除session
     * 2.销毁文件
     * 3.跳转到登录页面
     */
    public function out () {
        session_unset();
        session_destroy();
        go(u("admin.user.login"));
    }
}
