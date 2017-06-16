<?php

    // 基础模型类
    class BaseModel{

        protected $lianjie;

        function __construct(){
            $this->initLianjie();
        }



        function initLianjie(){

            // 拿到数据库配置
            $config=$GLOBALS['conf']['db'];
            //操作数据库类
            switch($GLOBALS['conf']['App']['dbcz']){
                case 'SQLDB':
                    $sql_class='SQLDB';
                    break;
                case 'PDODB':
                    $sql_class='PDODB';
                    break;
            }
            $this->lianjie=$sql_class::getDb($config);
        }






    }


