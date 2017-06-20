<?php
/** .-------------------------------------------------------------------
* |    Author: 熊伟洋 <chelious@foxmail.com>
* |    WeChat: hello_McGrady
* |    	   QQ: 434493420
* |     Motto: Hungry & Humble
* |---------------------------------------------------------------------
* |    Copyright (c) 2012-2020, www.chelious.com. All Rights Reserved.
* '-------------------------------------------------------------------*/
use hdphp\database\Migration;
use hdphp\database\Blueprint;
class {{className}} extends Migration {
    //执行
	public function up() {
		Schema::table( '{{TABLE}}', function ( Blueprint $table ) {
			//$table->string('name', 50)->change();
        });
    }

    //回滚
    public function down() {

    }
}