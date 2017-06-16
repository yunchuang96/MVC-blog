<?php
/* Smarty version 3.1.29, created on 2017-06-14 16:12:15
  from "D:\xampp\htdocs\total\my_blog\Application\Home\VIEW\SinglePage\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5941443fd20859_37733839',
  'file_dependency' => 
  array (
    'f282109d1a22155cb8e20310a9d304fd4c5266be' => 
    array (
      0 => 'D:\\xampp\\htdocs\\total\\my_blog\\Application\\Home\\VIEW\\SinglePage\\index.html',
      1 => 1497449534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/meta.html' => 1,
    'file:../Public/header.html' => 1,
    'file:../Public/copyright.html' => 1,
  ),
),false)) {
function content_5941443fd20859_37733839 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../Public/meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo @constant('CSS_PATH');?>
base.css" rel="stylesheet">
<link href="<?php echo @constant('CSS_PATH');?>
about.css" rel="stylesheet">
<link href="<?php echo @constant('CSS_PATH');?>
media.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<!--[if lt IE 9]>
<?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
/modernizr.js"><?php echo '</script'; ?>
>
<![endif]-->
</head>
<body>
<div class="ibody">
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <article>
    <h3 class="about_h">您现在的位置是：<a href="index.php?p=Home">首页</a>><a href="index.php?p=Home&c=SinglePage&a=index&page_id=2"><?php echo $_smarty_tpl->tpl_vars['pageInfo']->value['title'];?>
</a></h3>
    <div class="about">
      <?php echo $_smarty_tpl->tpl_vars['pageInfo']->value['content'];?>

    </div>
  </article>
  <aside>
    <div class="avatar"><a href="index.php?p=Home&c=SinglePage&a=index&page_id=2"><span>关于云窗</span></a></div>
    <div class="topspaceinfo">
      <h1>你的眼界决定你的世界</h1>
      <p>一直向前走，不时回回头</p>
    </div>
    <div class="about_c">
      <p>网名：<?php echo $_smarty_tpl->tpl_vars['masterInfo']->value['nickname'];?>
</p>
      <p>职业：<?php echo $_smarty_tpl->tpl_vars['masterInfo']->value['job'];?>
</p>
      <p>籍贯：<?php echo $_smarty_tpl->tpl_vars['masterInfo']->value['home'];?>
</p>
      <p>电话：<?php echo $_smarty_tpl->tpl_vars['masterInfo']->value['tel'];?>
</p>
      <p>邮箱：<?php echo $_smarty_tpl->tpl_vars['masterInfo']->value['email'];?>
</p>
    </div>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../Public/copyright.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  </aside>
  <?php echo '<script'; ?>
 src="<?php echo @constant('JS_PATH');?>
/silder.js"><?php echo '</script'; ?>
>
  <div class="clear"></div>
  <!-- 清除浮动 --> 
</div>
</body>
</html><?php }
}
