<?php

/**
 * 前台bg_singlePage表操作模型
 */
class SinglePageModel extends BaseModel {
    /**
     * 根据id号获取单页面信息
     */
    public function getPageInfoById($page_id) {
        $sql = "select * from bg_singlepage where page_id=$page_id";
        // echo $sql;
        // exit;
        return $this->lianjie->get_Row($sql);
    }
}