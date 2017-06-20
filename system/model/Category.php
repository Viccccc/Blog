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

class Category extends Model{
	//数据表
	protected $table = "category";

	//允许填充字段
	protected $allowFill = [ ];

	//禁止填充字段
	protected $denyFill = [ ];

	//完整表名
	protected $full = false;

	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]
        ["cname", "required", "请填写分类名", 3, 3],
        ["cname", "unique", "分类名重复", 3, 3],
        ["ctitle", "required", "请填写分类标题", 3, 3],
        ["cdes", "required", "请填写分类描述", 3, 3],
        ["ckeywords", "required", "请填写分类关键字", 3, 3],
        ["csort", "required", "请填写分类排序", 3, 3],
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
     */
	public function add () {
        // 获取数据
        $cname = Q("post.cname");
        $pid = Q("post.pid");
        $ctitle = Q("post.ctitle");
        $cdes = Q("post.cdes");
        $ckeywords = Q("post.ckeywords");
        $csort = Q("post.csort");
        $category = new Category();
        $category["cname"] = $cname;
        $category["pid"] = $pid;
        $category["ctitle"] = $ctitle;
        $category["cdes"] = $cdes;
        $category["ckeywords"] = $ckeywords;
        $category["csort"] = $csort;
        $category->save();
        return true;
    }

    /**
     * 添加子分类
     */
    public function addSon () {
        // 获取数据
        $cname = Q("post.cname");
        $pid = Q("post.pid");
        $ctitle = Q("post.ctitle");
        $cdes = Q("post.cdes");
        $ckeywords = Q("post.ckeywords");
        $csort = Q("post.csort");
        $category = new Category();
        $category["cname"] = $cname;
        $category["pid"] = $pid;
        $category["ctitle"] = $ctitle;
        $category["cdes"] = $cdes;
        $category["ckeywords"] = $ckeywords;
        $category["csort"] = $csort;
        $category->save();
        return true;
    }

    /**
     * 编辑
     */
    public function edit () {
        // 获取要编辑的分类的cid
        $cid = Q("get.cid");
        // 获取该分类的信息
        $category = Category::find($cid);
        // 修改
        $category["cname"] = Q("post.cname");
        $category["pid"] = Q("post.pid");
        $category["ctitle"] = Q("post.ctitle");
        $category["cdes"] = Q("post.cdes");
        $category["ckeywords"] = Q("post.ckeywords");
        $category["csort"] = Q("post.csort");
        $category->save();
        return true;

    }

    /**
     * 删除
     */
    public function del() {
        // 获得要删除的分类的cid
        $cid = Q("get.cid");
        $oldData = Db::table("category")->where("cid",$cid)->first();
        $fatherPid = $oldData["pid"];
        $data = Db::query("select * from category where pid=cid",["cid"=>$cid]);
        foreach ($data as $v) {
            Db::table("category")->where("cid",$v["cid"])->update(["pid"=>$fatherPid]);
        }
        // 进行删除操作
        Db::table("category")->where("cid",$cid)->delete();
        return true;
    }

    /**
     * 处理所属分类
     */
    //获取除去自己和自己子集的数据
    public function getCateData($cid)
    {
        $allCateData = Db::table('category')->get();
        //找自己子集的数据
        $cids = $this->getSon($allCateData, $cid);
        //追加自己
        $cids[] = $cid;
        //除去自己和自己子集的数据
        $cateData = Db::table('category')->WhereNotIn('cid', $cids)->get();
        //树状
        return $cateData = Data::tree($cateData, 'cname');
    }

    //递归找子集(找见自己所有的儿子)
    public function getSon($data, $cid)
    {
        static $arr = [];
        foreach ($data as $v) {
            if ($v['pid'] == $cid) {
                //证明谁是谁的儿子
                $arr[] = $v['cid'];
                //递归找子集
                $this->getSon($data, $v['cid']);
            }
        }
        return $arr;
    }

    // 递归找父集
    public function getFather ($data,$pid) {
        static $father = [];
        foreach ($data as $v) {
            if ($v["cid"] == $pid) {
                $father[] = $v["cid"];
                $this->getFather($data,$v["pid"]);
            }
        }
        return $father;
    }
}