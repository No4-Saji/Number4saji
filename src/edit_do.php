<?php
require('private/ToDoList2Dao.php');
//　パラメータを各変数に格納
$title = $_POST['Title'];
$mes = $_POST['Mes'];
$document = $_POST['Doc'];
$editDate = date("Y-m-d H:i:s");
$id = $_GET["Id"];

//　編集するクラス関数呼び出し
$todoList2Dao = new ToDoList2Dao();
$todoList2Dao->edit($mes, $title, $document, $editDate);

echo "情報を更新しました。";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>更新完了</title>
  <link rel="stylesheet" href="./style.css" type="text/css">
</head>

<body style="background-color:#fff3b8">
  <p>
    <a class=button href="index.php">投稿一覧へ</a>
  </p>
</body>

</html>