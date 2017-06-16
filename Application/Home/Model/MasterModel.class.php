<?php



class MasterModel extends BaseModel{

    public function getMasterInfo(){
        $sql="select * from bg_master limit 1";
        return $this->lianjie->get_Row($sql);
    }



}