<?php
class UserModel extends Model
{

    /**
     * 添加用户
     * @param  array  $userInfo 包含用户所有信息的数组
     * @return boolean          是否添加成功
     */
    public function add($userInfo)
    {
        // var_dump($userInfo);
        $sql = 'INSERT INTO users
                (name, email, pass, groupId) VALUES
                (:name, :email, :pass, :groupId)';
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':name', $userInfo['userName'], PDO::PARAM_STR);
            $sth->bindValue(':email', $userInfo['email'], PDO::PARAM_STR);
            $sth->bindValue(':pass', $userInfo['password'], PDO::PARAM_STR);
            $sth->bindValue(':groupId', $userInfo['groupId'], PDO::PARAM_INT);
            return $sth->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * 根据用户id获取用户所有信息
     * @param  int $id     用户id
     * @return array       包含用户所用信息的数组
     * @return bool        false 当没有找到对应用户名的信息时
     */
    public function getById($id)
    {
        $sql = 'SELECT * FROM users WHERE available = TRUE AND id = :id';

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            $userInfo = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

        return $userInfo;        
    }


    /**
     * 根据用户名获取用户所有信息
     * @param  int $name   用户名
     * @return array       包含用户所用信息的数组
     * @return bool        false 当没有找到对应用户名的信息时
     */
    public function getByName($name)
    {
        $sql = 'SELECT * FROM users WHERE available = TRUE AND name = :name';

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':name', $name, PDO::PARAM_INT);
            $sth->execute();
            $userInfo = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

        return $userInfo;
    }


    /**
     * 获取用户总数
     * @return integer  用户总数量
     */
    public function countTotal()
    {
        $sql = 'SELECT COUNT(id) FROM users WHERE available = TRUE';
        return $this->pdo->query($sql)->fetch()[0];
    }

    /**
     * 根据用户id获取权限信息
     * @param  int    $id 用户id
     * @return array      包含用户权限信息的数组，userId, groupName, ManagePage, manageUser, manageCommit
     */
    public function getAuthorityByUserId($id)
    {
        $sql = 'SELECT users.id AS userId, groups.name AS groupName, 
                groups.managePage, groups.manageUser, groups.manageCommit,
                (groups.managePage OR groups.manageUser OR groups.manageCommit) AS canManage
                FROM users JOIN groups ON users.groupId = groups.id
                WHERE users.available = TRUE AND users.id = :id';

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            $userAuthority = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

        return $userAuthority;
    }


    /**
     * 按照添加时间，倒叙获取最新的几个用户
     * @param  integer $num   获取的用户数量
     * @param  integer $start 从第几个开始
     * @return array          包含用户信息的二维数组，数组最大长度为$num
     */
    public function getLatest($num, $start = 0)
    {
        $sql = 'SELECT users.id, users.name, users.email, users.addDate, 
                users.available, groups.name AS groupName
                FROM users JOIN groups ON users.groupId = groups.id
                WHERE users.available = TRUE
                ORDER BY users.addDate DESC
                LIMIT :start, :num';
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':start', $start, PDO::PARAM_INT);
            $sth->bindValue(':num', $num, PDO::PARAM_INT);
            $sth->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * 按照id修改指定的用户信息
     * @param  array    $userInfo  包含用户信息的数组，包括用户名，邮箱，组名
     * @param  integer  $id        待修改用户的id
     * @return bool                成功与否
     */
    public function updateById($userInfo, $id)
    {
        $sql = 'UPDATE users SET
                users.name            = :name,
                users.email           = :email,
                users.groupId         = (SELECT id FROM groups WHERE name = :groupName)
                WHERE users.available = TRUE
                AND   users.id        = :id';
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':name', $userInfo['name'], PDO::PARAM_STR);
            $sth->bindValue(':email', $userInfo['email'], PDO::PARAM_STR);
            $sth->bindValue(':groupName', $userInfo['groupName'], PDO::PARAM_STR);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            return $sth->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * 删除用户
     *   （实际上是将available字段设置为FALSE，并没有真正删除）
     * @param  integer $id 用户id
     * @return bool        成功与否
     */
    public function removeById($id){
        $sql = 'UPDATE users SET available = FALSE WHERE id = :id';
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            return $sth->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }


}