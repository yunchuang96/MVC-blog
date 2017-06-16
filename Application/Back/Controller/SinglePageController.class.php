<?php

/**
 * 后台单页管理控制器
 */
class SinglePageController extends PlatController {
    /**
     * 单页管理首页动作
     */
    public function indexAction() {
        // 需要提取所有的页面信息
        // 调用模型
        $singlePage = Factory::M('SinglePageModel');
        $pageInfo = $singlePage->getSinglePage();
        // 分配变量
        $this->assign('pageInfo', $pageInfo);
        // 输出视图文件
        $this->display('index.html');
    }
    /**
     * 显示添加单页表单的动作
     */
    public function addAction() {
        $this->display('add.html');
    }
    /**
     * 处理单页面提交的数据
     */
    public function dealAddAction() {
        // 接收表单
        $pageInfo = array();
        $pageInfo['title'] = $this->escapeData($_POST['title']);
        $pageInfo['content'] = addslashes($_POST['content']);
        // 判断数据的合法性
        if(empty($pageInfo['title']) || empty($pageInfo['content'])) {
            $this->xiaoxi( '您填写的信息不完整!','index.php?p=Back&c=SinglePage&a=add');
        }
        // 调用模型,数据入库
        $singlePage = Factory::M('SinglePageModel');
        $result = $singlePage->insertPage($pageInfo);
        if($result) {
            $this->xiaoxi('添加成功','index.php?p=Back&c=SinglePage&a=index');
        }else {
            $this->xiaoxi( '发生未知错误!添加失败!','index.php?p=Back&c=SinglePage&a=add');
        }
    }



    public function delAction(){
              // 调用模型,
        $page_id=$_GET['page_id'];
        $singlePage = Factory::M('SinglePageModel');
        $result = $singlePage->delPage($page_id);
        if($result){
               $this->xiaoxi('删除成功','index.php?p=Back&c=SinglePage&a=index');
        }else{
               $this->xiaoxi('发生未知错误','index.php?p=Back&c=SinglePage&a=index');
        }

    }





}