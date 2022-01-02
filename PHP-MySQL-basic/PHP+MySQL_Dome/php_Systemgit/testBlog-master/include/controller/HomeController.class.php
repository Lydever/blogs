<?php
// 前台主页管理器
class HomeController extends FrontController
{
    protected $previewNum = 4;
    protected $previewLength = 70;
    
   
    // 显示首页
    public function displayAction()
    {    
        $pageModel = new PageModel();
        $pages = $pageModel->getLatest($this->previewNum);
        
        // 对预览内容做长度限制
        $previews = array_filter($pages, function(&$page){
            $plainText = removeHTMLTags($page['content']);
            $page['content'] = mb_substr($plainText, 0, $this->previewLength, ENCODING) . '…';
            return $page;
        });

        include_once TEMPLATE_DIR . 'home.tpl.html';
    }
}