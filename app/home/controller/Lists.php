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

/**
 * Class Lists
 * @package app\home\controller
 * 前台列表控制器
 */
class Lists extends Common {

    public function index(){

        $tid = Q("get.tid");
        $cid = Q("get.cid");

        /**
         * 标签
         */
        if ($tid) {
            // 处理头部数据
            $HeadData = [
                "type"=>"标签",
                "name"=>Db::table("tag")->where("tid",$tid)->pluck("tname"),
                "total"=>Db::table("article_tag")
                    ->join("article","article_tag.article_aid","=","article.aid")
                    ->where("tag_tid",$tid)
                    ->where("is_recycle",0)
                    ->count()
            ];
            // 处理文章数据
            $ArticleData = Db::table("article")
                    ->join("category","article.category_cid","=","category.cid")
                    ->join("article_tag","article.aid","=","article_tag.article_aid")
                    ->where("tag_tid",$tid)
                    ->where("is_recycle",0)
                    ->orderBy("created_at","desc")
                    ->paginate(3);
            $page = $ArticleData->links();
            $ArticleData = $ArticleData->toArray();
            // 加上文章对应的标签
            foreach ($ArticleData as $k=>$v) {
                $ArticleData[$k]["tag"] = Db::table("article_tag")
                    ->join("tag","article_tag.tag_tid","=","tag.tid")
                    ->where("article_aid",$v["aid"])
                    ->field(["tid","tname"])
                    ->get();
            }
        }

        /**
         * 分类
         */
        if ($cid) {
            // 递归找子集,获取自己的儿子
            $cateModel = new \system\model\Category();
            $cids = $cateModel->getSon(Db::table("category")->get(), $cid);
            // 追加自己
            $cids[] = $cid;

            // 处理头部数据
            $HeadData = [
                "type" => "分类",
                "name" => Db::table("category")->where("cid", $cid)->pluck("cname"),
                "total" => Db::table("article")
                    ->whereIn("category_cid", $cids)
                    ->where("is_recycle", 0)
                    ->count()
            ];
            // 处理文章数据
            $ArticleData = Db::table("article")
                ->join("category", "article.category_cid", "=", "category.cid")
                ->whereIn("category_cid", $cids)
                ->where("is_recycle", 0)
                ->orderBy("created_at", "desc")
                ->paginate(3);
            $page = $ArticleData->links();
            $ArticleData = $ArticleData->toArray();
            // 加上文章对应的标签
            foreach ($ArticleData as $k => $v) {
                $ArticleData[$k]["tag"] = Db::table("article_tag")
                    ->join("tag", "article_tag.tag_tid", "=", "tag.tid")
                    ->where("article_aid", $v["aid"])
                    ->field(["tid", "tname"])
                    ->get();
            }
        }


        // 分配变量
        View::with("HeadData",$HeadData);
        View::with("ArticleData",$ArticleData)->with("page",$page);

        return view();
    }
}
