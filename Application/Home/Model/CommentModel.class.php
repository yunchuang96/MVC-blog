<?php

/**
 * bg_comment表操作模型
 */

class CommentModel extends BaseModel {
    /**
     * 添加评论功能
     */
    public function insertComment($cmtInfo) {
        extract($cmtInfo);
        $sql = "insert into bg_comment values(null, $art_id, '$cmt_user', '$cmt_content', $cmt_time)";
        return $this->lianjie->exec($sql);
    }
    /**
     * 根据文章id号获取当前总评论数
     */
    public function getRowCountById($art_id) {
        $sql = "select count(*) from bg_comment where art_id=$art_id";
        return $this->lianjie->get_One($sql);
    }
    /**
     * 根据文章id号获取当前页所有评论信息
     */
    public function getCmtInfosById($art_id, $rowsPerPage) {
        $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
        $offset = ($pageNum - 1) * $rowsPerPage;
        $sql="select * from bg_comment where art_id=$art_id order by cmt_time asc limit $offset, $rowsPerPage"; 
        return $this->lianjie->get_List($sql);
    }
}