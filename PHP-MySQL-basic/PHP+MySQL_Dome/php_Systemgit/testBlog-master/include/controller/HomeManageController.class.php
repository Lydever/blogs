<?php
class HomeManageController extends ManageController
{
    public function displayAction()
    {
        // 默认显示页面为管理文章页面
        header("Location:index.php?c=PostManage&a=display");
    }
}