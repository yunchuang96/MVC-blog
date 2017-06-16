<?php

/**
 * 站长管理控制器
 */
class MasterController extends PlatController {
    /**
     * 显示站长信息
     */
    public function indexAction() {
        // 调用模型
        $master = Factory::M('MasterModel');
        $masterInfo = $master->getMasterInfo();
        // 分配变量
        $this->assign('masterInfo', $masterInfo);
        // 输出视图文件
        $this->display('index.html');
    }
    /**
     * 更新站长信息
     */
    public function editAction() {
        // 接收表单数据
        $masterInfo = array();
        $masterInfo['nickname'] = $this->escapeData($_POST['nickname']);
        $masterInfo['job'] = $this->escapeData($_POST['job']);
        $masterInfo['home'] = $this->escapeData($_POST['home']);
        $masterInfo['tel'] = $this->escapeData($_POST['tel']);
        $masterInfo['email'] = $this->escapeData($_POST['email']);
        // 验证数据
        if(empty($masterInfo['nickname'])) {
            $this->xiaoxi('请填写网名!','index.php?p=Back&c=Master&a=index');
        }
        // 调用模型,更新
        $master =  Factory::M('MasterModel');
        $result = $master->updateMasterInfo($masterInfo);
        if($result) {
            $this->xiaoxi('更改成功!','index.php?p=Back&c=Master&a=index');
        }else {
            $this->xiaoxi('发生未知错误,更改失败!','index.php?p=Back&c=Master&a=index');
        }
    }
}