<?php

/**
 * 应用开始处理
 * 开发者：along
 * 联系邮箱:alonglovehome@163.com
 */
class AppcheckBehavior extends Behavior {

    public function run(&$params) {
        //产品版本号
        define("LONG_VERSION", C("LONG_VERSION"));
        //产品流水号
        define("LONG_BUILD", C("LONG_BUILD"));
        //产品名称
        define("LONG_APPNAME", C("LONG_APPNAME"));
        //版权所有
        define("LONG_NAME", C("LONG_NAME"));
        //有效应用
        $App = F("App");
        //后台模块比较特殊，可以指定域名访问，其他模块不需要经过此步骤
        if ('Admin' == GROUP_NAME && $App['Domains']) {
            //网站配置缓存
            $Config = F("Config");
            //当前域名
            $http_host = strtolower($_SERVER['HTTP_HOST']);
            //域名绑定模块缓存
            $Module_Domains_list = F("Module_Domains_list");
            if (false == $Module_Domains_list) {
                try {
                    D("Domains")->domains_cache();
                    $Module_Domains_list = F("Module_Domains_list");
                } catch (Exception $exc) {
                    if (C('LOG_RECORD')) {
                        Log::write("缓存：Module_Domains_list 加载失败！");
                    }
                }
            }
            if ((int) $Config['domainaccess']) {
                $domain = explode("|", $Module_Domains_list["Admin"]);
                if ($Module_Domains_list["Admin"] && !in_array($http_host, $domain)) {
                    //后台不是用指定域名访问，直接404！
                    send_http_status(404);
                    exit;
                }
            }
        }
        //判断当前访问的模块是否在已安装模块列表中
        if (!in_array(GROUP_NAME, $App)) {
            $msg = L('_MODULE_NOT_EXIST_') . MODULE_NAME . "，该模块未进行安装！";
            if (APP_DEBUG) {
                // 模块不存在 抛出异常
                throw_exception($msg);
            } else {
                if (C('LOG_RECORD')) {
                    Log::write($msg . "URL：" . get_url());
                }
                send_http_status(404);
                exit;
            }
        }
    }

}

?>
