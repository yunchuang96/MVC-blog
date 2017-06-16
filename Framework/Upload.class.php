<?php

  class Upload {
    // 允许的文件类型
    private $allow_type=['image/jpeg','image/png','image/gif','image/jpeg'];
     // 允许的文件后缀
    private $allow_ext=['jpeg','jpg','png','gif'];
     // 允许的最大文件大小
    private $allow_max_size=500000;
     // 保存错误信息
    private $error_arr=[];
    //保存文件路径
    private $file_path="./web/back/upfile/";

    //
    private $trr_arr=[];

    // 返回保存错误信息的数组
    function GetError(){
        if(!empty($this->error_arr)){
            return $this->error_arr;
        }else{
            return false; //表示没有错误
        }

    }


    function GetAll($allow_type,$file_path){

        $this->allow_type=$allow_type;
        $this->file_path=$file_path;

        $trr_arr=[];
        foreach($_FILES as $file){
                
                $tmp_file=[];
                        // 遍历文件数组
                foreach($file as $key =>$file2){
                        // 变换file数组形式
                        foreach($file2 as $key2=> $file3){
                                $tmp_file[$key2][$key]=$file3;
                            }
           
                   }
                    // 将每个file都上传  
                       foreach($tmp_file as $file4){
                        // print_r($file4);
                        // exit;
                             $result=$this->UploadOne($file4); 
                             if($result){
                                $trr_arr[]=$result;
                             }
                        }                          
        }
        return $trr_arr;  
    }   

        function UploadOne($file){

            if($file['error']==0){
                
                 $file_name=$file['name'];
               
                if(!(is_uploaded_file($file['tmp_name']))){
                 $this->error_arr[] = "文件【{$file_name}】非法上传！";
                    return false;
                    }


                $suffix = ltrim(strrchr($file_name,"."),'.');

                // echo $suffix;

                // exit;
                if(!in_array($suffix,$this->allow_ext)){  
                    $this->error_arr[] = "文件【{$file_name}】后缀错误！";
                    return false;
                }

                $type = $file['type'];
            
                if( !in_array($type,$this->allow_type)){    
                    $this->error_arr[] = "文件【{$file_name}】类型错误！";
                    return false;
                }

                $size = $file['size'];
                if( $size > $this->allow_max_size){ 
                    $this->error_arr[] = "文件【{$file_name}】大小超出范围！";
                    return false;
                }

                if(!(is_dir($this->file_path))){
                    mkdir($this->file_path,0777,true);
                }

                $name=$this->randName();    //想用的文件名
                $target_file = $this->file_path . $name  . '.'.$suffix;
           
                if( move_uploaded_file($file['tmp_name'],$target_file)){
                  echo "<script>alert('文件【{$file_name}】上传成功');</script>"; 
                    return $target_file;
                }else{
                    echo "<script>alert('未知错误');</script>";    
                }

            }else{    
            $this->error_arr[] = "上传的文件【{$file['name']}】有错误！";
            return false;
            }
        }



        private function randName(){
             $name = date("YmdHis") . '-'. rand(10000,99999);
             return $name;
        }

  }


     








?>