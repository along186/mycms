<?php
/*
 * 自定义运行模式
 * 开发者：along
 * 联系邮箱:alonglovehome@163.com
 * */
$version = include SITE_PATH . '/dev/Conf/version.php';
$version = $version?$version:array();
$dataconfig = include SITE_PATH . '/dev/Conf/dataconfig.php';
$dataconfig = $dataconfig?$dataconfig:array();
$addition = include SITE_PATH . '/dev/Conf/addition.php';
$addition = $addition?$addition:array();
$IIT = array(
    'core' => array(
        LIB_PATH . 'Mode/dev/functions.php', // 标准模式函数库
        CORE_PATH . 'Core/Log.class.php', // 日志处理类
        LIB_PATH . 'Mode/dev/Dispatcher.class.php', // URL调度类
        CORE_PATH . 'Core/App.class.php', // 应用程序类
        CORE_PATH . 'Core/Action.class.php', // 控制器类
        CORE_PATH . 'Core/View.class.php', // 视图类
    ),
    'config' => array_merge($version, $addition, $dataconfig),
);
return $IIT;
