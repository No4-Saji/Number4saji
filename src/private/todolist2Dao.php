<?php
require("db.php");

class ToDoList2Dao
{
    private $db;
    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->db = new Db();
    }

    /**
     * ToDoリスト全件取得
     */
    public function findAll()
    {
        $sql = "SELECT * FROM todolist2";
        return $this->db->selectAll($sql);
    }

    /**
     * ToDoリストからID指定で1件取得
     */
    public function findById($id)
    {
        $sql = "SELECT * FROM todolist2 WHERE Id = :Id";
        $params = array(':Id' => $id);
        return $this->db->select($sql, $params);
    }

    /**
     * ToDoリストにデータ追加
     * 
     * @param string $title タイトル
     * @param string $text テキスト
     * @param string $created 登録日時
     */
    public function insert($title, $document, $newDate)
    {
        $sql = "INSERT INTO todolist2 (Title, Doc, NewDate) VALUES (:Title, :Doc, :NewDate)";
        $params = array(':Title' => $title, ':Doc' => $document, ':NewDate' => $newDate);
        $this->db->insert($sql, $params);
    }

    /** 
     * todolistからデータを削除
     */
    public function delete($id)
    {
        $sql = "DELETE FROM todolist2 WHERE Id = :Id";
        $params = array(':Id' => $id);
        $this->db->delete($sql, $params);
    }

    public function edit($mes, $title, $document, $editDate)
    {
        $sql = "UPDATE todolist2 SET mes = :mes, title = :title, doc = :doc, editDate = :editDate WHERE Id = :Id";
        $params = array(':mes' => $mes, ':title' => $title, ':doc' => $document, ':Id' => $_POST['Id'], ':editDate' => $editDate);
        $this->db->update($sql, $params);
    }
}
