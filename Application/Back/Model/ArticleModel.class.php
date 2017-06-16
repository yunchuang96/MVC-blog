<?php

class ArticleModel extends BaseModel{

    function art_list($page){
        $pagenum=$GLOBALS['conf']['Page']['pagenum'];
        $offset=($page-1)*$pagenum;
        $sql="select a.*,c.cate_name from bg_article as a,bg_category as c where a.cate_id=c.cate_id and is_del='0' order by addtime desc limit {$offset},{$pagenum}";
        $res=$this->lianjie->get_List($sql);
        return $res;
    }


    function addArticle($arr){
        $addtime=time();
        extract($arr);
        $sql="insert into bg_article ";
        $sql.="(cate_id,title,art_desc,content,author,addtime,thumb) ";
        $sql.="values ($cate_id,'{$title}','{$art_desc}','{$content}','{$author}',$addtime,'{$thumb}')";
        // echo $sql;
        // exit;
        $res=$this->lianjie->exec($sql);
        return $res;
    }


    function getArtinfo($id){
        $sql="select * from bg_article where art_id=$id";
        $res=$this->lianjie->get_List($sql);
        return $res;
    }

    function updateArt($arr){
        extract($arr);

        // echo $thumb;
        // exit;
        $sql="update bg_article set cate_id=$cate_id,title='{$title}',art_desc='{$art_desc}',content='{$content}',thumb='{$thumb}',author='{$author}' where art_id=$art_id";
    // echo $sql;
    // exit;
        $res=$this->lianjie->exec($sql);
        return $res;
    }


    function delArtById($id){
        $sql="update bg_article set is_del='1' where art_id=$id";
        $res=$this->lianjie->exec($sql);
        return $res;
    }

    function delAllArt($ids){
        $sql="update bg_article set is_del='1' where art_id in($ids)";
        $res=$this->lianjie->query($sql);
        return $res;
    }



    function getDelArt($page){
        $pagenum=$GLOBALS['conf']['Page']['pagenum'];
        $offset=($page-1)*$pagenum;
        $sql="select a.*,c.cate_name from bg_article as a,bg_category as c where a.cate_id=c.cate_id and is_del='1' order by addtime desc limit {$offset},{$pagenum}";
        $res=$this->lianjie->get_List($sql);
        return $res;
    }


    function realDelById($id){
        $sql="delete from bg_article where art_id=$id";
        $res=$this->lianjie->exec($sql);
        return $res;
    }


    function realAllArt($ids){
        $sql="delete from bg_article where art_id in($ids)";
        $res=$this->lianjie->query($sql);
        return $res;
    }


    function restoreArtById($id){
        $sql="update bg_article set is_del='0' where art_id =$id";
        $res=$this->lianjie->exec($sql);
        return $res;
    }

    function getCount(){
        $sql="select count(*) from bg_article where is_del='0' ";
        $res=$this->lianjie->get_One($sql);
        return $res;
    }


    function getDelCount(){
        $sql="select count(*) from bg_article where is_del='1' ";
        $res=$this->lianjie->get_One($sql);
        return $res;
    }


   /**
     * 切换文章推荐状态
     */
    public function updateRecommendById($art_id, $is_recommend) {
        if($is_recommend == '0') {
            $is_recommend = '1';
        }else {
            $is_recommend = '0';
        }
        $sql = "update bg_article set is_recommend = '$is_recommend' where art_id=$art_id";
        return $this->lianjie->exec($sql);
    }




}