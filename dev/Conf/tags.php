<?php

/**
 * 行为配置定义
 * 开发者：along
 * 联系邮箱:alonglovehome@163.com
 */
$tags = array();
//应用初始化标签位
$tags['app_init'][] = 'Appframe';
//应用开始标签位
$tags['app_begin'][] = 'Appcheck';
//RABC
$tags['appframe_rbac_init'][] = 'Rbac';

return $tags;