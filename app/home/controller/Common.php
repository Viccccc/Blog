<?php
/** .-------------------------------------------------------------------
* |    Author: 熊伟洋 <chelious@foxmail.com>
* |    WeChat: hello_McGrady
* |    	   QQ: 434493420
* |     Motto: Hungry & Humble
* |---------------------------------------------------------------------
* |    Copyright (c) 2012-2020, www.chelious.com. All Rights Reserved.
* '-------------------------------------------------------------------*/

namespace app\home\controller;
use hdphp\view\View;

/**
 * Class Common
 * @package app\home\controller
 * 公共控制器
 */
class Common{

    /**
     * 构造方法
     */
    public function __construct()
    {
        // 处理公共头部的分页数据
        $comHead = Db::table("category")
            ->where("pid",0)
            ->limit(4)
            ->field(["cid","cname"])
            ->get();
        View::with("comHead",$comHead);

        // 处理公共右边分类数据
        $comCate = Db::table("category")
            ->field(["cid","cname"])
            ->get();
        foreach ($comCate as $k=>$v) {
            $comCate[$k]["total"] = Db::table("article")
                ->where("category_cid",$v["cid"])
                ->where("is_recycle",0)
                ->count();
        }
        View::with("comCate",$comCate);

        // 处理公共右边标签数据
        $comTag = Db::table("tag")->get();
        View::with("comTag",$comTag);

        // 处理右边热门文章
        $hotArticle = Db::table("article")
            ->orderBy("click","desc")
            ->limit(3)
            ->get();
        View::with("hotArticle",$hotArticle);

        // 处理底部最新文章
        $newArticle = Db::table("article")
            ->where("is_recycle",0)
            ->orderBy("created_at","desc")
            ->limit(3)
            ->get();
        View::with("newArticle",$newArticle);

        // 处理友情链接
        $link = Db::table("link")->get();
        View::with("link",$link);

        // 处理公共底部网站配置
        $comWebset = Db::table("webset")->lists("value");
        View::with("comWebset",$comWebset);
    }
}
