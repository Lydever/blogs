<?php
// 总控制器
abstract class Controller
{

    protected $isLogin;
    protected $userInfo;
    protected $userAuthority;



    public function __construct()
    {
        $this->verifyAuthority();
    }



    // 验证用户各种权限
    private function verifyAuthority()
    {
        if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] && isset($_SESSION['id'])) {
            // 用户已登录，验证权限
            $this->isLogin = true;
            $userModel = new userModel();
            $this->userInfo = $userModel->getById($_SESSION['id']);
            $this->userAuthority = $userModel->getAuthorityByUserId($_SESSION['id']);
        } else {
            // 用户未登录
            $this->isLogin = false;
        }    
    }


}