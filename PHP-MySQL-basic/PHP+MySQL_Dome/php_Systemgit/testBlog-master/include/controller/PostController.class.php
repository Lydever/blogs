<?php
// 文章页面管理器
class PostController extends FrontController
{

    // 获取指定id文章
    public function getPostAction()
    {
        if (!isset($_REQUEST['id']) ||
             !is_numeric($_REQUEST['id'])) {
            gotoHomePage();
        }

        $id = $_REQUEST['id'];
        $pageModel = new PageModel();
        $page = $pageModel->getById($id);

        if (!$page) {
            $msg = new MsgController();
            $msg->show404();
        }

        include_once TEMPLATE_DIR . 'post.tpl.html';
    }
}