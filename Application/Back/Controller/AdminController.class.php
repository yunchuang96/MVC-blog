<?php
    
    // 后台管理员控制器（登录，注销，管理员的增删改查等）
class AdminController  extends PlatController{

    public function loginAction(){
        $this->display('login.html');
    }


    public function checkAction(){
        $admin=[];
        $admin['admin_name']=$this->escapeData($_POST['admin_name']);
        $admin['admin_pass']=md5($_POST['admin_pass']);

        // 验证验证码
        $admin['code']=trim($_POST['code']);
        $code_obj=Factory::M('Code');
        if(!$code_obj->checkCode($admin['code'])){
            $this->xiaoxi('验证码不正确','index.php?p=Back&c=Admin');
        }
        $admin_obj=Factory::M('AdminModel');
        // 检查账号密码
        $result=$admin_obj->check($admin);

            // 账号密码正确时
        if($result){
                // 检查状态是否为0
            $res0=$admin_obj->checkstatus($admin);
            // 1.if(状态为0)直接登录,login_num变为0
            // 2.if(状态为其他的) 距离上次登录时间超过30分钟 登录成功 login_num变为0
            //                     距离上次少于30分钟，登录失败
            if($res0){
                // 状态为0，判断登录次数是否本身就为0，如果是则不做操作
                if(!$num=$admin_obj->checklogin_num($admin)){
                    // 更新登录次数为0
                     $admin_obj->update0($admin);
                }

                $_SESSION['adminInfo']=$result;
                setcookie('admin_name',$admin['admin_name'],7*24*3600);
                // 更新数据进数据库
                $updateres=$admin_obj->updateAdminInfo($result['admin_id']);
                if(!$updateres){
                $this->xiaoxi("登录异常",'index.php?p=Back&c=Admin');
                exit;
                }
                $this->xiaoxi('登录成功','index.php?p=Back&c=Manage&a=index');
                exit;
            }else{
                // 状态为其他，检查与上次登录时间相隔是否超过30分钟
                $res=$admin_obj->checktime($admin);
                    // 若超过30分钟
                if($res){
                        // 更新登录次数为0
                        $admin_obj->update0($admin);

                        // 将状态变为0
                        $admin_obj->upstatus0($admin);

                        $_SESSION['adminInfo']=$result;
                        setcookie('admin_name',$admin['admin_name'],7*24*3600);
                        // 更新数据进数据库
                        $updateres=$admin_obj->updateAdminInfo($result['admin_id']);
                        if(!$updateres){
                        $this->xiaoxi("登录异常",'index.php?p=Back&c=Admin');
                        exit;
                        }
                        $this->xiaoxi('登录成功','index.php?p=Back&c=Manage&a=index');
                        exit;
                    // 若没超过30分钟
                }else{
                        // 得到格式化时间，差多久才能登录
                        $sytime=$admin_obj->checksy($admin);
                        // echo $sytime;
                        // exit;
                        $this->xiaoxi("由于账号异常，还需{$sytime}才能登录",'index.php?p=Back&c=Admin');
                        exit;
                }

            }
           
        }else{
         
            // 查看是否有该账号  如果有，并将登录次数加1
            $res=$admin_obj->addnum($admin);
            // var_dump($res);
            // exit;
                // 若没有，直接报账号密码错误
            if(!$res){
                $this->xiaoxi('不存在该账号','index.php?p=Back&c=Admin');
                exit;     
            }else{
                // 若有,并判断该账号登录失败次数是否大于3，如大于等于3，将状态改为1，并将登录时间更新
                //                               如小于3，将登录时间更新
                $admin_obj->status1($admin);
                $this->xiaoxi('账号或密码错误','index.php?p=Back&c=Admin');
                exit;
            }
        }

    }

    // 生成验证码方法
    public function codeAction(){
        // 实例化验证码类
        $code_obj=Factory::M('Code');
        $code_obj->initpicture();
    }


    public function logoutAction(){
        @session_start();
        unset($_SESSION['adminInfo']);
        $this->xiaoxi('成功退出','index.php?p=Back&c=Admin');
    }



}
