<?php
class GroupModel extends Model
{

    /**
     * 根据组id获取组信息
     * @param  integer $id 组id
     * @return array       包含组信息的数组
     */
    public function getById($id)
    {
        $sql = 'SELECT * FROM groups WHERE id = :id';
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            $groupInfo = $sth->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $groupInfo;
    }
    

    /**
     * 根据组名获取组id
     * @param  string  $name 组名
     * @return integer       组id
     */
    public function getIdByName($name)
    {
        $sql = 'SELECT id FROM groups WHERE name = :name';
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':name', $name, PDO::PARAM_STR);
            $sth->execute();
            $id = $sth->fetch(PDO::FETCH_ASSOC)['id'];
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $id;
    }

    /**
     * 获取所有用户组全部信息
     * @return array  包含所有用户组信息的二维数组，长度为用户组总数量
     */
    public function getAll()
    {
        $sql = 'SELECT * FROM groups';
        try {
            $groups = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $groups;
    }
}