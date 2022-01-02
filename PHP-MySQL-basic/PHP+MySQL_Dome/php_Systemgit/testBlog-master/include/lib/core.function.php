<?php

// 回到首页
function gotoHomePage()
{
    header('Location: index.php');
    exit;
}

/**
 * 去除文档中的html标记
 * @param  string $html 包含HTML代码的字符串
 * @return string       去除HTML后的纯文本
 */
function removeHTMLTags($html)
{
    // 匹配javascript标记及代码
    $scriptPattern = '/<[\s]*?script[^>]*?>[\s\S]*?<[\s]*?\/[\s]*?script[\s]*?>/';
    // 匹配css标记及代码
    $stylePattern  = '/<[\s]*?style[^>]*?>[\s\S]*?<[\s]*?\/[\s]*?style[\s]*?>/';
    // 匹配其他标记
    $pattern       = '/<[^>]+>/';
    
    $html = preg_replace($scriptPattern, '', $html);
    $html = preg_replace($stylePattern, '', $html);
    $planText = preg_replace($pattern, '', $html);

    return $planText;    
}


/**
 * 验证用户信息信息是否合法
 * @return null
 */
function verifyUserInfo($userInfo)
{
    $msg = new MsgController();

    // 用户名不合法
    if (!isValidUserName($userInfo['userName'])) {
        $msg->showMsg('用户名不合法');
    }
    // 用户名已存在
    $userModel = new UserModel();
    if ($userModel->getByName($userInfo['userName'])) {
        $msg->showMsg('该用户名已被占用，请换一个重新注册');
    }
    // Email地址不合法
    if (!isValidEmail($userInfo['email'])) {
        $msg->showMsg('请输入合法的Email地址');
    }
    // 两次输入密码不同
    if ($userInfo['password'] !== $userInfo['passwordAgain']) {
        $msg->showMsg('两次输入的密码不相同，请检查后再输');
    }
    // 验证组信息
    if (isset($userInfo['groupId'])) {
        $groupModel = new GroupModel();
        if (!$groupModel->getById($userInfo['groupId'])) {
            $msg->showMsg('无效的用户组');
        }
    }
}

// 验证是否为一个合法的用户名
function isValidUserName($name)
{
    // 字母和数字组成的1-16字符长度的字符串
    $pattern = '/^[[:alnum:]]{1,16}$/';
    return preg_match($pattern, $name);
}

// 验证是否为一个合法的电子邮箱
function isValidEmail($email)
{
    $pattern = '/^(([a-zA-Z]|[0-9])|([-]|[_]|[.]))+[@](([a-zA-Z0-9])|([-])){2,63}[.](([a-zA-Z0-9]){2,63})+$/';
    return preg_match($pattern, $email);
}