<?php

/**
 * bg_master表操作模型
 */
class MasterModel extends BaseModel {
    /**
     * 获取站长信息
     */
    public function getMasterInfo() {
        $sql = "select * from bg_master limit 1";
        return $this->lianjie->get_Row($sql);
    }
    /**
     * 更新站长信息
     */
    public function updateMasterInfo($masterInfo) {
        extract($masterInfo);
        $sql = "update bg_master set nickname='$nickname', job='$job', tel='$tel', home='$home',email='$email'";
        return $this->lianjie->exec($sql);
    }
}