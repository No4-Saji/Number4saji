<?php
$ini = parse_ini_file('dbinfo.ini');
$dbname = $ini['dbname'];
$port = $ini['port'];
$host = $ini['host'];
$Dsn = "mysql:dbname=" . $dbname . "; port=" . $port . "; host=" . $host . ";";
$User = $ini['User'];
$Password = $ini['Password'];

//DBへの接続
try {
  $Dbh = new PDO($Dsn, $User, $Password);
} catch (PDOException $Error) {
  echo "接続失敗:" . $Error->getMessage();
  die();
}
