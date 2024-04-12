<?php
// DBへ接続する。
require('./private/dbconnect.php');
$dbConnector = new Db();
$dbh = $dbConnector->connect();

// DB削除
try {
  $stmt = $dbh->prepare('DELETE FROM todolist2 WHERE Id = :Id');
  $stmt->execute(array(':Id' => $_GET["Id"]));
  echo "削除しました。";
} catch (Exception $e) {
  echo 'エラーが発生しました。:' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>削除完了</title>
  <link rel="stylesheet" href="./style.css" type="text/css">
</head>

<body>
  <div class=bc><a class="button" href="./todolist.php">リストへ</a></div>
</body>

</html>