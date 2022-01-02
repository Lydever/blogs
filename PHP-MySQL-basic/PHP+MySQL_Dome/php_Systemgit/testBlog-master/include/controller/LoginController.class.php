<?php
// 登录页面管理器
class LoginController extends FrontController
{
    // 展示登录页面
    public function displayAction()
    {
        include_once TEMPLATE_DIR . 'login.tpl.html';
    }

    // 展示注册页面
    public function displayRegisterAction()
    {
        include_once TEMPLATE_DIR . 'register.tpl.html';
    }
    

    // 验证登录信息
    public function verifyAction()
    {
        $userName = $_POST['userName'];
        $password = sha1($_POST['password']);

        $userModel = new UserModel();
        $userInfo = $userModel->getByName($userName);

        if (!$userInfo ||$password != $userInfo['pass']) {
            $msg = new MsgController();
            $msg->showMsg('用户名或密码错误！');
        } else {
            $_SESSION = $userInfo;
            $_SESSION['isLogin'] = true;
            header("Location: index.php");
        }
    }

    // 注册信息
    public function registerAction()
    {
        if (isset($_POST)) {

            // 验证用户信息
            verifyUserInfo($_POST);

            $registerUser = $_POST;
            $registerUser['password'] = sha1($_POST['password']);

            $userModel = new UserModel();
            $groupModel = new GroupModel();
            $registerUser['groupId'] = $groupModel->getIdByName('visitor');

            if ($userModel->add($registerUser)) {
                $userInfo = $userModel->getByName($registerUser['userName']);
                $_SESSION = $userInfo;
                $_SESSION['isLogin'] = true;
                header("Location: index.php");            
            } else {
                $msg = new MsgController();
                $msg->showMsg('注册失败');
            }

        } else {
            $msg = new MsgController();
            $msg->show404();
        }
    }

    // 登出
    public function logoutAction()
    {
        $_SESSION = [];
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 42000);
        }
        session_destroy();
        header("Location: index.php");
    }

}