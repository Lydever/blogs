<?php
// 开发阶段开启错误报告
ini_set('display_errors', 1);
error_reporting(E_ALL);




require_once 'config.php';
include_once INCLUDE_DIR . 'lib' . DS . 'core.function.php';


session_start();


///////////
// 自动加载类 //
///////////
function __autoload($className)
{
    $suffix = '.class.php';
    if (file_exists(CONTROLLER_DIR . $className . $suffix)) {
        include_once CONTROLLER_DIR . $className . $suffix;
    } elseif (file_exists(MODEL_DIR . $className. $suffix)) {
        include_once MODEL_DIR . $className. $suffix;
    } elseif (file_exists(LIB_DIR . $className . $suffix)) {
        include_once LIB_DIR . $className. $suffix;
    } else {
        $msg = new MsgController();
        $msg->show404();
    }
}

//////////
// 请求分发 //
//////////
define('DEFALUT_CONTROLLER', 'Home');
define('DEFAULT_ACTION', 'display');

$c = isset($_REQUEST['c']) ? $_REQUEST['c'] : DEFALUT_CONTROLLER;
$a = isset($_REQUEST['a']) ? $_REQUEST['a'] : DEFAULT_ACTION;

$className = $c . 'Controller';
$controller = new $className;

$methodName = $a . 'Action';
$methodName = method_exists($controller, $methodName) ? $methodName : DEFAULT_ACTION . 'Action';

$controller->$methodName();