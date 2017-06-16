<?php


class Frame{

    public static function start(){

        // 定义基础目录常量的方法
        static::initConst(); 
        // 定义配置信息
        static::initConfig();
        // 前端分发器,确定分发参数
        static::initDisPar();
        //定义当前平台相关的目录
        static::initPlatConst();
        //自动加载类
        static::initAutoload();
        //分发器
        static::initDis();
        //取得默认配置
        static::initConfig();
    }

     // 定义基础目录常量的方法
    private static function initConst(){

        define('DS',DIRECTORY_SEPARATOR);  //分隔符
        define('ROOT',getCwd().DS);
        // echo ROOT;
           //index 所在路径
        // application路径
        define('APPLICATION',ROOT.'Application'.DS);
        // echo APPLICATION;
        // framework路径
        define('FRAMEWORK',ROOT.'Framework'.DS);
        // config路径
        define('CONFIG',APPLICATION.'Config'.DS);
        //sql目录
        define('DBCZ',FRAMEWORK.'Dbcz'.DS);
        //插件目录
        define('TOOLS',ROOT.'Tools'.DS);
        //smarty目录
        define('SMARTY',TOOLS.'smarty'.DS); 
        //Web目录
        define('WEB',ROOT.'Web'.DS);
        //uploads目录  用户上传目录
        define('UPLOADS',ROOT.'Uploads'.DS);


    }

        // 前端分发器,确定分发参数
     private static function  initDisPar(){
       
        // 拿到默认配置plat，确认平台分发器
        $d_plat=$GLOBALS['conf']['App']['default_plat'];
        // echo $d_plat;
        $plat=isset($_GET['p'])?$_GET['p']:$d_plat;
        define('PLAT',$plat);
        // 拿到默认配置controller，确认控制器分发器
        // 
        $d_contro=$GLOBALS['conf'][PLAT]['default_controller'];
        $controller=isset($_GET['c'])?$_GET['c']:$d_contro;

        define('CONTRO',$controller);
        // 拿到默认配置action，确认方法分发器
        $d_action=$GLOBALS['conf'][PLAT]['default_action'];

        $action=isset($_GET['a'])?$_GET['a']:$d_action;
        define('ACTION',$action);
    }

        //定义当前平台相关的目录
    private static function initPlatConst(){
       
        //当前目录所在路径
        define('PLAT_PATH',ROOT.'Application'.DS.PLAT.DS);
        //当前平台控制器路径
        define('CONTRO_PATH',PLAT_PATH."Controller".DS); 
        //当前平台模型路径
        define('MODEL_PATH',PLAT_PATH."Model".DS);
        //当前平台视图路径
        define('VIEW_PATH',PLAT_PATH."VIEW".DS);
        //CSS,JS,IMAGES
        // 以下的三个目录常量只能用相对路径,绝对路径暴露信息
        define('CSS_PATH', './Web/' . PLAT . '/css/');
        define('JS_PATH', './Web/' . PLAT . '/js/');
      
        define('IMAGES_PATH', './Web/' . PLAT . '/images/');
    }

      //自动加载类
     private static   function  autoload($name){
            // $arr=['BaseController','BaseModel','Factory'];
            // $dbcz=['SQLDB','PDODB','I_DB'];
            // echo $name;
            $class_name_list=[
            'BaseController' =>FRAMEWORK.$name.'.class.php',
            'BaseModel'=>FRAMEWORK.$name.'.class.php',
            'Factory'=>FRAMEWORK.$name.'.class.php',
            'SQLDB'=>DBCZ.$name.'.class.php',
            'PDODB'=>DBCZ.$name.'.class.php',
            'I_DB'=>DBCZ.$name.'.interface.php',
            'Smarty'=>SMARTY.$name.'.class.php',
            'Code'=>TOOLS.$name.'.class.php',
            'Upload'=>FRAMEWORK.$name.'.class.php',
            'Page'=>FRAMEWORK.$name.'.class.php'
            ];

            if(isset($class_name_list[$name])){
                require $class_name_list[$name];
            }elseif(substr($name,-10)=='Controller'){
                require CONTRO_PATH.$name.'.class.php';
            }elseif(substr($name,-5)=='Model'){
                // echo MODEL_PATH.$name;
                // exit;
                require MODEL_PATH.$name.'.class.php';
            }
        }
    

     //分发器
     private static function  initDis(){

        // 拼接控制器 实例化控制器
        $controller=CONTRO.'Controller';
        $c_obj=new $controller;
        

        // 拼接动作,调用方法
        $action=ACTION.'Action';
        $c_obj->$action();
    }


    private static function initAutoload() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    //配置文件
    private static function initConfig(){
        // 配置文件存储在超全局变量中供所有页面使用
        $GLOBALS['conf']=include CONFIG.'config.php';
    }




}
