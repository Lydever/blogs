<?php
// 基础模型类
abstract class Model
{
    protected $pdo;

    public function __construct()
    {
        $this->connectDB();
    }

    // 连接数据库
    private function connectDB()
    {
        $dns = sprintf('mysql:host=%s;port=%s;dbname=%s;unix_socket=%s;charset=%s',
                $GLOBALS['settings']['dbHost'],
                $GLOBALS['settings']['dbPort'],
                $GLOBALS['settings']['dbName'],
                $GLOBALS['settings']['dbSocket'],
                $GLOBALS['settings']['dbCharset']
            );
        try {
            $this->pdo = new PDO($dns, $GLOBALS['settings']['dbUser'], $GLOBALS['settings']['dbPass']);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            exit;
        }        
    }

}