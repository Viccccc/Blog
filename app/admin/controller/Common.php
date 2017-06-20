<?php

namespace app\admin\controller;

/**
 * Class Common
 * @package app\admin\controller
 * 公共控制器
 */
class Common{
    /**
     * 构造方法,判断用户是否登录,也就是是否存在session
     */
    public function __construct()
    {
        if (!$_SESSION["admin"]) {
            go(u("admin.user.login"));
        }
    }
}
