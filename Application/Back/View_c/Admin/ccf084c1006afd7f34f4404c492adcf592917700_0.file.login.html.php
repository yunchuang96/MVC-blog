<?php
/* Smarty version 3.1.29, created on 2017-04-10 09:22:23
  from "D:\xampp\htdocs\my_blog\Application\Back\VIEW\Admin\login.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58eb32af9b8298_49498879',
  'file_dependency' => 
  array (
    'ccf084c1006afd7f34f4404c492adcf592917700' => 
    array (
      0 => 'D:\\xampp\\htdocs\\my_blog\\Application\\Back\\VIEW\\Admin\\login.html',
      1 => 1491808931,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58eb32af9b8298_49498879 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>个人博客后台登录</title>
    <link rel="stylesheet" href="<?php echo @constant('CSS_PATH');?>
/pintuer.css">
    <link rel="stylesheet" href="<?php echo @constant('CSS_PATH');?>
/admin.css">
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_PATH');?>
/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_PATH');?>
/pintuer.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_PATH');?>
/respond.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_PATH');?>
/admin.js"><?php echo '</script'; ?>
>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="container">
    <div class="line">
        <div class="xs6 xm4 xs3-move xm4-move">
            <br /><br />
            <div class="media media-y">
                <a href="#" target="_blank"><img src="<?php echo @constant('IMAGES_PATH');?>
/logo.png" class="radius" alt="后台管理系统" /></a>
            </div>
            <br /><br />
            <form action="index.php?p=Back&c=Admin&a=check" method="POST">
            <div class="panel">
                <div class="panel-head"><strong>登录个人博客后台管理系统</strong></div>
                <div class="panel-body" style="padding:30px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input" name="admin_name" placeholder="登录账号" data-validate="required:请填写账号,length#>=5:账号长度不符合要求" />
                            <span class="icon icon-user"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input" name="admin_pass" placeholder="登录密码" data-validate="required:请填写密码,length#>=8:密码长度不符合要求" />
                            <span class="icon icon-key"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                            <input type="text" class="input" name="code" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码" />
                            <img src="index.php?p=Back&c=Admin&a=code" onclick="this.src='index.php?p=Back&c=Admin&a=code&n='+Math.random()" width="80" height="32" class="passcode" />
                        </div>
                    </div>
                </div>
                <div class="panel-foot text-center"><button class="button button-block bg-main text-big">立即登录后台</button></div>
            </div>
            <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">MVC框架</a>构建</p>
            </form>
        </div>
    </div>
</div>
</body>
</html><?php }
}
