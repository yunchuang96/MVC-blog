<?php
/* Smarty version 3.1.29, created on 2017-06-16 07:17:50
  from "D:\xampp\htdocs\total\my_blog\Application\Home\VIEW\Index\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_594369fe16b7f3_12029923',
  'file_dependency' => 
  array (
    '419cc4e4d2f903502b6b1a6444df98da5a8ef193' => 
    array (
      0 => 'D:\\xampp\\htdocs\\total\\my_blog\\Application\\Home\\VIEW\\Index\\index.html',
      1 => 1497590268,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/header.html' => 1,
    'file:../Public/copyright.html' => 1,
  ),
),false)) {
function content_594369fe16b7f3_12029923 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\xampp\\htdocs\\total\\my_blog\\Tools\\Smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\xampp\\htdocs\\total\\my_blog\\Tools\\Smarty\\plugins\\modifier.date_format.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>云窗个人博客</title>
<meta name="keywords" content="云窗个人博客" />
<meta name="description" content="云窗个人博客" />
<link href="<?php echo @constant('CSS_PATH');?>
base.css" rel="stylesheet">
<link href="<?php echo @constant('CSS_PATH');?>
index.css" rel="stylesheet">
<link href="<?php echo @constant('CSS_PATH');?>
media.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<!--[if lt IE 9]>
<?php echo '<script'; ?>
 src="js/modernizr.js"><?php echo '</script'; ?>
>
<![endif]-->
</head>
<body>
<div class="ibody">
      <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <article>
    <div class="banner">
      <ul class="texts">
        <p>The best life is use of willing attitude, a happy-go-lucky life. </p>
        <p>最好的生活是用心甘情愿的态度，过随遇而安的生活。</p>
      </ul>
    </div>
    <div class="bloglist">
      <h2>
        <p><span>推荐</span>文章</p>
      </h2>
      <div class="blogs">
        <?php
$_from = $_smarty_tpl->tpl_vars['recommendArt']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
      <div class="blogs">
        <h3><a href="index.php?p=Home&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></h3>
        <figure><img src="./Uploads/thumb/<?php echo $_smarty_tpl->tpl_vars['row']->value['thumb'];?>
" ></figure>
        <ul>
          <p><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['row']->value['content']),100,'...');?>
</p>
          <a href="index.php?p=Home&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：<?php echo $_smarty_tpl->tpl_vars['row']->value['author'];?>
</span><span>分类：【<a href="/"><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_name'];?>
</a>】</span><span>浏览（<a href="index.php?p=Home&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['hits'];?>
</a>）</span>评论（<a href="index.php?p=Home&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['reply_nums'];?>
</a>）</span></p>
        <div class="dateview"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['addtime'],"%Y-%m-%d");?>
</div>
      </div>
      <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
      <div class="blogs">
        暂未查询到推荐文章……
      </div>
      <?php
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
    </div>
  </article>
  <aside>
    <div class="avatar"><a href="about.html"><span>关于我</span></a></div>
    <div class="topspaceinfo">
      <h1>执子之手，与子偕老</h1>
      <p>于千万人之中，我遇见了我所遇见的人....</p>
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
    <div class="bdsharebuttonbox"><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
    <div class="tj_news">
      <h2>
        <p class="tj_t1">最新文章</p>
      </h2>
      <ul>
          <?php
$_from = $_smarty_tpl->tpl_vars['newArt']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_1_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_1_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
          <li><a href=""><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></li>
          <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_1_saved_local_item;
}
if ($__foreach_row_1_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_1_saved_item;
}
?>
      </ul>
      <h2>
        <p class="tj_t2">推荐文章</p>
      </h2>
      <ul>
        <?php
$_from = $_smarty_tpl->tpl_vars['rmdArtByHits']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_2_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_2_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
          <li><a href=""><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></li>
          <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_2_saved_local_item;
}
if ($__foreach_row_2_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_2_saved_item;
}
?>    
      </ul>
    </div>
    <div class="links">
      <h2>
        <p>友情链接</p>
      </h2>
      <ul>
        <li><a href="/">个人博客</a></li>
      </ul>
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
</html>
<?php }
}
