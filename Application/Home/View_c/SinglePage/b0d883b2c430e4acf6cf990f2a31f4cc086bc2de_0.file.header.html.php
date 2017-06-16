<?php
/* Smarty version 3.1.29, created on 2017-06-14 15:54:13
  from "D:\xampp\htdocs\total\my_blog\Application\Home\VIEW\Public\header.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_594140053ba930_98938070',
  'file_dependency' => 
  array (
    'b0d883b2c430e4acf6cf990f2a31f4cc086bc2de' => 
    array (
      0 => 'D:\\xampp\\htdocs\\total\\my_blog\\Application\\Home\\VIEW\\Public\\header.html',
      1 => 1497448408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_594140053ba930_98938070 ($_smarty_tpl) {
?>
 <header>
    <h1>云窗个人博客</h1>
    <h2>你的眼界决定你的世界</h2>
    <div class="logo"><a href="index.php?p=Home"></a></div>      
    <nav id="topnav"><a href="index.php?p=Home">首页</a>
    <?php
$_from = $_smarty_tpl->tpl_vars['first_cate']->value;
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
    <a href="index.php?p=Home&c=Article&a=index&cate_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_name'];?>
</a><?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
    <a href="index.php?p=Home&c=SinglePage&a=index&page_id=2">关于我</a></nav>
  </header><?php }
}
