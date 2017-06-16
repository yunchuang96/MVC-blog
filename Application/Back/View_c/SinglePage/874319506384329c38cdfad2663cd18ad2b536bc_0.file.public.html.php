<?php
/* Smarty version 3.1.29, created on 2017-06-16 07:31:49
  from "D:\xampp\htdocs\total\my_blog\Application\Back\VIEW\Public\public.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59436d45639fd6_65104549',
  'file_dependency' => 
  array (
    '874319506384329c38cdfad2663cd18ad2b536bc' => 
    array (
      0 => 'D:\\xampp\\htdocs\\total\\my_blog\\Application\\Back\\VIEW\\Public\\public.html',
      1 => 1497448349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59436d45639fd6_65104549 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>个人博客后台管理系统</title>
    <link rel="stylesheet" href="<?php echo @constant('CSS_PATH');?>
pintuer.css">
    <link rel="stylesheet" href="<?php echo @constant('CSS_PATH');?>
admin.css">
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_PATH');?>
jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_PATH');?>
pintuer.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_PATH');?>
respond.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_PATH');?>
admin.js"><?php echo '</script'; ?>
>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="<?php echo @constant('IMAGES');?>
favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="lefter">
    <div class="logo"><a href="#" target="_blank"><img src="<?php echo @constant('IMAGES_PATH');?>
logo.png" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">
    <div class="mainer">
        <div class="admin-navbar">
            <span class="float-right">
                <a class="button button-little bg-main" href="index.php?p=Home" target="_blank">前台首页</a>
                <a class="button button-little bg-yellow" href="index.php?p=Back&c=Admin&a=logout">注销登录</a>
            </span>
            <ul class="nav nav-inline admin-nav">
                <li class="active"><a href="index.php?p=Back&c=Manage&a=index" class="icon-home"> 开始</a>
                    <ul><li><a href="index.php?p=Back&c=Category&a=index">分类管理</a></li><li><a href="index.php?p=Back&c=Article&a=index">文章管理</a></li><li><a href="#">评论管理</a></li><li><a href="#">页面管理</a>
                    <li><a href="#">全局设置</a></li><li class="active"><a href="#">系统设置</a></li><a href="index.php?p=Back&c=Master&a=index">站长管理</a></li><li><a href="index.php?p=Back&c=SinglePage&a=index">单页管理</a></li></ul></li>
                </li>
            </ul>
        </div>
        <div class="admin-bread">
            <span>您好，欢迎您的光临。</span>
            <ul class="bread">
                <li><a href="index.php?p=Back&c=Manage&a=index" class="icon-home"> 开始</a></li>
                <li>后台首页</li>
            </ul>
        </div>
    </div>
</div><?php }
}
