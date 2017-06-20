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

class Tag extends Model{
	//数据表
	protected $table = "tag";

	//允许填充字段
	protected $allowFill = [ ];

	//禁止填充字段
	protected $denyFill = [ ];

	//完整表名
	protected $full = false;

	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]
        ["tname","required","请填写标签",3,3],
        ["tname","unique","标签名已存在",3,3]
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
     * 添加
     * 1.获取数据
     * 2.将获得的字符串以"|"分隔成数组
     * 3.将数据存入数据库中
     */
	public function add () {
	    // 获取数据
	    $tags = Q("post.tname");
	    // 将获得的字符串以"|"分隔成数组
	    $tags = explode("|",$tags);
	    // 将数据存入数组中
	    $tag = new Tag();
        foreach ($tags as $v) {
            $tag["tname"] = $v;
            $tag->save();
	    }
	    return true;
    }

    /**
     * 编辑
     * 1.获取要编辑的标签的tid
     * 2.根据tid获取该标签的信息
     * 3.修改该标签的tname
     */
    public function edit () {
        // 获取要编辑的标签的tid
        $tid = Q("get.tid");
        // 获取该标签的信息
        $tag = Tag::find($tid);
        // 修改该标签的tname
        $tag["tname"] = Q("post.tname");
        return $tag->save();
    }
}