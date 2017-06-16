<?php



class IndexModel extends BaseModel{

    public function getFirstCate(){
        $sql="select * from bg_category where cate_pid=0 order by cate_sort limit 5";
        $first_cate=$this->lianjie->get_List($sql);
        return $first_cate;
    }




}