<?php
/** .-------------------------------------------------------------------
* |    Author: 熊伟洋 <chelious@foxmail.com>
* |    WeChat: hello_McGrady
* |    	   QQ: 434493420
* |     Motto: Hungry & Humble
* |---------------------------------------------------------------------
* |    Copyright (c) 2012-2020, www.chelious.com. All Rights Reserved.
* '-------------------------------------------------------------------*/

namespace system\model;

use hdphp\Model\Model;

class User extends Model{
	//数据表
	protected $table = "user";

	//允许填充字段
	protected $allowFill = [ ];

	//禁止填充字段
	protected $denyFill = [ ];

	//完整表名
	protected $full = false;

	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]
	];

	//自动完成
	protected $auto=[
		//['字段名','处理方法','方法类型',验证条件,验证时机]
	];

	//自动过滤
    protected $filter=[
        //[表单字段名,过滤条件,处理时间]
    ];

	//时间操作,需要表中存在created_at,updated_at字段
	protected $timestamps=false;

	/**
     * 登录
     * 1.通过post获取表单数据
     * 2.通过用户名获取数据库数据
     * 3.比对用户名,密码,验证码是否正确
     * 5.用户名,密码,验证码都正确就登录成功,然后将用户id,用户名存入session中
     * 4.return true
     */
	public function login() {
	    // 获取表单数据
	    $username = Q("post.username");
//	    $password = Q("post.password");
	    $password = Crypt::encrypt(Q("post.password"));  // 给密码加密,等下要跟数据库中加密的密码对比
	    $code = strtoupper(Q("post.code"));  // 让验证码的所有的字母都大写
        // 通过用户名获取数据库数据
        $userData = Db::table("user")->where("username",$username)->first();
        // 比对用户名,密码是否正确
        if ($userData["username"] != $username || $userData["password"] != $password) {
            $this->error="用户名或密码错误";
            return false;
        }
        // 比对验证码是否正确
        if ($code != $_SESSION["code"]) {
            $this->error = "验证码错误";
            return false;
        }
        // 登录成功,将uid,username存入session中
        $_SESSION["admin"] = ["uid"=>$userData["uid"],"username"=>$username];
        return true;
    }

    /**
     * 修改密码
     * 1.通过post获取表单数据
     * 2.通过用户登录的uid获取当前用户的数据
     * 3.比对密码
     * 4.修改密码
     */
    public function edit () {
        // 获取表单数据
        $password = Crypt::encrypt(Q("post.password"));
//        $password = Q("post.password");
        $newPsw = Crypt::encrypt(Q("post.new_password"));
        $confirmPsw = Crypt::encrypt(Q("post.confirm_password"));
        // 通过用户登录的uid获取当前用户的数据
        $userData = Db::table("user")->where("uid",$_SESSION["admin"]["uid"])->first();
        // 比对旧密码和数据库中的密码
        if ($password != $userData["password"]) {
            $this->error = "旧密码错误";
            return false;
        }
        // 比对旧密码和新密码
        if ($password == $newPsw) {
            $this->error = "新旧密码一致,无需修改";
            return false;
        }
        // 比对新密码和确认密码
        if ($newPsw != $confirmPsw) {
            $this->error = "两次密码输入不一致";
            return false;
        }
        // 进行修改
        $rows = $this->where("uid",$_SESSION["admin"]["uid"])->update(["password"=>$newPsw]);
        if (!$rows) {
            $this->error = "修改密码错误";
            return false;
        }
        return true;
    }
}
