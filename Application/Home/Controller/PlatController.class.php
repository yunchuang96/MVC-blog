<?php

class PlatController extends BaseController{

    // 构造方法
    public function __construct(){
        // 调用父类的构造方法
        parent::__construct();
        $this->initFirstCateInfo();

    }


    public function initFirstCateInfo(){
        $index_obj=Factory::M('IndexModel');
        $first_cate=$index_obj->getFirstCate();
        $this->assign('first_cate',$first_cate);


    }


    public function initVars(){
        $title = "云窗个人博客";
        $keywords = "PHP成长之路";
        $description = "云窗个人博客";
        // 分配变量
        $this->assign('title', $title);
        $this->assign('keywords', $keywords);
        $this->assign('description', $description);
    }









}