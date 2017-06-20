<?php namespace app\home\controller;


/**
 * Class Entry
 * @package app\home\controller
 * 前台首页控制器
 */
class Entry extends Common {
	public function index() {
	    // 处理title
        $conf = ["title"=>"CheliOus教学博客-首页"];
        View::with("conf",$conf);

        /**
         * 处理文章数据
         */
        // 处理文章表
        $data = Db::table("article")
            ->where("is_recycle",0)
            ->orderBy("created_at","desc")
            ->paginate(3);
        $page = $data->links();
        $data = $data->toArray();
        // 关联分类表
        foreach ($data as $k=>$v) {
            $data[$k]["cname"] = Db::table("category")
                ->where("cid",$v["category_cid"])
                ->pluck("cname");
        }
        // 给$data加上对应的标签
        foreach ($data as $k=>$v) {
            $data[$k]["tag"] = Db::table("article_tag")
                ->join("tag","article_tag.tag_tid","=","tag.tid")
                ->where("article_tag.article_aid",$v["aid"])
                ->field(["tid","tname"])
                ->first();
        }

        View::with("data",$data)->with("page",$page);

		return view();
	}

}