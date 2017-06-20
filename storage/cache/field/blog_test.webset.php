<?php if(!defined('ROOT_PATH'))exit;
return array (
  'wid' => 
  array (
    'field' => 'wid',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'wname' => 
  array (
    'field' => 'wname',
    'type' => 'varchar(45)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'wvalue' => 
  array (
    'field' => 'wvalue',
    'type' => 'varchar(100)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'wdes' => 
  array (
    'field' => 'wdes',
    'type' => 'varchar(50)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'wtitle' => 
  array (
    'field' => 'wtitle',
    'type' => 'varchar(255)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'type_id' => 
  array (
    'field' => 'type_id',
    'type' => 'tinyint(3) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
);
?>