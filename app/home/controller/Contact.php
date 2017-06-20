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

class Contact extends Common {
    //动作
    public function index(){
        if (IS_POST) {
            $model = new \system\model\Contact();
            $model->add();
        }
        return view();
    }
}
