<?php
////////////
// 定义路径常量 //
////////////
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', dirname(dirname(__FILE__)) . DS);
define('INCLUDE_DIR', ROOT_DIR . 'include' . DS);
define('CONTROLLER_DIR', INCLUDE_DIR . 'controller' .DS);
define('MODEL_DIR', INCLUDE_DIR . 'model' . DS);
define('LIB_DIR', INCLUDE_DIR . 'lib' . DS);
define('TEMPLATE_DIR', ROOT_DIR . 'template' . DS);


// 其他常量
define('ENCODING', 'UTF-8');

////////////
// 定义配置变量 //
////////////

$settings = [

    // 数据库连接相关变量
    'dbHost'    => '127.0.0.1',
    'dbPort'    => '3306',
    'dbName'    => 'testBlog',
    'dbSocket'  => '/tmp/mysqld.sock',
    'dbCharset' => 'utf8',
    'dbUser'    => '',
    'dbPass'    => '',

    // 分页相关变量
    'recordPerPage'  => 10,
    'visiblePageNum' => 5
    
];