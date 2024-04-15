<?php
class Db
{
  // PODインタンス
  private $pdo;

  /**
   * コンストラクタ
   */
  public function __construct()
  {
    $ini = parse_ini_file("private/config.ini", true);
    $dbname = $ini['dbname'];
    $port = $ini['port'];
    $host = $ini['host'];
    $dsn = "mysql:dbname=" . $dbname . "; port=" . $port . "; host=" . $host . ";";
    $user = $ini['user'];
    $password = $ini['password'];


    try {
      $this->pdo = new PDO($dsn, $user, $password,);
    } catch (PDOException $error) {
      echo "接続失敗:" . $error->getMessage();
      die();
    }
  }

  /**
   * select文実行
   */
  public function selectAll($sql, $params = null)
  {
    try {
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($params);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      print("データベースの接続に失敗しました" . $e->getMessage());
      die();
    }
  }
  public function select($sql, $params = null)
  {
    try {
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($params);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      print("データベースの接続に失敗しました" . $e->getMessage());
      die();
    }
  }
  /**
   * insert文実行
   */
  public function insert($sql, $params)
  {
    $this->write($sql, $params);
  }

  /**
   * update文実行
   */
  public function update($sql, $params)
  {
    $this->write($sql, $params);
  }

  /**
   * delete文実行
   */
  public function delete($sql, $params)
  {
    $this->write($sql, $params);
  }

  /**
   * 書き込み処理
   */
  private function write($sql, $params)
  {
    try {
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($params);
    } catch (PDOException $e) {
      print("データベースの接続に失敗しました" . $e->getMessage());
      die();
    }
  }
}
