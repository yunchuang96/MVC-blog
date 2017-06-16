<?php

    // 分类model
    class CategoryModel extends BaseModel{

        // 得到所有分类
        public function getCategory(){
            $sql="select * from bg_category order by cate_sort asc";
            $result=$this->lianjie->get_List($sql);
            // print_r($result);
            // exit;
            $n_result=$this->getCategoryTree($result);
            return $n_result;
        }

        // 检查数组中分类是否有下级分类或文章
        public function checkAllBottom($cate_list){
             
                foreach($cate_list as $key=>$val){
                    $res=$this->checkbottom($val['cate_id']);
                    if(!empty($res)){
                        $cate_list[$key]['bottom']='disabled';
                    }else{
                        $cate_list[$key]['bottom']='';
                    }
                }
                return $cate_list;
        }


        /**
         * 格式化分组列表
         * @param  [type]  $list  原始分类列表，二维数组
         * @param  integer $pid   父类id
         * @param  integer $level 级别
         * @return [type]         格式化后的分类列表
         */
        public function getCategoryTree($list,$pid=0,$level=0){
            // 定义静态数组变量存储存放之后的数据
            static $tree_arr=[];

            foreach($list as $val){
                if($val['cate_pid']==$pid){
                    $val['level']=$level;
                    $tree_arr[]=$val;
                    // 递归  拿到1-n级
                $this->getCategoryTree($list,$val['cate_id'],$level+1);    
                }
                   
            }
            return $tree_arr;
        }

        // 增加分类
        public function addCate($arr){

            extract($arr);
            $sql="insert into bg_category (cate_id,cate_name,cate_pid,cate_sort,cate_desc) values(null,'{$cate_name}',$cate_pid,$cate_sort,'{$cate_desc}')";
            // echo $sql;
            // exit;
            $result=$this->lianjie->exec($sql);
            return $result;
        }

        // 检查是否是最下级分类且该分类下是否有内容
        public function checkbottom($cate_id){
            // 检查该分类是否有下级分类
            $sql="select * from bg_category  where cate_pid=$cate_id";
            $a_arr=$this->lianjie->get_List($sql);
            // 检查该分类下是否有文章
            $sql="select * from bg_article where cate_id=$cate_id ";
            $b_arr=$this->lianjie->get_List($sql);
            $result=array_merge($a_arr,$b_arr);
            return $result; 
        }

        // 检查修改的分类排序是否存在重复
        public function checksort($cate_sort,$cate_pid){
            $sql="select cate_id from bg_category where cate_sort=$cate_sort and cate_pid=$cate_pid";
            $res=$this->lianjie->get_One($sql);
            return $res;
        }

        // 修改分类查询 得到该id的分类信息 
        public function editCateById($cate_id){
            $sql="select * from  bg_category where cate_id= $cate_id";
            $result=$this->lianjie->get_Row($sql);
            return $result;
        }

        // 更新分类内容
        public function updateCateById($arr){
            extract($arr);
            $sql="update bg_category set cate_name='{$cate_name}',cate_pid=$cate_pid,cate_sort=$cate_sort,cate_desc='{$cate_desc}' where cate_id=$cate_id";
            $result=$this->lianjie->exec($sql);
            return $result;
        }

        // 单独删除
        public function delCateById($cate_id){
            $sql="delete from bg_category where cate_id=$cate_id";
            $result=$this->lianjie->exec($sql);
            return $result;
        }

        // 批量删除
        public function delAllCate($cate_arr){
            $cate_str=implode(',',$cate_arr);
            $sql="delete from bg_category where cate_id in($cate_str)";
            $result=$this->lianjie->query($sql);
            return $result;
        }




    }