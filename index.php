<?php
/**
 * 项目入口文件
 * 开发者：along
 * 联系邮箱:alonglovehome@163.com
 */

define("APP_DEBUG", true);      //开启调试模式
define('SITE_PATH', getcwd());  
define('APP_NAME', 'dev');      
define('APP_PATH', SITE_PATH . '/dev/');
define("MODE_NAME", APP_NAME);
define('MODE_PATH', APP_PATH . 'Lib/Mode/');
define("RUNTIME_PATH", SITE_PATH . "/#runtime/");
define('TEMPLATE_PATH', APP_PATH . 'Template/');
//大小写忽略处理
foreach (array("g", "m") as $v) {
    if (isset($_GET[$v])) {
        $_GET[$v] = ucwords($_GET[$v]);   //ucwords() 函数把字符串中每个单词的首字符转换为大写
    }
}
//载入框架核心文件
require APP_PATH . 'Core/ThinkPHP.php';
?>
