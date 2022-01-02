<?php
class PageModel extends Model
{

    /**
     * 通过ID号获取指定文章
     * @param  integer $id 文章id
     * @return bool     false
     * @return array    包含了文章信息的关联数组
     */
    public function getById($id)
    {
        $sql = 'SELECT pages.*, users.name AS author
                FROM pages JOIN users ON pages.authorId = users.id
                WHERE pages.id = :id';
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $sth->fetch(PDO::FETCH_ASSOC);
    }



    /**
     * 按照添加时间倒序，从某篇文章开始，获取最新的几篇文章
     * @param  integer $num    文章篇数，数值不会太大
     * @param  integer $start  从第几篇文章开始获取，默认为0
     * @return array           一个包含了文章信息的二维数组，长度为文章篇数    
     */
    public function getLatest($num, $start = 0)
    {
        $sql = 'SELECT pages.*, users.name AS author
                FROM pages JOIN users ON pages.authorId = users.id
                ORDER BY pages.addDate DESC, pages.updateDate DESC
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
     * 按照添加时间倒序，从某篇文章开始，获取最新的几篇文章的头信息，不包含内容
     * @param  integer $num    文章篇数，数值不会太大
     * @param  integer $start  从第几篇文章开始获取，默认为0
     * @return array           一个包含了文章信息的二维数组，长度为文章篇数    
     */
    public function getLatestHeaders($num, $start = 0)
    {
        $sql = 'SELECT pages.id, pages.title, pages.addDate, pages.updateDate, users.name AS author
                FROM pages JOIN users ON pages.authorId = users.id
                ORDER BY pages.addDate DESC, pages.updateDate DESC
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
     * 获取文章总数
     * @return int 文章数量
     */
    public function countTotal()
    {
        $sql = 'SELECT COUNT(id) FROM pages';
        return $this->pdo->query($sql)->fetch()[0];
    }


    /**
     * 插入文章
     * @param  array  $pageInfo 包含标题，内容，Markdown格式内容以及作者id信息的数组
     * @return bool             是否成功
     */
    public function insert($pageInfo)
    {
        $sql = 'INSERT INTO pages (title, content, contentMD, authorId)
                VALUES (:title, :content, :contentMD, :authorId)';
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':title', $pageInfo['title'], PDO::PARAM_STR);
            $sth->bindValue(':content', $pageInfo['content'], PDO::PARAM_STR);
            $sth->bindValue(':contentMD', $pageInfo['contentMD'], PDO::PARAM_STR);
            $sth->bindValue(':authorId', $pageInfo['authorId'], PDO::PARAM_INT);
            return $sth->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;            
        }
    }


    /**
     * 根据id修改文章的标题与内容
     * @param  array   $pageInfo 包含标题，内容，markdown内容信息的数组
     * @param  integer $id       文章id
     * @return bool              是否成功
     */
    public function updateTitleAndContentById($pageInfo, $id) {
        $sql = 'UPDATE pages SET
                title      = :title,
                content    = :content,
                contentMD  = :contentMD,
                updateDate = DEFAULT
                WHERE id   = :id';
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue('title', $pageInfo['title'], PDO::PARAM_STR);
            $sth->bindValue('content', $pageInfo['content'], PDO::PARAM_STR);
            $sth->bindValue('contentMD', $pageInfo['contentMD'], PDO::PARAM_STR);
            $sth->bindValue('id', $id, PDO::PARAM_INT);
            return $sth->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }


    /**
     * 根据id删除指定文章
     * @param  integer $id 文章Id
     * @return bool        是否成功删除
     */
    public function removeById($id)
    {
        $sql = 'DELETE FROM pages WHERE id = :id';
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