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

class Article_comment extends Model{
	//数据表
	protected $table = "article_comment";

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

    public function addMessage() {
        $comment = new Article_comment();
        $comment["article_aid"] = Q("get.aid");
        $comment["username"] = Q("post.username");
        $comment["user_message"] = Q("post.user_message");
        $comment["message_time"] = time();
        $_POST["message_time"] = date("Y-m-d H:i:s",time());
        $comment->save();
        echo json_encode($_POST);
        return true;
    }
}