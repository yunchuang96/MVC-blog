<?php

/**
 * 前台文章管理控制器
 */
class ArticleController extends PlatController {
    /**
     * 栏目首页动作
     */
    public function indexAction() {
        // 接收栏目编号(主类别编号)
        $cate_id = $_GET['cate_id'];
        // 获取该栏目(主类别)下所有的文章信息
        $article = Factory::M('ArticleModel');
        $artInfo = $article->getArtInfo($cate_id);
        // 分配变量
        $this->assign('artInfo', $artInfo);
        // 以下代码与分页有关
        // 获取该分类下所有文章的总记录数
        $rowCount = $article->getRowCount($cate_id);
        $displaymaxnum=$GLOBALS['conf']['Page']['displaymaxnum'];
        $url = "index.php?p=Home&c=Article&a=index&cate_id=$cate_id&";
        // 实例化分页类
        $page = new Page(9, $displaymaxnum, $rowCount, $url);
        
        // 获取页码字符串
        $strPage = $page->getPage();

        // echo $strPage;
        // exit;

        // 分配页码字符串
        $this->assign('strPage', $strPage);
        // 分页到此结束
        // 调用公共动作
        $this->PublicAction($cate_id);
        // 加载视图文件
        $this->display('index.html');
    }
    /**
     * 公共动作
     */
    private function PublicAction($cate_id) {
        // 获取当前类别的一层子类别的信息
        $category = Factory::M('CategoryModel');
        $subCate = $category->getSubCateByPid($cate_id);
        // 分配变量
        $this->assign('subCate', $subCate);
        // 获取面包屑导航数组信息
        $article = Factory::M('ArticleModel');
        $list = $article->getAllCateName($cate_id);
        // 分配变量
        $this->assign('list', $list);
        // 获取当前分类下点击排行文章
        $sortByHits = $article->getSortByHits($cate_id, 9);
        $this->assign('sortByHits', $sortByHits);
        // 获取当前分类下推荐文章
        $sortByRecommend = $article->getSortByRecommend($cate_id, 9);


        $this->assign('sortByRecommend', $sortByRecommend);
    }

    
    /**
     * 显示文章内容页动作
     */
    public function showAction() {
        // 接收当前文章的id号
        $art_id = $_GET['art_id'];
        // 调用模型,提取当前文章的信息
        $article = Factory::M('ArticleModel');
        // 在获取文章信息之前更新浏览次数
        $article->updateHitsById($art_id);
        // 通过id号获取文章信息
        $artInfoById = $article->getArtInfoById($art_id);
        // 分配变量
        $this->assign('artInfoById', $artInfoById);
        // 获取当前文章的ID号
        $cate_id = $artInfoById['cate_id'];
        // 调用公共动作
        $this->PublicAction($cate_id);
        // 获取文章的上一篇与下一篇信息
        $prev = $article->getPrevArt($art_id, $cate_id);
        $next = $article->getNextArt($art_id, $cate_id);
        $this->assign('prev', $prev);
        $this->assign('next', $next);
        // 以下代码与分页有关
        $rowsPerPage = 5;
        $displaymaxnum=$GLOBALS['conf']['Page']['displaymaxnum'];
        $url = "index.php?p=Home&c=Article&a=show&art_id=$art_id&";
        $comment = Factory::M('CommentModel');
        $rowCount = $comment->getRowCountById($art_id);

        //实例化分类页
        $page = new Page($rowsPerPage,$displaymaxnum,$rowCount, $url);
    
        $strPage = $page->getPage();
        // 分配页码字符串
        $this->assign('strPage', $strPage);
        // 分页到此结束
        // 提取当前页所有评论
        $cmtInfos = $comment->getCmtInfosById($art_id, $rowsPerPage);

        // var_dump($cmtInfos);
        // exit;
        // // 分配变量
        $this->assign('cmtInfos', $cmtInfos);
        $this->assign('reply_nums',$rowCount);
        // 输出视图
        $this->display('show.html');
    }
    /**
     * 处理评论动作
     */
    public function commentAction() {
    
        // 接收数据
        $cmtInfo = array();
        $cmtInfo['art_id'] = $_POST['art_id'];

        $cmt_content = $this->escapeData($_POST['content']);
        if(empty($cmt_content)) {
            $this->xiaoxi('内容不能为空',"index.php?p=Home&c=Article&a=show&art_id={$cmtInfo['art_id']}");
        }
        $cmtInfo['cmt_user'] = $this->escapeData($_POST['cmt_user']);
        $cmtInfo['cmt_content'] = $cmt_content;
        $cmtInfo['cmt_time'] = time();

        // 调用模型,入库
        $comment = Factory::M('CommentModel');
        if($comment->insertComment($cmtInfo)) {
            // 给当前文章的评论数加1
            $article = Factory::M('ArticleModel');
            $article->updateReplyNumsById($cmtInfo['art_id']);
            // 跳转到该文章的内容页
            $this->xiaoxi('发布成功',"index.php?p=Home&c=Article&a=show&art_id={$cmtInfo['art_id']}");
        }else {
            $this->xiaoxi('发生未知错误,发布失败',"index.php?p=Home&c=Article&a=show&art_id={$cmtInfo['art_id']}");
        }
    }
}

