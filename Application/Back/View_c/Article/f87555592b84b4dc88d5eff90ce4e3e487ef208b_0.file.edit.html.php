<?php
/* Smarty version 3.1.29, created on 2017-06-14 05:44:06
  from "D:\xampp\htdocs\total\my_blog\Application\Back\VIEW\Article\edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5940b10655d592_96008013',
  'file_dependency' => 
  array (
    'f87555592b84b4dc88d5eff90ce4e3e487ef208b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\total\\my_blog\\Application\\Back\\VIEW\\Article\\edit.html',
      1 => 1492094065,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/public.html' => 1,
  ),
),false)) {
function content_5940b10655d592_96008013 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../Public/public.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript" src="./Application/Back/Public/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<div class="admin">
  <div class="tab">
    <div class="tab-head"> <strong>文章管理</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">添加文章</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form method="POST" class="form-x" action="index.php?p=Back&c=Article&a=dealEdit" enctype="multipart/form-data">
          <div class="form-group">
            <div class="label">
              <label for="sitename">文章标题</label>
            </div>
            <?php
$_from = $_smarty_tpl->tpl_vars['artInfo']->value;
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
            <div class="field">
              <input type="text" class="input" id="title" name="title" size="50" placeholder="文章标题" data-validate="required:请填写您的文章标题" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/>
            
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="logo">缩略图</label>
            </div>
            <div class="field"> <a class="button input-file" href="javascript:void(0);">上传文件
              <input size="100" type="file" name="thumb[]" />
              </a> </div>
            <input type="hidden" name="thumbak" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['thumb'];?>
">
            <input type="hidden" name="art_id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
">
          </div>
          <div class="form-group">
            <div class="label">
              <label for="siteurl">文章作者</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="author" name="author" size="50" placeholder="请填写文章作者" data-validate="required:请填写文章作者" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['author'];?>
" />
            
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="sitename">所属类别</label>
            </div>
            <div class="field">
              <select name="cate_id" class="select">
              <?php
$_from = $_smarty_tpl->tpl_vars['cateInfo']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rows_1_saved_item = isset($_smarty_tpl->tpl_vars['rows']) ? $_smarty_tpl->tpl_vars['rows'] : false;
$_smarty_tpl->tpl_vars['rows'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rows']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
$_smarty_tpl->tpl_vars['rows']->_loop = true;
$__foreach_rows_1_saved_local_item = $_smarty_tpl->tpl_vars['rows'];
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['rows']->value['cate_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['rows']->value['cate_id'] == $_smarty_tpl->tpl_vars['row']->value['cate_id']) {?> selected<?php }?>><?php echo preg_replace('!^!m',str_repeat('-',(5*$_smarty_tpl->tpl_vars['rows']->value['level'])),$_smarty_tpl->tpl_vars['rows']->value['cate_name']);?>
</option>
              <?php
$_smarty_tpl->tpl_vars['rows'] = $__foreach_rows_1_saved_local_item;
}
if ($__foreach_rows_1_saved_item) {
$_smarty_tpl->tpl_vars['rows'] = $__foreach_rows_1_saved_item;
}
?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="readme">文章描述</label>
            </div>
            <div class="field">
              <textarea name="art_desc" class="input" rows="2" cols="50" placeholder="请填写文章描述" data-validate="required:请填写文章描述"><?php echo $_smarty_tpl->tpl_vars['row']->value['art_desc'];?>
</textarea>  
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="readme">文章内容</label>
            </div>                                                
            <div class="field">
              <textarea name="content" id="ck" class="input" rows="8" cols="50" placeholder="请填写文章内容" data-validate="required:请填写文章内容"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</textarea>
              <?php echo '<script'; ?>
 type="text/javascript">
                CKEDITOR.replace('ck');
              <?php echo '</script'; ?>
>   
            </div>
          </div>
          <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>          
          <div class="form-button">
            <button name="submit" class="button bg-main" type="submit">提交</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div style='height:40px; border-bottom:1px #DDD solid'></div>
  <p class="text-right text-gray" style="float:right">基于<a class="text-gray" target="_blank" href="#">MVC框架</a>构建</p>
</div>
</body>
</html><?php }
}
