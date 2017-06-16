<?php


// 封装PDODB类
class PDODB implements I_DB
{

    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $charset;

    private $dsn;  //数据源名称
    private $pdo;  //PDO类的对象
    private static $instance=null;  //存放PDO类的单例对象


    private function __construct(){

        // 初始化属性
        $this->initPar($arr);

        //初始化Dsn
        $this->initDsn();

        // 实例化pdo对象
        $this->initPdo();

        // 初始化模式 PDO对象属性
        $this->initAttMode();

    }

    // PDODB对象的单例对象
    public  static function getDb($arr){
        if(!self::$instance instanceof self){
            self::$instance=new self($arr);
        }
        return self::$instance;
    }

    // 初始化属性
    private function initPar($arr){
        $this->host=$arr2['host']?$arr2['host']:'localhost';
        $this->user=$arr2['user']?$arr2['user']:'root';
        $this->pass=$arr2['pass']?$arr2['pass']:'';
        $this->dbname=$arr2['dbname']?$arr2['dbname']:'xiaomi';
        $this->charset=$arr2['charset']?$arr2['charset']:'utf8';
    }

    // 初始化Dsn
    private function initDsn(){
        $this->dsn="mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
    }

    // 初始化Pdo对象
    // 
    private function initPdo(){
        try{
            // 在实例化PDO对象的时候自动走异常模式（唯一）
            $this->pdo=new PDO($this->dsn,$this->user,$this->pass);
        }catch(PDOException $e){
            echo '数据库连接失败<br>';
            echo '错误信息为：'.$e->getmessage().'<br>';
            echo '错误代码为'.$e->getCode().'<br>';
            echo '错误行数为'.$e->getLine().'<br>';
            return false;
        }

    }

    // 输出异常信息
    private function initAttMode(){
        // 将错误模式改为异常模式
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }


    private function my_error($e){
        echo 'SQL语句执行失败<br>';
        echo '错误信息为：'.$e->getmessage().'<br>';
        echo '错误代码为'.$e->getCode().'<br>';
        echo '错误行数为'.$e->getLine().'<br>';
        return false;
    }



    public function query($sql){
        try{
            $result=$this->pdo->exec($sql);
        }catch(PDOException $e){
            $this->error($e);
        }
    }


    public function get_List($sql){
        try{
            $result=$this->pdo->query($sql);
            $list=$result->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            $this->error($e);
            }
        return $list;
    }


    public function get_Row($sql){
        try{
            $result=$this->pdo->query($sql);
            $list=$result->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            $this->error($e);
            }
        return $list;
    }


    public function get_One($sql){
        try{
            $result=$this->pdo->query($sql);
            $list=$result->fetchColumn();
        }catch(PDOException $e){
            $this->error($e);
            }
        return $list;
    }

    private function __clone(){
                                                                                                                                                              
    }









}