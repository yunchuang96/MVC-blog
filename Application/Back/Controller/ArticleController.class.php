<?php

    // 文章控制器
    class ArticleController extends PlatController{

            // 文章首页动作
            function  indexAction(){
                $art_obj=Factory::M('ArticleModel');
                // 分页
                // 页数条数
                $pagenum=$GLOBALS['conf']['Page']['pagenum'];
                // 页面显示最大页码数
                $displaymaxnum=$GLOBALS['conf']['Page']['displaymaxnum'];
                // 跳转页面
                $url='index.php?p=Back&c=Article&a=index&';
                // 记录总条数
                $count=$art_obj->getCount();
                $page=new Page($pagenum,$displaymaxnum,$count,$url);
                // 提取分页字符串
                $pagestr=$page->getPage();
                $pageconfig=$page->pageconfig();

                
                $art_list=$art_obj->art_list($pageconfig);
                // print_r($art_list);
                // exit;
                $this->assign('art_list',$art_list);
                $this->assign('pagestr',$pagestr);

                $this->display('index.html');

            }


            // 添加动作
            function  addAction(){
                $art_obj=Factory::M('CategoryModel');
                $cateInfo=$art_obj->getCategory();
                // echo '<pre>';
                // print_r($cateInfo);
                // exit;
                $this->assign('cate_list',$cateInfo);
                $this->display('add.html');
            }


            function dealAddAction(){

                $arr['cate_id']=isset($_POST['cate_id'])?$this->escapeData($_POST['cate_id']):'';
                $arr['title']=isset($_POST['title'])?$this->escapeData($_POST['title']):'';
                $arr['content']=isset($_POST['content'])?($_POST['content']):'';
                $arr['art_desc']=isset($_POST['art_desc'])?$this->escapeData($_POST['art_desc']):'';
                $arr['author']=isset($_POST['author'])?$this->escapeData($_POST['author']):'';

                if(empty($arr['title'])||empty($arr['content'])||empty($arr['art_desc'])||empty($arr['author'])){
                    $this->xiaoxi("填写信息不完整",'index.php?p=Back&c=Article&a=add');
                    exit;
                }
                if(empty($arr['cate_id'])){
                     $this->xiaoxi("请选择文章类型",'index.php?p=Back&c=Article&a=add');
                     exit;
                }
                
                // 上传缩略图
                // echo '<pre>';
                // print_r($_FILES);
                // exit;
                foreach($_FILES as $file){
                               foreach($file['error'] as $val){

                                    if($val!=4){

                                        $upload=Factory::M('Upload');

                                        $allow=['image/jpeg','image/png','image/gif','image/jpeg'];

                                        $path=UPLOADS.'thumb'.DS;

                                        $res=$upload->GetAll($allow,$path);
                    
                                        if($arr1=$upload->GetError()){
                                            foreach($arr1 as $msg){
                                               echo  "<script>alert('{$msg}');history.back();</script>";
                                               exit;
                                            }
                                        }
                                    $arr['thumb']=basename($res[0]);
                                }
                        }
                }
                // echo $arr['thumb'];
                // exit;
                $art_obj=Factory::M('ArticleModel');
                $res=$art_obj->addArticle($arr);
                if($res){
                    $this->xiaoxi("添加文章成功",'index.php?p=Back&c=Article&a=index');
                    exit;
                }else{
                    $this->xiaoxi("添加文章失败，请重试",'index.php?p=Back&c=Article&a=add');
                    exit;
                }
            }




            function editAction(){
                $art_id=isset($_GET['art_id'])?$_GET['art_id']:'';
                $art_obj=Factory::M('ArticleModel');
                $artinfo=$art_obj->getArtinfo($art_id);
                $cate_obj=Factory::M('CategoryModel');
                $cateinfo=$cate_obj->getCategory();
                $this->assign('cateInfo',$cateinfo);
                $this->assign('artInfo',$artinfo);
                $this->display('edit.html');
            }


            function dealEditAction(){
                $arr['art_id']=isset($_POST['art_id'])?$this->escapeData($_POST['art_id']):'';
                $arr['cate_id']=isset($_POST['cate_id'])?$this->escapeData($_POST['cate_id']):'';
                $arr['title']=isset($_POST['title'])?$this->escapeData($_POST['title']):'';
                $arr['content']=isset($_POST['content'])?($_POST['content']):'';
                $arr['art_desc']=isset($_POST['art_desc'])?$this->escapeData($_POST['art_desc']):'';
                $arr['author']=isset($_POST['author'])?$this->escapeData($_POST['author']):'';

                if(empty($arr['title'])||empty($arr['content'])||empty($arr['art_desc'])||empty($arr['author'])){
                    $this->xiaoxi("填写信息不完整",'index.php?p=Back&c=Article&a=add');
                    exit;
                }
                if(empty($arr['cate_id'])){
                     $this->xiaoxi("请选择文章类型",'index.php?p=Back&c=Article&a=add');
                     exit;
                }

                foreach($_FILES as $file){
                               foreach($file['error'] as $val){

                                    if($val!=4){

                                        $upload=Factory::M('Upload');

                                        $allow=['image/jpeg','image/png','image/gif','image/jpeg'];

                                        $path=UPLOADS.'thumb'.DS;

                                        $res=$upload->GetAll($allow,$path);
                    
                                        if($arr1=$upload->GetError()){
                                            foreach($arr1 as $msg){
                                               echo  "<script>alert('{$msg}');history.back();</script>";
                                               exit;
                                            }
                                        }else{                            
                                            $arr['thumb']=basename($res[0]); 
                                            // echo $arr['thumb'];
                                            // exit; 
                                    }
                                }else{
                                        $arr['thumb']=isset($_POST['thumbak'])?($_POST['thumbak']):'';
                                    }
                                }
                            }
                        $art_obj=Factory::M('ArticleModel');
                        $res=$art_obj->updateArt($arr);
                        if($res!==false){
                            $this->xiaoxi("修改文章成功",'index.php?p=Back&c=Article&a=index');
                            exit;
                        }else{
                            $this->xiaoxi("修改文章失败","index.php?p=Back&c=Article&a=edit&art_id={$arr['art_id']}");
                            
                            exit;
                        }       
            }

                function deleteAction(){
                    $art_id=isset($_GET['art_id'])?$this->escapeData($_GET['art_id']):'';
                    $art_obj=Factory::M('ArticleModel');
                        $res=$art_obj->delArtById($art_id);
                        if($res){
                            $this->xiaoxi("删除文章成功，已加入回收站",'index.php?p=Back&c=Article&a=index');
                            exit;
                        }else{
                            $this->xiaoxi("删除文章失败","index.php?p=Back&c=Article&a=index");
                            
                            exit;
                        }      
                }




                function delAllAction(){
                        if(!isset($_POST['art_id'])){
                            $this->xiaoxi("请选择相应的文章","index.php?p=Back&c=Article&a=index");
                            exit;
                        }

                        $art_ids=implode(',',$_POST['art_id']);
                        $art_obj=Factory::M('ArticleModel');
                        $res=$art_obj->delAllArt($art_ids);
                        if($res){
                            $this->xiaoxi("删除文章成功，已加入回收站",'index.php?p=Back&c=Article&a=index');
                            exit;
                        }else{
                            $this->xiaoxi("删除文章失败","index.php?p=Back&c=Article&a=index");
                            
                            exit;
                        }     

                }


                function recoverAction(){
                        $art_obj=Factory::M('ArticleModel');
                        // 分页
                        // 页数条数
                        $pagenum=$GLOBALS['conf']['Page']['pagenum'];
                        // 页面显示最大页码数
                        $displaymaxnum=$GLOBALS['conf']['Page']['displaymaxnum'];
                        // 跳转页面
                        $url='index.php?p=Back&c=Article&a=recover&';
                        // 记录总条数
                        $count=$art_obj->getDelCount();
                        $page=new Page($pagenum,$displaymaxnum,$count,$url);
                        // 提取分页字符串
                        $pagestr=$page->getPage();
                        $pageconfig=$page->pageconfig();
                        $art_list=$art_obj->getDelArt($pageconfig);
                        // print_r($art_list);
                        // exit;
                        $this->assign('pagestr',$pagestr);
                        $this->assign('art_list',$art_list);
                        $this->display('recover.html');
                }



                function realDeleteAction(){
                        $art_id=isset($_GET['art_id'])?$_GET['art_id']:'';
                        $art_obj=Factory::M('ArticleModel');
                        $res=$art_obj->realDelById($art_id);
                        if($res){
                            $this->xiaoxi("彻底删除文章成功",'index.php?p=Back&c=Article&a=recover');
                            exit;
                        }else{
                            $this->xiaoxi("彻底删除文章失败","index.php?p=Back&c=Article&a=recover");               
                            exit;
                        }     
                }


                function realDelAllAction(){
                    if(!isset($_POST['art_id'])){
                            $this->xiaoxi("请选择相应的文章","index.php?p=Back&c=Article&a=recover");
                            exit;
                    }

                    $art_ids=implode(',',$_POST['art_id']);
                    $art_obj=Factory::M('ArticleModel');
                    $res=$art_obj->realAllArt($art_ids);
                    if($res){
                            $this->xiaoxi("彻底删除文章成功",'index.php?p=Back&c=Article&a=recover');
                            exit;
                        }else{
                            $this->xiaoxi("彻底删除文章失败","index.php?p=Back&c=Article&a=recover");
                            
                            exit;
                        }     
                       
                }



                function dealRecoverAction(){
                    $art_id=isset($_GET['art_id'])?$this->escapeData($_GET['art_id']):'';
                    $art_obj=Factory::M('ArticleModel');
                        $res=$art_obj->restoreArtById($art_id);
                        if($res){
                            $this->xiaoxi("还原文章成功",'index.php?p=Back&c=Article&a=index');
                            exit;
                        }else{
                            $this->xiaoxi("还原文章失败","index.php?p=Back&c=Article&a=index");
                            
                            exit;
                        }      

                }

                                /**
                 * 文章推荐的动作
                 */
                public function ifRecommendAction() {
                    // 接收文章编号
                    $art_id = $_GET['art_id'];
                    // 接收推荐状态
                    $is_recommend = $_GET['is_recommend'];
                    // 接收当前页码
                    $pageNum = $_GET['pageNum'];
                    // 调用模型
                    $article = Factory::M('ArticleModel');
                    $result = $article->updateRecommendById($art_id, $is_recommend);
                    if($result) {
                        $this->xiaoxi('更改状态成功',"index.php?p=Back&c=Article&a=index&pageNum=$pageNum");
                    }else {
                        $this->xiaoxi('发生未知错误,推荐文章失败!',"index.php?p=Back&c=Article&a=index&pageNum=$pageNum");
                    }
                }

            

    }