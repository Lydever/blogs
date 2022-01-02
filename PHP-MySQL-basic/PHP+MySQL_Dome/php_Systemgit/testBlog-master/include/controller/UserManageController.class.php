<?php
// 后台用户管理
class UserManageController extends ManageController
{
    protected $currentPageNum;
    protected $totalUsers;
    protected $usersPerPage;


    public function __construct()
    {
        parent::__construct();

        // 验证是否可以管理用户
        if (!$this->userAuthority['manageUser']) {
            $msg = new MsgController();
            $msg->show404();
        }

        // 获取总的用户数
        $userModel = new UserModel();
        $this->totalUsers = $userModel->countTotal();

        // 从配置中读取每页显示多少用户
        $this->usersPerPage = $GLOBALS['settings']['recordPerPage'];
    }


    // 展示用户管理界面
    public function displayAction()
    {
        $this->currentPageNum = Pagination::getCurrentPageNum();

        $userModel = new UserModel();
        $start = ($this->currentPageNum - 1) * $this->usersPerPage;
        $users = $userModel->getLatest($this->usersPerPage, $start);

    
        $pagination = Pagination::getPagination($this->currentPageNum, 
                                                $this->usersPerPage, 
                                                $this->totalUsers, 
                                                $GLOBALS['settings']['visiblePageNum']);

        include_once TEMPLATE_DIR . 'userManage.tpl.html';
    }

    // 展示添加用户界面
    public function displayAddAction()
    {
        $groupModel = new GroupModel();
        $groups = $groupModel->getAll();
        include_once TEMPLATE_DIR . 'addUser.tpl.html';
    }

    // 添加用户
    public function addUserAction()
    {
        if (isset($_POST)) {
            // 验证用户信息合法性
            verifyUserInfo($_POST);

            $userInfo = $_POST;
            $userInfo['password'] = sha1($_POST['password']);

            $userModel = new UserModel();

            if ($userModel->add($userInfo)) {
                // 添加成功
                header('Location:index.php?c=UserManage&a=display');
            } else {
                $msg = new MsgController();
                $msg->showMsg('添加用户失败');
            }
        } else {
            $msg = new MsgController();
            $msg->show404();
        }
    }

    // 修改用户信息
    public function editAction()
    {
        if (isset($_POST)) {
            
            if (is_numeric($_POST['id']) &&
                isValidUserName($_POST['name']) &&
                isValidEmail($_POST['email'])
                /*isValidGroupName($_POST['groupName'])*/) {

                $userModel = new UserModel();
                if ($userModel->updateById($_POST, $_POST['id'])) {
                    header('Location:index.php?c=UserManage&a=display');
                } else {
                    $msg = new MsgController();
                    $msg->showMsg('修改信息失败');
                }

            } else {
                $msg = new MsgController();
                $msg->showMsg('输入的用户信息不正确，请重新输入');
            }

        } else {
            $msg = new MsgController();
            $msg->show404();
        }
    }

    // 删除用户信息
    public function removeAction()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $userModel = new UserModel();
            if ($userModel->removeById($_GET['id'])) {
                header("Location:index.php?c=UserManage&a=display");
            } else {
                $msg = new MsgController();
                $msg->showMsg('删除用户失败');
            }
        } else {
            $msg = new MsgController();
            $msg->show404();
        }
    }
}