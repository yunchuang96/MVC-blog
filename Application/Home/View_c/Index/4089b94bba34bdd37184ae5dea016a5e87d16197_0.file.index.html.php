<?php
/* Smarty version 3.1.29, created on 2017-04-17 17:05:00
  from "D:\xampp\htdocs\my_blog\Application\Home\VIEW\Index\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58f4d99c11ad23_24715174',
  'file_dependency' => 
  array (
    '4089b94bba34bdd37184ae5dea016a5e87d16197' => 
    array (
      0 => 'D:\\xampp\\htdocs\\my_blog\\Application\\Home\\VIEW\\Index\\index.html',
      1 => 1492441495,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f4d99c11ad23_24715174 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>云窗个人博客</title>
<meta name="keywords" content="个人博客,云窗个人博客,周洋老师个人博客,响应式" />
<meta name="description" content="个人博客,云窗个人博客,个人博客,响应式，神秘、俏皮。" />
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
  <header>
    <h1>蜗牛的家</h1>
    <h2>给我一个小小的家，蜗牛的家，能挡风遮雨的地方，不必太大...</h2>
    <div class="logo"><a href="/"></a></div>      
    <nav id="topnav"><a href="index.html">首页</a>
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
    <a href="index.php?p=Home&c=Index&a=index&cate_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_name'];?>
</a><?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
    <a href="about.html">关于我</a></nav>
  </header>
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
        <h3><a href="/">犯错了怎么办？</a></h3>
        <figure><img src="<?php echo @constant('IMAGES_PATH');?>
/01.jpg" ></figure>
        <ul>
          <p>看到昔日好友发了一篇日志《咎由自取》他说他是一个悲观者，感觉社会抛弃了他，脾气、性格在6年的时间里变化很大，很难适应这个社会。人生其实就是不断犯错的过程，在这个过程中不断的犯错，不断的吸取教训，不断的成长。也许日子里的惊涛骇浪，不过是人生中的水花摇晃，别用显微镜放大你的悲伤。</p>
          <a href="/" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：zhouyang</span><span>分类：【<a href="/">日记</a>】</span><span>浏览（<a href="/">459</a>）</span><span>评论（<a href="/">30</a>）</span></p>
        <div class="dateview">2014-04-08</div>
      </div>
      <div class="blogs">
        <h3><a href="/">个人博客模板</a></h3>
        <figure><img src="<?php echo @constant('IMAGES_PATH');?>
/02.jpg" ></figure>
        <ul>
          <p>2014第一版《草根寻梦》个人博客模板简单、优雅、稳重、大气、低调。专为年轻有志向却又低调的草根站长设计。模板采用html5+css3设计，nav导航实现鼠标悬停渐变显示英文标题的效果。banner部分，选择大图作为背景，利用css3中animation属性结合文字图片实现文字从左到右的渐变效果</p>
          <a href="/" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：zhouyang</span><span>分类：【<a href="/">个人博客模板</a>】</span><span>浏览（<a href="/">459</a>）</span><span>评论（<a href="/">30</a>）</span></p>
        <div class="dateview">2014-02-19</div>
      </div>
      <div class="blogs">
        <h3><a href="/">我的个人博客之——阿里云空间选择</a></h3>
        <figure><img src="<?php echo @constant('IMAGES_PATH');?>
/03.png" ></figure>
        <ul>
          <p>之前服务器放在电信机房， 联通用户访问速度很不稳定，经常出现访问速度慢的问题，换到阿里云解决了之前的问题。很多人都问我的博客选得什么空间，一年的费用得多少钱，今天我列个表出来，供大家参考。</p>
          <a href="/" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：zhouyang</span><span>分类：【<a href="/">网站建设</a>】</span><span>浏览（<a href="/">459</a>）</span><span>评论（<a href="/">30</a>）</span></p>
        <div class="dateview">2016-01-18</div>
      </div>
      <div class="blogs">
        <h3><a href="/">从摄影作品中获取网页颜色搭配技巧</a></h3>
        <figure><img src="<?php echo @constant('IMAGES_PATH');?>
/04.jpg" ></figure>
        <ul>
          <p>作为一个优秀、专业的网页设计师，首先要了解各种颜色的象征，以及不同类型网站常用的色彩搭配。色彩搭配看似复杂,但并不神秘。一般来说,网页的背景色应该柔和一些、素一些、淡一些,再配上深色的文字,使人看起来自然、舒畅。色彩是人的视觉最敏感的东西。主页的色彩处理得好，可以锦上添花，达到事半功倍的效果。</p>
          <a href="/" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：zhouyang</span><span>分类：【<a href="/">心得笔记</a>】</span><span>浏览（<a href="/">459</a>）</span><span>评论（<a href="/">30</a>）</span></p>
        <div class="dateview">2014-01-09</div>
      </div>
      <div class="blogs">
        <h3><a href="/">css3制作的一个魔方</a></h3>
        <figure><img src="<?php echo @constant('IMAGES_PATH');?>
/04.png" ></figure>
        <ul>
          本应用由CSS3代码实现，无图片和flash，请使用Chrome等webkit内核浏览器或Firefox打开。破解攻略和大家分享下：首先，破解魔方，我们就要先了解它的结构，魔方共6色6面，每面又分为中央块（最中间的块6个）、角块（4角的块8个）和边块（4条边中间的块12个）...
          </p>
          <a href="/" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor"><span>作者：zhouyang</span><span>分类：【<a href="/">css3</a>】</span><span>浏览（<a href="/">459</a>）</span><span>评论（<a href="/">30</a>）</span></p>
        <div class="dateview">2016-09-05</div>
      </div>
    </div>
  </article>
  <aside>
    <div class="avatar"><a href="about.html"><span>关于我</span></a></div>
    <div class="topspaceinfo">
      <h1>执子之手，与子偕老</h1>
      <p>于千万人之中，我遇见了我所遇见的人....</p>
    </div>
    <div class="about_c">
      <p>网名：云窗</p>
      <p>职业：PHP学生 </p>
      <p>籍贯：</p>
      <p>电话：13888888888</p>
      <p>邮箱：</p>
    </div>
    <div class="bdsharebuttonbox"><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
    <div class="tj_news">
      <h2>
        <p class="tj_t1">最新文章</p>
      </h2>
      <ul>
        <li><a href="/">犯错了怎么办？</a></li>
        <li><a href="/">两只蜗牛艰难又浪漫的一吻</a></li>
        <li><a href="/">春暖花开-走走停停-发现美</a></li>
        <li><a href="/">琰智国际-Nativ for Life官方网站</a></li>
        <li><a href="/">个人博客模板（2014草根寻梦）</a></li>
        <li><a href="/">简单手工纸玫瑰</a></li>
        <li><a href="/">响应式个人博客模板（蓝色清新）</a></li>
        <li><a href="/">蓝色政府（卫生计划生育局）网站</a></li>
      </ul>
      <h2>
        <p class="tj_t2">推荐文章</p>
      </h2>
      <ul>
        <li><a href="/">犯错了怎么办？</a></li>
        <li><a href="/">两只蜗牛艰难又浪漫的一吻</a></li>
        <li><a href="/">春暖花开-走走停停-发现美</a></li>
        <li><a href="/">琰智国际-Nativ for Life官方网站</a></li>
        <li><a href="/">个人博客模板（2014草根寻梦）</a></li>
        <li><a href="/">简单手工纸玫瑰</a></li>
        <li><a href="/">响应式个人博客模板（蓝色清新）</a></li>
        <li><a href="/">蓝色政府（卫生计划生育局）网站</a></li>
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
    <div class="copyright">
      <ul>
        <p> Design by <a href="/">云窗</a></p>
        <p>粤ICP备11002373号-1</p>
        </p>
      </ul>
    </div>
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
