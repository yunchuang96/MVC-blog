<?php


// DBZC接口
// 
interface I_DB{
    public static function getDb($config);
    public function query($sql);
    public function get_List($sql);
    public function get_Row($sql);
    public function get_One($sql);
}