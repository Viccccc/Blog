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

class Content extends Common {

    //动作
    public function index(){
        $aid = Q("get.aid");

        //处理点击次数+1
        Db::table("article")->where("aid", $aid)->increment("click", 1);

        /**
         * 处理文章详情页数据
         */
        //文章表和文章数据表关联 类似于后台编辑里的获取旧数据
        $data = Db::table("article")
            ->join("article_data", "article.aid", "=", "article_data.article_aid")
            ->where("aid", $aid)
            ->first();
        //关联上文章标签表和标签表
        $data["tag"] = Db::table("article_tag")
            ->join("tag", "article_tag.tag_tid", "=", "tag.tid")
            ->where("article_aid", $aid)
            ->field(["tid", "tname"])
            ->get();
        // 获得文章的评论
        $data["message"] = Db::table("article")
            ->join("article_comment","article.aid","=","article_comment.article_aid")
            ->where("article_aid",$aid)
            ->field(["username","user_message","message_time"])
            ->get();
        // 获得文章评论的条数
        $data["message_count"] = Db::table("article")
            ->join("article_comment","article.aid","=","article_comment.article_aid")
            ->where("article_aid",$aid)
            ->count();

        $categoryData = Db::table("category")->get();

        // 获取当前文章的所在分类的pid
        $pid = Db::table("category")
            ->where("cid",$data["category_cid"])
            ->field(["pid"])
            ->first();
        // 调用获得父集的方法,获得当前文章的父集的cid
        $category = new \system\model\Category();
        $father = $category->getFather($categoryData,$pid["pid"]);
        // 将获得的父集进行倒序
        for ($i=0; $i<count($father)-1; $i++) {
            for ($j=0; $j<count($father)-1-$i; $j++) {
                if ($father[$j] > $father[$j+1]) {
                    $temp =  $father[$j];
                    $father[$j] = $father[$j+1];
                    $father[$j+1] = $temp;
                }
            }
        }
        // 根据获得的父集的cid获得其cname
        foreach ($father as $k=>$v) {
            static $fatherName = [];
            $fatherName[] = Db::table("category")
                ->where("cid",$v)
                ->pluck("cname");
        }
        // 获得当前的cname
        $cate = Db::table("category")
            ->where("cid",$data["category_cid"])
            ->pluck("cname");
        View::with("cate",$cate);

        View::with("fatherName",$fatherName);

        View::with("data", $data);

        return view();
    }

    public function addComment(){
        $model = new \system\model\Article_comment();
        $model->addMessage();
    }
}
