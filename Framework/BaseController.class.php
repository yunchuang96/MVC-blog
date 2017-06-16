<?php

class BaseController{

        protected $smarty;

        function xiaoxi($msg,$url)
        {
           echo "<script>alert('{$msg}！！');location.href='{$url}';</script>";
        }



       public function __construct(){
            header("Content-type:text/html;charset=utf-8");
            session_start();
            $this->initSmarty();
        }

        protected  function initSmarty(){
            $this->smarty=new Smarty;
            // 设置模板路径
            $this->smarty->setTemplateDir(VIEW_PATH.CONTRO.DS);
            // 设置文件编译路径
            $this->smarty->setCompileDir(PLAT_PATH.'View_c'.DS.CONTRO.DS);
        }


        protected function assign($name,$val){
            $this->smarty->assign($name,$val);
        } 

        protected function display($tpl){
            $this->smarty->display($tpl);
        }

        // 对数据进行过滤
        protected function escapeData($data){
            return addslashes(strip_tags(trim($data)));
        }


}



