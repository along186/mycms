<?php 
defined('UNINSTALL') or exit('Access Denied');
//删除菜单/权限数据
M("Menu")->where(array("app"=>"Cron"))->delete();
M("Access")->where(array("g" => "Cron"))->delete();
?>