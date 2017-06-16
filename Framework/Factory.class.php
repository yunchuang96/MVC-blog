<?php

  // 单例工厂模式  
 class Factory{

            // new model $class_name可变模型
        public static function M($class_name){

            static $model_list=[];

            if(!isset($model_list[$class_name]))
            {
                $model_list[$class_name]=new $class_name;   
            }

            return $model_list[$class_name];
        }

 }