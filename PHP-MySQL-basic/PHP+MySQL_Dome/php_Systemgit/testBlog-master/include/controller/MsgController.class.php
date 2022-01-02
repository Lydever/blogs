<?php 
class MsgController extends Controller
{

    // 显示系统信息
    public function showMsg($message, $url = 'javascript:history.back(-1);')
    {
        include TEMPLATE_DIR . 'msg.tpl.html';
        exit;
    }

    // 显示404错误页面
    public function show404()
    {
        header('HTTP/1.1 404 Not Found');
        include TEMPLATE_DIR . '404.tpl.html';
        exit;
    }

}