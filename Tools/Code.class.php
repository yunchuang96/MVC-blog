<?php

    class Code{

        private $width;
        private $height;
        private $pixelnum; //干扰点密度
        private $linenum; //干扰线条数
        private $stringnum; //验证码字符的个数
        private $string; //要写入的字符串


        function __construct(){
            // 初始化属性
            $this->initPar();
        }


        private function initPar(){

            $this->width=$GLOBALS['conf']['Code']['width'];
            $this->height=$GLOBALS['conf']['Code']['height'];
            $this->pixelnum=$GLOBALS['conf']['Code']['pixelnum'];
            $this->linenum=$GLOBALS['conf']['Code']['linenum'];
            $this->stringnum=$GLOBALS['conf']['Code']['stringnum'];
        }

        // 得到验证码图片
        public function initpicture(){

            $img=imagecreatetruecolor($this->width,$this->height);

            $backcolor=imagecolorallocate($img,mt_rand(200,255),mt_rand(150,255),mt_rand(200,255));
            imagefill($img,0,0,$backcolor);

            // 得到随机字符
            $this->string=$this->getRandString();

            // 加载干扰元素
            $this->distrub($img);

            // 计算字符间隔
            $span=ceil($this->width/($this->stringnum+1));

            for($i=1;$i<=$this->stringnum;$i++){
                    // 生成字体颜色
                    $stringcolor=imagecolorallocate($img,mt_rand(0,255),mt_rand(0,100),mt_rand(0,80));

                    imagestring($img,5,$i*$span,($this->height/2)-6,$this->string[$i-1],$stringcolor);
            }

            header("Content-type:image/jpeg");
            imagejpeg($img);
            imagedestroy($img);

        }

        // 得到验证字符
        private function getRandString(){

            $arr=array_merge(range(0,9),range('a','z'),range('A','Z'));
            shuffle($arr);
            $str='';
            $i=0;
            foreach($arr as $val){
                $str.=$val;
                shuffle($arr);
                $i++;
                if($i==$this->stringnum){
                    break;
                }
            }
            @session_start();
            $_SESSION['code']=$str;

            return $str;
        }


        // 干扰方法
        private function  distrub($img){
            // 干扰线
            for($i=0;$i<$this->linenum;$i++){
                $linecolor=imagecolorallocate($img,mt_rand(0,150),mt_rand(200,255),mt_rand(200,255));
                $x1=$x2=mt_rand(0,$this->width-1);
                $y1=$y2=mt_rand(0,$this->height-1);

                imageline($img,$x1,$y1,$x2,$y2,$linecolor);
            }

            for($i=0;$i<$this->width*$this->height*$this->pixelnum;$i++){
                $pixcolor=imagecolorallocate($img,mt_rand(100,150),mt_rand(100,150),mt_rand(100,150));
                imagesetpixel($img,mt_rand(0,$this->width-1),mt_rand(0,$this->height-1),$pixcolor);
            }

        }


        // 给外部设置验证码宽高
        public function  setWidth($width){
            $this->width=$width;
        }
        public function setHeight($height){
            $this->height=$height;
        }

        // 验证码是否正确的公共方法
        public function checkCode($code){
            @session_start(); 
            if(strtolower($code)!==strtolower($_SESSION['code'])){
                return false;
            }else{
                return true;
            }

        }






    }