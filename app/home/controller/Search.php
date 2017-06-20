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
 * Class Search
 * @package app\home\controller
 * 搜索控制器
 */
class Search extends Common {

    public function index(){
        // 搜索的得到的信息
        $searchBox = Q("post.searchBox");
        View::with("searchBox",$searchBox);
        $searchValue = Db::query("select * from article where title like ?",["%$searchBox%"]);

        View::with("searchValue",$searchValue);

        return view();
    }
}
