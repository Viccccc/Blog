<?php if(!defined('ROOT_PATH'))exit;
return array (
  'aid' => 
  array (
    'field' => 'aid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'title' => 
  array (
    'field' => 'title',
    'type' => 'char(150)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'click' => 
  array (
    'field' => 'click',
    'type' => 'mediumint(8) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'created_at' => 
  array (
    'field' => 'created_at',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'updated_at' => 
  array (
    'field' => 'updated_at',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'thumb' => 
  array (
    'field' => 'thumb',
    'type' => 'varchar(255)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'digest' => 
  array (
    'field' => 'digest',
    'type' => 'varchar(255)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'author' => 
  array (
    'field' => 'author',
    'type' => 'varchar(20)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'keywords' => 
  array (
    'field' => 'keywords',
    'type' => 'varchar(150)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'is_recycle' => 
  array (
    'field' => 'is_recycle',
    'type' => 'tinyint(3) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'user_uid' => 
  array (
    'field' => 'user_uid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'category_cid' => 
  array (
    'field' => 'category_cid',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
);
?>