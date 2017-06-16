<?php

/**
 * 后台bg_singlePage表操作模型
 */
class SinglePageModel extends BaseModel {
    /**
     * 获取所有的单页面信息
     */
    public function getSinglePage() {
        $sql = "select * from bg_singlePage order by page_id desc";
        return $this->lianjie->get_List($sql);
    }
    /**
     * 单页面入库
     */
    public function insertPage($pageInfo) {
        extract($pageInfo);
        // 入库
        $sql = "insert into bg_singlePage values(null, '$title', '$content')";
        return $this->lianjie->exec($sql);
    }


    public function delPage($page_id){
        $sql="delete from bg_singlePage where page_id=$page_id";
        return $this->lianjie->exec($sql);
    }
}