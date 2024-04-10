<!DOCTYPE html>
<html>
<!--削除を反映させる-->

<head>
  <meta charset="utf-8">
  <title>削除完了</title>
</head>

<body>
  <?php
  // //DBへ接続する。
  require('dbconnect.php');

  //DB削除
  try {
    $Stmt = $Dbh->prepare('DELETE FROM todolist2 WHERE Id = :Id');
    $Stmt->execute(array(':Id' => $_GET["Id"]));
    echo "削除しました。";
  } catch (Exception $e) {
    echo 'エラーが発生しました。:' . $e->getMessage();
  }
  ?>
  <div class=bc><button onclick="location.href='todolist.php'">リストへ戻る</button></div>
</body>

</html>