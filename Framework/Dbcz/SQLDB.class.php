<?php


    Class SQLDB implements I_DB{

    private $link=null;
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $charset;
    //单例化第1步：设定一个私有静态属性以存储该单例对象：
    private static $instance=null;
    //单例化第2步：将构造方法似有化
    private function __construct($arr2){
        //将这些数据存储到“自己”的属性中去
        $this->host=$arr2['host']?$arr2['host']:'localhost';
        $this->user=$arr2['user']?$arr2['user']:'root';
        $this->pass=$arr2['pass']?$arr2['pass']:'';
        $this->dbname=$arr2['dbname']?$arr2['dbname']:'xiaomi';
        $this->charset=$arr2['charset']?$arr2['charset']:'utf8';
        // echo "<pre>";
        // var_dump($arr2);

        // exit;
        $this->connect();     
    }
    //单例化第3步：设定一个静态方法，判断是否需要new一个对象，并返回
    static function getDb($arr1){
        //如果不是自身的实例
        if(!(self::$instance instanceof self)){ 
        self::$instance=new self($arr1); 
        }
        return self::$instance;
    }
    //单例化第4步，禁止克隆
    private function __clone(){}

        //更改数据库方法
    function changeDb($dbname,$arr){
        $arr['dbname']=$dbname;
        $this->__construct($arr);
        $this->dbname=$dbname;
    }
        //更改字符编码方法
    function changeChar($charset){
        $arr['charset']=$charset;
        $this->__construct($arr);
        $this->charset=$charset;
    }


    //该方法专门执行sql语句，并：
    //如果失败，就处理错误，然后结束；
    //如果成功，就“直接返回”，对直接结果不做任何处理
    public function query($sql){
        $result=mysqli_query($this->link,$sql);
        if($result==false){
            echo '数据库失败了';
            echo mysqli_error($this->link);
            echo mysqli_errno($this->link);
            die();   
        }else{
            return $result;
        }
    }

    //该方法用于执行一条没有返回结果的增删改语句：
    function exec($sql ){
        $result = $this->query($sql);
        if($res=mysqli_affected_rows($this->link)==1){
            return true;
        }else{
            // var_dump($res);
            // exit;
            return false;
        }
    }


    //该方法用于执行一条结果的增删改语句：
    // function add_del($sql){
    //     $result=$this->query($sql);
    //     if(mysqli_affected_rows($this->link)==1){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }


    //该方法可以执行一条返回多行数据的select语句，
    //并将数据以“二维数组”的形式返回
    function get_List($sql){
        $result=$this->query($sql);   
            $arr=[];
            while($res=mysqli_fetch_assoc($result)){
                
                $arr[]=$res;
            }
            return $arr;
    
    }

    //该方法可以执行一条返回一行数据的select语句，
    //并将数据以“一维数组”的形式返回
    function get_Row($sql){
            $result=$this->query($sql);   
            if($res=mysqli_fetch_assoc($result)){
                return $res;
            }
            return array(); //否则，则返回空数组
    
    }

    //该方法可以执行一条返回一条数据的select语句，
    //并将数据以“标量数据”的形式返回
    function get_One($sql){
        $result=$this->query($sql);   
            if($arr=mysqli_fetch_row($result)){
                return $arr[0];
            }
            return false;
    }

    private function close(){
        mysqli_close($this->link);
    }

    function __sleep(){
        //只要如下数据进行序列化
        return array('host','user','pass','charset','dbname');
    }

    function __wakeup(){
        //反序列化时立即完成连接工作
        $this->connect();
    }

    //专门做处理连接的处理
    private  function connect(){
        $this->link=mysqli_connect($this->host,$this->user,$this->pass,$this->dbname)or die("数据库连接错误");
        // var_dump($this->link);
        mysqli_set_charset($this->link,$this->charset);
    }

}