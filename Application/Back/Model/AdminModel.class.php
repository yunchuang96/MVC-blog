   <?php


class AdminModel extends BaseModel{


    // 检查账号密码是否正确
    public function check($arr){
        // print_r($arr);
        $sql='select * from bg_admin where ';
        $sql.="admin_name='{$arr['admin_name']}'and ";
        $sql.="admin_pass='{$arr['admin_pass']}' "; 
        // echo $sql;
        // exit;
        $result=$this->lianjie->get_Row($sql);
        return $result;
    }

    // 检查该用户状态是否为0
    public function checkstatus($arr){
        $sql='select * from bg_admin where ';
        $sql.="admin_name='{$arr['admin_name']}'and ";
        $sql.="login_status=0";
        $result=$this->lianjie->get_Row($sql); 
        return $result;
    }

    // 状态为0，判断登录次数是否本身就为0
    public function checklogin_num($arr){
        $sql='select * from bg_admin where ';
        $sql.="admin_name='{$arr['admin_name']}'and ";
        $sql.="login_num=0";
        $result=$this->lianjie->get_Row($sql); 
        return $result;
    }

    // 更改连续登录错误次数
    public function update0($arr){
        $sql="update bg_admin set login_num=0 where admin_name='{$arr['admin_name']}'";
        $this->lianjie->exec($sql);
    }

    // 更改登录状态为0
     public function upstatus0($admin){
        $sql="update bg_admin set login_status =0 where admin_name='{$admin['admin_name']}'";
        $this->lianjie->exec($sql);    
    }

    // 检查时间
    public function checktime($arr){
        $time=time();
        $time=$time-30*60;
        $sql="select * from bg_admin where admin_name='{$arr['admin_name']}' and login_time < $time";
        $res=$this->lianjie->get_Row($sql);
        return $res;
    }

    // 检查正确登录的剩余时间
    public function checksy($arr){
        $time=time();
        $sql="select login_time from bg_admin where admin_name='{$arr['admin_name']}'";
        $res=$this->lianjie->get_One($sql);
        $mi=30*60-($time-$res);
        $format=$this->format_time($mi);
        return $format;
    }

    // 转换时间格式
    public function format_time($seconds){
    if( $seconds<86400 ){//如果不到一天
        $format_time = gmstrftime("%H:%M:%S", $seconds);
    }else{
        $time = explode(' ', gmstrftime('%j %H %M %S', $seconds));//Array ( [0] => 04 [1] => 14 [2] => 14 [3] => 35 ) 
        $format_time = ($time[0]-1).'天'.$time[1].'时'.$time[2].'分'.$time[3].'秒';
    }
    return $format_time;
    }

    // 登录失败时将错误登录次数+1，并检查是否有该用户
    public function addnum($arr){
        $sql="update bg_admin set login_num =login_num+1  where admin_name='{$arr['admin_name']}'";
        $res=$this->lianjie->exec($sql);
        return $res;

    }


    // 若有,并判断该账号登录失败次数是否大于3，如大于等于3，将状态改为1，并将登录时间更新
                //                               如小于3，将登录时间更新
    public function status1($admin){
        $sql="select * from bg_admin where admin_name='{$admin['admin_name']}'";
        $res=$this->lianjie->get_Row($sql);
        if($res){
            if($res['login_num']>=3){
                $this->upstatus($admin);
                $this->uplogin_time($admin);
            }else{
                 $this->uplogin_time($admin);
            }
        }
    }

    // 更改状态为1，禁止登录
    public function upstatus($admin){
        $sql="update bg_admin set login_status =1 where admin_name='{$admin['admin_name']}'";
        $res=$this->lianjie->exec($sql);
        
    }


    public function uplogin_time($admin){
        $time=time();
        $sql="update bg_admin set login_time=$time where admin_name='{$admin['admin_name']}'";
        $this->lianjie->exec($sql);
    }


    // 更改账号登录信息
    public function updateAdminInfo($id){
        $time=time();
        $sql='update bg_admin set ';
        $sql.="login_ip ='{$_SERVER['REMOTE_ADDR']}', ";
        $sql.="login_nums=login_nums+1, ";
        $sql.="login_time=$time ";
        $sql.="where admin_id =$id";
        // echo $sql;
        // exit;
        $result=$this->lianjie->exec($sql);
        return $result;
    } 






}
