<?php

class Db
{
  public $dbh;
  public $dsn;
  public $user;
  public $password;

  public function __construct()
  {
    $ini = parse_ini_file("config.ini", true);
    $dbname = $ini['dbname'];
    $port = $ini['port'];
    $host = $ini['host'];
    $this->dsn = "mysql:dbname=" . $dbname . "; port=" . $port . "; host=" . $host . ";";
    $this->user = $ini['user'];
    $this->password = $ini['password'];
  }

  public function connect()
  {
    //DBへの接続
    try {
      $dbh = new PDO($this->dsn, $this->user, $this->password);
      return $dbh;
    } catch (PDOException $error) {
      echo "接続失敗:" . $error->getMessage();
      die();
    }
  }
}
