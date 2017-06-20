<?php if(!defined('ROOT_PATH'))exit;
return array (
  'article_aid' => 
  array (
    'field' => 'article_aid',
    'type' => 'int(11)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'username' => 
  array (
    'field' => 'username',
    'type' => 'char(20)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'user_message' => 
  array (
    'field' => 'user_message',
    'type' => 'varchar(120)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'message_time' => 
  array (
    'field' => 'message_time',
    'type' => 'int(11)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>