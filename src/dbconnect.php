<?php

class DBconnect
{
  public $Dbh;
  public $Dsn;
  public $User;
  public $Password;
  public function __construct()
  {
    $ini = parse_ini_file("dbinfo.ini", true);
    $dbname = $ini['dbname'];
    $port = $ini['port'];
    $host = $ini['host'];
    $this->Dsn = "mysql:dbname=" . $dbname . "; port=" . $port . "; host=" . $host . ";";
    $this->User = $ini['User'];
    $this->Password = $ini['Password'];
  }

  public function connect()
  {
    //DBへの接続
    try {
      $Dbh = new PDO($this->Dsn, $this->User, $this->Password);
      return $Dbh;
    } catch (PDOException $Error) {
      echo "接続失敗:" . $Error->getMessage();
      die();
    }
  }
}
