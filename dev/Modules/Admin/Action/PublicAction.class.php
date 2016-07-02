<?php
/**
 *后台登录验证
 * 开发者：along
 * 联系邮箱:alonglovehome@163.com
 */
class PublicAction extends AdminbaseAction {

    function _initialize() {
        parent::_initialize();
        $blacklist = F("Blacklist_ip");
        $ip = get_client_ip();
        $blackinfo = $blacklist[$ip];
        if ($blackinfo) {
            if ($blackinfo['numbe'] >= 5 && ((int) $blackinfo['time'] + 60 * 15) > time()) {
                $this->error("你已经被限制登陆15分钟！", CONFIG_SITEURL);
            }
        }
    }

    //后台登陆界面
    public function login() {
        $this->display();
    }

    //后台登陆验证
    public function tologin() {
        $blacklist = F("Blacklist_ip");
        //记录登陆失败者IP
        $ip = get_client_ip();
        $username = I("post.username","","trim");
        $password = I("post.password","","trim");
        $code = I("post.code","","trim");
        if (empty($username) || empty($password)) {
            $this->error("用户名或者密码不能为空，请从新输入！", U("Public/login"));
        }
        if (empty($code)) {
            $this->error("请输入验证码！", U("Public/login"));
        }
        //验证码开始验证
        if (!$this->verify($code)) {
            $this->error("验证码错误，请重新输入！", U("Public/login"));
        }
        if (service("PassportAdmin")->loginAdmin($username, $password)) {
            $forward = cookie("forward");
            if (!$forward) {
                $forward = U("Admin/Index/index");
            } else {
                cookie("forward", NULL);
            }

            try {
                unset($blacklist[$ip]);
                F("Blacklist_ip", $blacklist);
            } catch (Exception $exc) {
                
            }

            $this->success("登陆成功！", $forward);
        } else {
            if (!$blacklist) {
                $blacklist = array();
            }
            $numbe = 1;
            $blacklist[$ip] = array(
                "time" => time(),
                "numbe" => (int) $blacklist[$ip]['numbe'] + 1,
            );
            F("Blacklist_ip", $blacklist);
            $this->error("用户名或者密码错误，登陆失败！", U("Public/login"));
        }
    }

    //退出登陆
    public function logout() {
        if (service("PassportAdmin")->logoutLocalAdmin()) {
            $this->success('登出成功！',U("Admin/Public/login"));
        }
    }



}

