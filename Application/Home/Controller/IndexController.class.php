<?php

class IndexController extends PlatController{

    public function indexAction(){
        // 获取一级导航
    

        // // 获取推荐文章
        $article=Factory::M('ArticleModel');
        $recommendArt=$article->getRecommendArt(5);
        $this->assign('recommendArt',$recommendArt);

        // 站点主人
        $master=Factory::M('MasterModel');
        $masterInfo=$master->getMasterInfo();
        $this->assign('masterInfo',$masterInfo);

        // 最热文章
        $newArt=$article->getNewArt(8);
        $this->assign('newArt',$newArt);
        $rmdArtByHits=$article->getRmdArtByHits(8);
        $this->assign('rmdArtByHits',$rmdArtByHits);



        $this->display('index.html');

    }


    





}



