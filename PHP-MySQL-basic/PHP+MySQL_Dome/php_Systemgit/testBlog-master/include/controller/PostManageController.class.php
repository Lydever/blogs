<?php
// 后台文章管理类
class PostManageController extends ManageController
{

    protected $currentPageNum;
    protected $totalPost;
    protected $postPerPage;



    public function __construct()
    {
        parent::__construct();

        // 验证是否可以管理文章
        if (!$this->userAuthority['managePage']) {
            $msg = new MsgController();
            $msg->show404();
        }

        // 获取总的文章记录数
        $pageModel = new PageModel();
        $this->totalPost = $pageModel->countTotal();

        // 从配置中读取每页显示多少文章
        $this->postPerPage = $GLOBALS['settings']['recordPerPage'];
    }



    // 显示管理文章页面，包括最新文章的标题等信息
    public function displayAction()
    {
        $this->currentPageNum = Pagination::getCurrentPageNum();

        $pageModel = new PageModel();
        $start = ($this->currentPageNum - 1) * $this->postPerPage;
        $pages = $pageModel->getLatest($this->postPerPage, $start);

        // 摘要部分，去除HTML标签并截取前20个字符
        $pages = array_filter($pages, function(&$page){
            $plainText = removeHTMLTags($page['content']);
            $page['abstract'] = mb_substr($plainText, 0, 20, ENCODING) . '…';
            return $page;
        });
    
        $pagination = Pagination::getPagination($this->currentPageNum, $this->postPerPage, $this->totalPost, $GLOBALS['settings']['visiblePageNum']);

        include_once TEMPLATE_DIR . 'postManage.tpl.html';
    }



    // 进入编辑文章页面
    public function displayEditAction()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            // 编辑已有文章
            $id = $_GET['id'];
            $pageModel = new PageModel();
            $page = $pageModel->getById($id);
            include_once TEMPLATE_DIR . 'editPost.tpl.html';
        } else {
            // 添加新文章
            include_once TEMPLATE_DIR . 'addPost.tpl.html';
        }
    }


    // 添加文章
    public function addPostAction()
    {
        if (isset($_POST['title']) && $_POST['title'] &&
            isset($_POST['content']) && $_POST['content']) {

            // 处理文章标题
            $postInfo['title'] = htmlentities($_POST['title'], ENT_QUOTES);

            $postInfo['contentMD'] = $_POST['content'];

            // 将文章内容从markdown转换为html 
            $parsedown = new Parsedown();
            $postInfo['content'] = $parsedown->text($_POST['content']);

            // 文章作者
            $postInfo['authorId'] = $this->userInfo['id'];

            $pageModel = new PageModel();
            if ($pageModel->insert($postInfo)) {
                // 添加文章成功
                header("Location:index.php?c=PostManage&a=display");
            } else {
                // 添加文章失败
                $msg = new MsgController();
                $msg->showMsg('添加文章失败，数据库错误');
            }
        } else {
            // 添加文章失败
            $msg = new MsgController();
            $msg->showMsg('添加文章失败，请确认文章标题和内容不为空！');
        }   
    }


    // 编辑文章
    public function editPostAction()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id']) &&
            isset($_POST['title']) && $_POST['title'] &&
            isset($_POST['content']) && $_POST['content']) {

            $postInfo['id'] = $_GET['id'];

            // 处理文章标题
            $postInfo['title'] = htmlentities($_POST['title'], ENT_QUOTES);

            $postInfo['contentMD'] = $_POST['content'];

            // 将文章内容从markdown转换为html 
            $parsedown = new Parsedown();
            $postInfo['content'] = $parsedown->text($_POST['content']);

            $pageModel = new PageModel();
            if ($pageModel->updateTitleAndContentById($postInfo, $postInfo['id'])) {
                header("Location:index.php?c=PostManage&a=display");
            } else {
                // 编辑文章失败
                $msg = new MsgController();
                $msg->showMsg('编辑文章失败，数据库错误');
            }
        } else {
            // 添加文章失败
            $msg = new MsgController();
            $msg->showMsg('编辑文章失败，请确认文章标题和内容不为空！');
        }
    }

    // 删除文章
    public function removePostAction()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $pageModel = new PageModel();
            if ($pageModel->removeById($_GET['id'])) {
                header("Location:index.php?c=PostManage&a=display");
            } else {
                $msg = new MsgController();
                $msg->showMsg('删除文章失败');
            }
        } else {
            $msg = new MsgController();
            $msg->show404();
        }
    }
}