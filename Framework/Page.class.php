<?php
    

    // 分页类
    class Page{

        private $pagenum; //每页显示记录数
        private $displaymaxnum; //页面显示的最大页码数
        private $count;  //总记录数
        private $url;   //固定url连接


        // 初始化属性
        public function __construct($pagenum,$displaymaxnum,$count,$url){
            $this->pagenum=$pagenum;
            $this->displaymaxnum=$displaymaxnum;
            $this->count=$count;
            $this->url=$url;

        }


        public function pageconfig(){
            // 总页数
            $totalpage=ceil($this->count / $this->pagenum);

            // 控制当前页数
            $page=isset($_GET['page'])?$_GET['page']+0:1;
            $page=max(1,ceil($page));
            $page=min($totalpage,ceil($page));
            if($totalpage==0){
                $page=1;
            }
            return $page;
        }



        public function getPage(){

             // 总页数
            $totalpage=ceil($this->count / $this->pagenum);

            // 控制当前页数
            $page=isset($_GET['page'])?$_GET['page']+0:1;
            $page=max(1,ceil($page));
            $page=min($totalpage,ceil($page));
            if($totalpage==0){
                $pate=1;
            }
          
            $pagestr='';


            $pagestr.="<a href='{$this->url}page=1'>首页</a>";


            // 拼接上一页
            $prepage=$page-1;
            if($page!=1){
                $pagestr.="<a href='{$this->url}page=$prepage'>上一页</a>";
            }



            // 确定显示的初始页$startpage
            
            if($page<=ceil($this->displaymaxnum/2)){ 
                $startpage=1;       //第一个页码
            }else{
                $startpage=$page-ceil($this->displaymaxnum/2)+1;
            }


            if($startpage<=1){
                $startpage=1;
            }

            // 确定显示的最后一页$endpage
            $endpage=$startpage+$this->displaymaxnum-1;

            // 防止最后一页越界
            if($endpage>=$totalpage){
                $endpage=$totalpage;
            }

            // 拼接页码
            for($i=$startpage;$i<=$endpage;$i++){
                if($i==$page){
                    $pagestr.="<a href='{$this->url}page=$i'><font color='red'>$i</a>";
                }else{
                    $pagestr.="<a href='{$this->url}page=$i'>$i</a>";
                }

            }

            // 拼接下一页
            $prepage=$page+1;
            if($page!==$totalpage){
                $pagestr.="<a href='{$this->url}page=$nextpage'>下一页</a>";
            }

            $pagestr.="<a href='{$this->url}page=$totalpage'>尾页</a>";

            $pagestr.="|总页数：$totalpage";

            // 返回字符串
            return $pagestr;

        }

}