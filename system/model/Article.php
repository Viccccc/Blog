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

class Article extends Model{
	//数据表
	protected $table = "article";

	//允许填充字段
	protected $allowFill = [ ];

	//禁止填充字段
	protected $denyFill = [ ];

	//完整表名
	protected $full = false;

	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]
        ['title','required','标题不能为空',3,3],
        ['author','required','文章作者不能为空',3,3],
        ['thumb','required','缩略图不能为空',3,3],
        ['digest','required','摘要不能为空',3,3],
        ['category_cid','required','分类不能为空',3,3],
	];

	//自动完成
	protected $auto=[
		//['字段名','处理方法','方法类型',验证条件,验证时机]
//        ['sendtime','time','function',3,1],
//        ['updatetime','time','function',3,2]
	];

	//自动过滤
    protected $filter=[
        //[表单字段名,过滤条件,处理时间]
    ];

	//时间操作,需要表中存在created_at,updated_at字段
	protected $timestamps=true;

	public function add () {
        //3.文章数据表服务验证
        Validate::make([
            [ 'keywords', 'required', '关键词不能为空',3],
            [ 'des', 'required', '文章描述不能为空',3],
            [ 'content', 'required', '文章内容不能为空',3]
        ]);

        //5.文章标签表服务验证
        Validate::make([
            [ 'tag_tid', 'required', '标签不能为空',3],
        ]);

        //1.添加文章表
        $article = new Article();
        $article['title'] = Q('post.title');
        $article['author'] = Q('post.author');
        $article['thumb'] = Q('post.thumb');
        $article['digest'] = Q('post.digest');
        $article['user_uid'] = $_SESSION['admin']['uid'];
        $article['category_cid'] = Q('post.category_cid');
        $aid = $article->save();

        //2.添加文章数据表
        $articleData = new \system\model\Article_data();
        $articleData['keywords'] = Q('post.keywords');
        $articleData['des'] = Q('post.des');
        $articleData['content'] = Q('post.content');
        $articleData['article_aid'] = $aid;
        $articleData->save();

        //4.添加文章标签表
        $tagDatas = Q('post.tag_tid');
        $articleTag = new \system\model\Article_tag();
        foreach ($tagDatas as $v){
            $articleTag['article_aid'] = $aid;
            $articleTag['tag_tid'] = $v;
            $articleTag->save();
        }
        return true;
    }

    /**
     * 编辑
     */
    public function edit () {

        $aid = Q("get.aid");
        // 操作article表
        $article = Article::find($aid);
        $article['title'] = Q('post.title');
        $article['author'] = Q('post.author');
        $article['thumb'] = Q('post.thumb');
        $article['digest'] = Q('post.digest');
        $article['user_uid'] = $_SESSION['admin']['uid'];
        $article['category_cid'] = Q('post.category_cid');
        $article->save();
        // 操作article_data表
        $articleData = new \system\model\Article_data();
        $data = [
            "keywords"=>Q("post.keywords"),
            "des"=>Q("post.des"),
            "content"=>Q("post.content")
        ];
        $articleData->where("article_aid",$aid)->update($data);
        // 操作article_tag表(先删后添)
        $articleTag = new \system\model\Article_tag();
        $articleTag->where("article_aid",$aid)->delete();
        $tagDatas = Q('post.tag_tid');
        $articleTag = new \system\model\Article_tag();
        foreach ($tagDatas as $v){
            $articleTag['article_aid'] = $aid;
            $articleTag['tag_tid'] = $v;
            $articleTag->save();
        }
        return true;
    }
}
?>