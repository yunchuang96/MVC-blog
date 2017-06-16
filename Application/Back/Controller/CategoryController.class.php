<?php

    // 后台分类管理
class CategoryController extends PlatController{
        // 显示分页首页
        public function indexAction(){
            $category_obj=Factory::M('CategoryModel');
            // 得到所有分类信息
            $cate_list=$category_obj->getCategory();
            // 检查是是否有下级分类或文章，供删除筛选
            $cate_list=$category_obj->checkAllBottom($cate_list);
          
            $this->assign('cate_list',$cate_list);
            $this->display('index.html');
        }

        // 添加动作
        public function addAction(){
            $category_obj=Factory::M('CategoryModel');
            $cate_list=$category_obj->getCategory();
            // echo '<pre>';
            // print_r($cate_list);
            // echo '</pre>';
            // exit;
            $this->assign('cate_list',$cate_list);
            $this->display('add.html');
        }

        // 处理添加
        public function dealAddAction(){
            // echo '1';
            $cate=array();

            // 接收并转义
            $cate['cate_name']=$this->escapeData($_POST['cate_name']);
            $cate['cate_pid']=$this->escapeData($_POST['cate_pid']);
            $cate['cate_sort']=$this->escapeData($_POST['cate_sort'])+0;
            $cate['cate_desc']=$this->escapeData($_POST['cate_desc']);
          
            
            // 验证数据合法性
            if(empty($cate['cate_name'])||empty($cate['cate_sort'])||empty($cate['cate_desc'])){
                $this->xiaoxi('信息不完整',"index.php?p=Back&c=Category&a=add");
                return;

            }

            if(intval($cate['cate_sort'])!==$cate['cate_sort'] ||$cate['cate_sort']<0 ||$cate['cate_sort']>20){
                 $this->xiaoxi('排序编号必须为1-20','index.php?p=Back&c=Category&a=add');
                 return;
            }

            $category_obj=Factory::M('CategoryModel');
            // 检查该父类下是否有同级顺序
            $result=$category_obj->checksort($cate['cate_sort'],$cate['cate_pid']);
            if($result){
                 $this->xiaoxi("请修改排序，该父类下已存在该排序的分类",'index.php?p=Back&c=Category&a=add');
                 exit;
            }
            $result=$category_obj->addcate($cate);
            if($result){
                $this->xiaoxi('添加分类成功','index.php?p=Back&c=Category&a=index');
                return;
            }else{
                $this->xiaoxi('未知错误，请重试','index.php?p=Back&c=Category&a=add');
            }
        }

        // 修改动作
        public function  editAction(){
            $cate_id=isset($_GET['cate_id'])?$_GET['cate_id']:'';


            $category_obj=Factory::M('CategoryModel');
            $cate['b']='';
            // 查看是否是最下级且该分类下是否有文章
            $res=$category_obj->checkbottom($cate_id);
            if(!empty($res)){
                $cate['b']="disabled";
            }
            // 得到该类的信息
            $cate_row=$category_obj->editCateById($cate_id);
            // 得到所有类的信息Pid
            $cate_list=$category_obj->getCategory();
            // smarty模板处理
            $this->assign('cate_b',$cate);
            $this->assign('cate_row',$cate_row);
            $this->assign('cate_list',$cate_list);
            $this->display('edit.html');
        }


        // 处理修改
        public function dealEditAction(){
            // 接收并转义数据
            $cate=array();
            $cate['cate_name']=$this->escapeData($_POST['cate_name']);
            // 未接收到父类默认为0
            $cate['cate_pid']=isset($_POST['cate_pid'])?$this->escapeData($_POST['cate_pid']):0;
            // text传值为文本+0转化为数字
            $cate['cate_sort']=$this->escapeData($_POST['cate_sort'])+0;
            $cate['cate_desc']=$this->escapeData($_POST['cate_desc']);
            $cate['cate_id']=$this->escapeData($_POST['cate_id']);

            // 检查数据合法性
            if(empty($cate['cate_name'])||empty($cate['cate_sort'])||empty($cate['cate_desc'])){
                $this->xiaoxi('信息不完整',"index.html?p=Back&c=Category&a=edit&cate_id={$cate['cate_id']}");
            }

            
            // 排序编号是否合法
            if(intval($cate['cate_sort'])!==$cate['cate_sort'] ||$cate['cate_sort']<0 ||$cate['cate_sort']>20){
                 $this->xiaoxi('排序编号必须为1-20',"index.html?p=Back&c=Category&a=edit&cate_id={$cate['cate_id']}");
            }

            $cate_obj=Factory::M('CategoryModel');
            // 检查该父类下是否有同级顺序
            $result=$cate_obj->checksort($cate['cate_sort'],$cate['cate_pid']);
            if($result){
                 $this->xiaoxi("请修改排序，该父类下已存在该排序的分类","index.php?p=Back&c=Category&a=edit&cate_id={$cate['cate_id']}");
                 exit;
            }
            $res=$cate_obj->updateCateById($cate);
            if($res){
                $this->xiaoxi("修改成功","index.php?p=Back&c=Category&a=index");
                exit;
            }else{
                 $this->xiaoxi('修改失败，请重新尝试',"index.php?p=Back&c=Category&a=edit&cate_id={$cate['cate_id']}");
            }
            
        }


        // 删除单条分类动作
        public function deleteAction(){
            $cate_id=isset($_GET['cate_id'])?$_GET['cate_id']:'';

            $cate_obj=Factory::M('CategoryModel');
            // 检查该分类下是否有下级分类或文章
            $cate_obj->checkbottom($cate_id);
            if(!empty($res)){
                    $this->xiaoxi("删除失败，请检查选中的类别是否有下级分类或有文章","index.php?p=Back&c=Category&a=index");
                    exit;
            }
            $result=$cate_obj->delCateById($cate_id);
            if($result){
                $this->xiaoxi("删除成功","index.php?p=Back&c=Category&a=index");
                exit;
            }else{
                $this->xiaoxi('删除失败,请重新尝试',"index.php?p=Back&c=Category&a=index");
                exit;
            }   
        }

        // 批量删除
        public function delAllAction(){
            // 判断是否有选择删除分类
            if(!isset($_POST['cate_id'])){
                $this->xiaoxi("请先选择要删除的分类","index.php?p=Back&c=Category&a=index");
                exit;
            }
            $cate_obj=Factory::M('CategoryModel');
            $cate_arr=$_POST['cate_id'];
            // 检查接收的分类中是否存在下级分类或文章
            foreach($cate_arr as $val){
                $res=$cate_obj->checkbottom($val);
                if(!empty($res)){
                    $this->xiaoxi("删除失败，请检查选中的类别是否有下级分类或有文章","index.php?p=Back&c=Category&a=index");
                    exit;
                }
            }
            // 判断是否以多条的形式删除
            if(count($cate_arr)!==1){
                $result=$cate_obj->delAllCate($cate_arr);
            }else{
                $result=$cate_obj->delCateById($cate_arr[0]);
            }
           
            if($result){
                $this->xiaoxi("删除成功","index.php?p=Back&c=Category&a=index");
            }else{
                $this->xiaoxi('删除失败,请重新尝试',"index.php?p=Back&c=Category&a=index");
            }


        }



}