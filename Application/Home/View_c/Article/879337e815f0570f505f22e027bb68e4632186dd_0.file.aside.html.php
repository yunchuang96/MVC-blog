<?php
/* Smarty version 3.1.29, created on 2017-06-14 14:01:41
  from "D:\xampp\htdocs\total\my_blog\Application\Home\VIEW\Public\aside.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_594125a500c5d8_97542242',
  'file_dependency' => 
  array (
    '879337e815f0570f505f22e027bb68e4632186dd' => 
    array (
      0 => 'D:\\xampp\\htdocs\\total\\my_blog\\Application\\Home\\VIEW\\Public\\aside.html',
      1 => 1497441695,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_594125a500c5d8_97542242 ($_smarty_tpl) {
?>
  <aside>
    <div class="rnav">
    <?php
$_from = $_smarty_tpl->tpl_vars['subCate']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$__foreach_row_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
      <li class="rnav<?php echo $_smarty_tpl->tpl_vars['key']->value%4+1;?>
 "><a href="index.php?p=Home&c=Article&a=index&cate_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_name'];?>
</a></li>
    <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
if ($__foreach_row_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_row_0_saved_key;
}
?>
    </div>
    <div class="ph_news">
      <h2>
        <p>点击排行</p>
      </h2>
      <ul class="ph_n">
        <?php
$_from = $_smarty_tpl->tpl_vars['sortByHits']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_n1_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_n1']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n1'] : false;
$__foreach_n1_1_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_n1'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration']++;
$__foreach_n1_1_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
          <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration'] : null) <= 3) {?>      
        <li><span class="num<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration'] : null);?>
"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration'] : null);?>
</span><a href="index.php?p=Home&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></li>
          <?php } else { ?>
          <li><span><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration'] : null);?>
</span><a href="index.php?p=Home&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></li>
          <?php }?>
        <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_n1_1_saved_local_item;
}
if ($__foreach_n1_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_n1'] = $__foreach_n1_1_saved;
}
if ($__foreach_n1_1_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_n1_1_saved_item;
}
?>
      </ul>
      <h2>
        <p>栏目推荐</p>
      </h2>
      <ul>
      <?php
$_from = $_smarty_tpl->tpl_vars['sortByRecommend']->value;
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
        <li><a href="index.php?p=Home&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></li>
      <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_2_saved_local_item;
}
if ($__foreach_row_2_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_2_saved_item;
}
?>
      </ul>
      <h2>
        <p>最新评论</p>
      </h2>
      <ul class="pl_n">
   
        <dl>
          <dt><img src="./Uploads/user/default.jpg"> </dt>
          <dt> </dt>
          <dd>DanceSmile
            <time>49分钟前</time>
          </dd>
          <dd><a href="/">说得真好</a></dd>
        </dl>
      </ul>
      <h2>
        <p>最近访客</p>
        <ul>
          <img src="<?php echo @constant('IMAGES_PATH');?>
/vis.jpg">
        </ul>
      </h2>
    </div>
    <div class="copyright">
      <ul>
        <p> Design by <a href="/">DanceSmile</a></p>
        <p>蜀ICP备11002373号-1</p>
        </p>
      </ul>
    </div>
  </aside><?php }
}
