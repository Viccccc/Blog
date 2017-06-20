<?php

namespace app\admin\controller;
use hdphp\view\View;
use system\model\Article_data;
use system\model\Article_tag;

/**
 * Class Article
 * @package app\admin\controller
 * 文章管理控制器
 */
class Article extends Common {
    private $model;
    /**
     * 构造方法 实例化模型
     */
    public function __construct()
    {
        $this->model = new \system\model\Article();
        parent::__construct();
    }

    /**
     * 首页
     */
    public function index()
    {
        // 获取数据并分页
        $data = Db::table('article')->where('is_recycle',0)->paginate(8);
        $page = $data->links();
        $data = $data->toArray();
        foreach ($data as $k=>$v){
            $data[$k]['cname'] = Db::table('category')->where('cid',$v['category_cid'])->pluck('cname');
        }
        View::with('page',$page);
        View::with('data',$data);

        // 载入模板
        return view();
    }

    /**
     * 添加
     */
    public function add () {
        // 处理所属分类
        $categoryData = Data::tree(Db::table("category")->get(),"cname");
        View::with("categoryData",$categoryData);
        // 处理标签
        $tagData = Db::table("tag")->get();
        View::with("tagData",$tagData);
        // 添加
        if(IS_POST){
            if($this->model->add()){
                message("添加成功",u("index"),"success");
            }else{
                message($this->model->getError(),"back","error");
            }
        }

        // 载入模板
        return view();
    }

    /**
     * 编辑
     */
    public function edit () {
        $aid = Q("get.aid");
        // 获取article表中的就数据
        $oldData = Db::table("article")->where("aid",$aid)->first();
        View::with("oldData",$oldData);
        // 获取article_data中的旧数据
        $articleData = Db::table("article_data")->where("article_aid",$aid)->first();
        View::with("articleData",$articleData);
        // 获取article_tag中的数据,也就是选中的标签
        $articleTag = Db::table("article_tag")->where("article_aid",$aid)->lists("tag_tid");
        View::with("articleTag",$articleTag);
        // 获取tag表中所有数据
        $tagData = Db::table("tag")->get();
        View::with("tagData",$tagData);
        // 获取category表中的所有数据
        $categoryData = Data::tree(Db::table("category")->get(),"cname");
        View::with("categoryData",$categoryData);
        if (IS_POST) {
            if ($this->model->edit()) {
                message("编辑成功",u("admin.article.index"),"success");
            }else{
                message($this->model->getError(),"back","error");
            }
        }
        // 载入模板
        return view();
    }

    /**
     * 回收站
     */
    public function recycle () {
        // 获取数据并分页
        $data = Db::table('article')->where('is_recycle',1)->paginate(8);
        $page = $data->links();
        $data = $data->toArray();
        foreach ($data as $k=>$v){
            // 根据cid获取分类的cname,然后再放到$data中
            $data[$k]['cname'] = Db::table('category')->where('cid',$v['category_cid'])->pluck('cname');
        }
        View::with('page',$page);
        View::with('data',$data);

        // 载入模板
        return view();
    }

    /**
     * 删除到回收站
     */
    public function delToRecycle () {
        $aid = Q("get.aid");
        $this->model->where("aid",$aid)->update(["is_recycle"=>1]);
        message("已删除至回收站",u("admin.article.recycle"),"successs");
    }

    /**
     * 还原
     */
    public function restore () {
        $aid = Q("get.aid");
        $this->model->where("aid",$aid)->update(["is_recycle"=>0]);
        message("还原成功",u("admin.article.index"),"successs");
    }

    /**
     * 彻底删除
     */
    public function del () {
        $aid = Q("get.aid");
        // 删除文章表的数据
        $this->model->where("aid",$aid)->delete();
        // 删除文章数据表中的数据
        $articleData = new \system\model\Article_data();
        $articleData->where("article_aid",$aid)->delete();
        // 删除文章标签表中的数据
        $articleTag = new \system\model\Article_tag();
        $articleTag->where("article_aid",$aid)->delete();
        message("删除成功",u("admin.article.recycle"),"successs");
    }
}
