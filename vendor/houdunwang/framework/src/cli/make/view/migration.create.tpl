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
		Schema::create( '{{TABLE}}', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->timestamps();
        });
    }

    //回滚
    public function down() {
        Schema::drop( '{{TABLE}}' );
    }
}