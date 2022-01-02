
<?php
// 后台管理器
abstract class ManageController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        // 验证是否可以进入后台
        if (!$this->userAuthority['canManage']) {
            $msg = new MsgController();
            $msg->show404();
        }
    }
}