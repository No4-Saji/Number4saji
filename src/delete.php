<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>削除確認</title>
</head>

<body>
  <?php
  echo "本当に削除しますか？"
  ?>
  <form action='index.php' method='post'>
    <button type='submit' name='delete'>はい</button>
  </form>
  <div class=bc><button onclick="location.href='index.php'">いいえ</button></div>
  <?php


  if (isset($_POST['add'])) {
    try {
      $Dsn = "mysql:dbname=ToDoListSystem2;port=3306;host=host.docker.internal";
      $User = "root";
      $Password = "root";

      $Dbh = new PDO($Dsn, $User, $Password);

      $Stmt = $Dbh->prepare('DELETE FROM todolist2 WHERE Id = :Id');

      $Stmt->execute(array(':Id' => $_GET["Id"]));

      echo "削除しました。";
    } catch (Exception $e) {
      echo 'エラーが発生しました。:' . $e->getMessage();
    }
  }
  ?>
  <p>
    <a href="index.php">投稿一覧へ</a>
  </p>
</body>

</html>