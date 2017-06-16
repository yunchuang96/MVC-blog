<?php

class platController extends BaseController{

    public function __construct(){
            // 先调用父类的构造方法
            parent::__construct();
            // 检查是否翻墙
            $this->checkLogin();
    }


    protected function checkLogin(){
            // 不需要验证的动作数组
        $no_check=[
            // 控制器    该控制器下动作（方法)
            'Admin'=>['login','check','code']

            ];

        if(isset($no_check[CONTRO])&&in_array(ACTION,$no_check[CONTRO])){
            // 当前控制下的当前方法不需要验证
            return ;
        }

        @session_start();
        // 检查是否登录
        if(!isset($_SESSION['adminInfo'])){
            $this->xiaoxi('请你先登录','index.php?p=Back&c=Admin');
        }


    }

}