<?php
// 归档管理器
class ArchiveController extends FrontController
{
    protected $currentPageNum;
    protected $totalHeader;
    protected $headerPerPage;

    public function __construct()
    {
        parent::__construct();

        // 获取总的文章记录数
        $pageModel = new PageModel();
        $this->totalHeader = $pageModel->countTotal();

        // 从配置中读取每页显示多少文章
        $this->headerPerPage = $GLOBALS['settings']['recordPerPage'];
    }


    // 显示归档文章标题
    public function displayAction()
    {
        $this->currentPageNum = Pagination::getCurrentPageNum();

        $pageModel = new PageModel();
        $start = ($this->currentPageNum - 1) * $this->headerPerPage;
        $headers = $pageModel->getLatestHeaders($this->headerPerPage, $start);

        $pagination = Pagination::getPagination($this->currentPageNum, $this->headerPerPage, $this->totalHeader, $GLOBALS['settings']['visiblePageNum']);

        include_once TEMPLATE_DIR . 'archive.tpl.html';
    }
}