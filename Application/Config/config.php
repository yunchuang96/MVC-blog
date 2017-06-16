<?php


return array(
    // 数据库信息组
    'db' =>array(
                "host"=>'localhost',
                "user"=>'root',
                "pass"=>'',
                "dbname"=>'blog',
                "charset"=>'utf8'
            ),
    // 应用组
    'App'=>array(
            'default_plat'=>'Home',
            'dbcz'=>'SQLDB'//或者PDODB
        ),
    // 前台组
    'Home'=>array(
            'default_controller'=>'Index',
            'default_action'=>'index'
        ),
    // 后台组
    'Back'=>array(
            'default_controller'=>'Admin',
            'default_action'=>'login'
        ),
    //验证码组
    'Code'=>array(
            'width'=>80,
            'height'=>32,
            'pixelnum'=>0.03, //干扰点密度
            'linenum'=>5,    //干扰线数量
            'stringnum'=>4,
        ),
    //分页组
    'Page'=>array(
            'pagenum'=>5,    //一页数量
            'displaymaxnum'=>5 //显示的最多页码数
        )
    );