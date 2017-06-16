<?php
class CategoryModel extends BaseModel{

    public function getSubCateByPid($pid){
        $sql="select cate_id,cate_name from bg_category where cate_pid=$pid";
        return $this->lianjie->get_List($sql);
    }



}