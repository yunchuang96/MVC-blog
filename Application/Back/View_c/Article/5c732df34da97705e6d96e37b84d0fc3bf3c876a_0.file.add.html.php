<?php
/* Smarty version 3.1.29, created on 2017-04-13 15:50:13
  from "D:\xampp\htdocs\my_blog\Application\Back\VIEW\Article\add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58ef82159827d4_29753343',
  'file_dependency' => 
  array (
    '5c732df34da97705e6d96e37b84d0fc3bf3c876a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\my_blog\\Application\\Back\\VIEW\\Article\\add.html',
      1 => 1492091411,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/public.html' => 1,
  ),
),false)) {
function content_58ef82159827d4_29753343 ($_smarty_tpl) {
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
        <form method="POST" class="form-x" action="index.php?p=Back&c=Article&a=dealAdd" enctype="multipart/form-data">
          <div class="form-group">
            <div class="label">
              <label for="sitename">文章标题</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="title" name="title" size="50" placeholder="文章标题" data-validate="required:请填写您的文章标题" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="logo">缩略图</label>
            </div>
            <div class="field"> <a class="button input-file" href="javascript:void(0);">上传文件
              <input size="100" type="file" name="thumb[]" data-validate="required:请选择上传文件,regexp#.+.(jpg|jpeg|png|gif)$:只能上传jpg|gif|png格式文件" />
              </a> </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="siteurl">文章作者</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="author" name="author" size="50" placeholder="请填写文章作者" data-validate="required:请填写文章作者" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="sitename">所属类别</label>
            </div>
            <div class="field">
            
              <select name="cate_id" class="select">
                <?php
$_from = $_smarty_tpl->tpl_vars['cate_list']->value;
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
                 <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
"><?php echo preg_replace('!^!m',str_repeat('-',(3*$_smarty_tpl->tpl_vars['row']->value['level'])),$_smarty_tpl->tpl_vars['row']->value['cate_name']);?>
</option>
                <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
              </select>
            </div> 
          </div>
          <div class="form-group">
            <div class="label">
              <label for="readme">文章描述</label>
            </div>
            <div class="field" >
              <textarea name="art_desc" class="input" id="" rows="2" cols="50" placeholder="请填写文章描述" data-validate="required:请填写文章描述"></textarea>
            
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="readme">文章内容</label>
            </div>
            <div class="field">
              <textarea name="content" id="ck" class="input" rows="8" cols="50" placeholder="请填写文章内容" ></textarea>
                  <!-- 引入 -->
                <?php echo '<script'; ?>
 type="text/javascript">
                 CKEDITOR.replace('ck');
                <?php echo '</script'; ?>
>
            </div>
          </div>
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
