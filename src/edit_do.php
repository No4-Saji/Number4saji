<?php
try {
  //カラムの変数への格納
  $title = $_POST['Title'];
  $mes = $_POST['Mes'];
  $document = $_POST['Doc'];
  $editDate = date("Y-m-d H:i:s");

  //DB接続
  require('./private/dbconnect.php');
  $dbConnector = new Db();
  $dbh = $dbConnector->connect();

  //SQLインジェクション対策（バインドバリュー）
  $stmt = $dbh->prepare('UPDATE todolist2 SET mes = :mes, title = :title, doc = :doc, editDate = :editDate WHERE Id = :Id');
  $stmt->execute(array(':mes' => $mes, ':title' => $title, ':doc' => $document, ':Id' => $_POST['Id'], ':editDate' => $editDate));

  echo "情報を更新しました。";
} catch (Exception $e) {
  echo 'エラーが発生しました。:' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>更新完了</title>
  <link rel="stylesheet" href="./style.css" type="text/css">
</head>

<body>
  <p>
    <a class=button href="todolist.php">投稿一覧へ</a>
  </p>
</body>

</html>