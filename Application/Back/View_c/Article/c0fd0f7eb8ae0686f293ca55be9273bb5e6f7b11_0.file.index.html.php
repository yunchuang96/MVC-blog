<?php
/* Smarty version 3.1.29, created on 2017-04-16 17:05:35
  from "D:\xampp\htdocs\my_blog\Application\Back\VIEW\Article\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58f3883f650258_92579252',
  'file_dependency' => 
  array (
    'c0fd0f7eb8ae0686f293ca55be9273bb5e6f7b11' => 
    array (
      0 => 'D:\\xampp\\htdocs\\my_blog\\Application\\Back\\VIEW\\Article\\index.html',
      1 => 1492355133,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/public.html' => 1,
  ),
),false)) {
function content_58f3883f650258_92579252 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\xampp\\htdocs\\my_blog\\Tools\\Smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\xampp\\htdocs\\my_blog\\Tools\\Smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../Public/public.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
>
    //定义页面载入事件
    $(function(){
        //获取btnAdd按钮
        $('#btnAdd').bind('click',function(){
            // 设置“添加文章”链接
            window.location.href = 'index.php?c=Article&p=Back&a=add';
        });
    });

     $(function(){
        //获取btnAdd按钮
        $('#btnre').bind('click',function(){
            // 设置“回收站文章”链接
            window.location.href = 'index.php?c=Article&p=Back&a=recover';
        });
    });
<?php echo '</script'; ?>
>
<div class="admin">
    <form action="index.php?p=Back&c=Article&a=delAll" method="POST">
    <div class="panel admin-panel">
        <div class="panel-head"><strong>文章列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="art_id[]" value="全选" />
            <input type="button" id="btnAdd" class="button button-small border-green" value="添加文章" />
            <input type="submit" class="button button-small border-yellow"  value="批量删除" onclick="return confirm('你确定要删除吗？')"/>
            <input type="button" id="btnre"class="button button-small border-blue" value="回收站" />
        </div>
        <table class="table table-hover">
            <tr>
                <th width="45">选择</th>
                <th width="120">所属类别</th>
                <th width="200">文章标题</th>
                <th width="120">点击率</th>
                <th width="180">发布时间</th>
                <th width="100">操作</th>
            </tr>
            <?php
$_from = $_smarty_tpl->tpl_vars['art_list']->value;
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
            <tr>
                <td><input type="checkbox" name="art_id[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
" /></td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_name'];?>
</td>
                <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['row']->value['title'],10);?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['hits'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['addtime'],'%Y:%m:%d %H:%M:%S');?>
</td>
                <td>
                    <a class="button border-blue button-little" href="index.php?p=Back&c=Article&a=edit&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
">修改</a> 
                    <a class="button border-yellow button-little" href="index.php?p=Back&c=Article&a=delete&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
" onclick="return confirm('你确定要删除?')";>删除</a>
                </td>
            </tr>
            <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
        </table>
        <div class="panel-foot text-center">
            <?php echo $_smarty_tpl->tpl_vars['pagestr']->value;?>

        </div>
    </div>
    </form>
    <br />
    <p class="text-right text-gray" style="float:right">基于<a class="text-gray" target="_blank" href="#">MVC框架</a>构建</p>
</div>
</body>
</html><?php }
}
