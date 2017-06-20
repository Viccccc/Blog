<?php
Route::get('/foo', 'home/entry/add');

//首页
Route::get('/entry', 'home/entry/index');

// 关于
Route::get('/about', 'home/about/index');

// 联系我
Route::get('/contact', 'home/contact/index');

//文章
Route::get('/arc_{aid}.html', 'home/content/index');

//分类
Route::get('/cate_{cid}.html', 'home/lists/index');

//标签
Route::get('/tag_{tid}.html', 'home/lists/index');

?>