<?php
// DBへ接続する。
require('private/todolist2Dao.php');
$id = $_GET["Id"];
$todolist2Dao = new todolist2Dao();
$todolist2Dao->delete($id);

echo "削除しました。";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>削除完了</title>
  <link rel="stylesheet" href="./style.css" type="text/css">
</head>

<body style="background-color:#fff3b8">
  <div class=bc><a class="button" href="./index.php">リストへ</a></div>
</body>

</html>