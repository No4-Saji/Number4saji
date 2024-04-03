<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>削除完了</title>
</head>
<body> 
  <?php
    try {
      $Dsn = "mysql:dbname=todolistsystem;port=3306;host=host.docker.internal";
      $User = "root";
      $Password = "root";

      $Dbh = new PDO($Dsn, $User, $Password);

      $Stmt = $Dbh->prepare('DELETE FROM todolist WHERE Id = :Id');

      $Stmt->execute(array(':Id' => $_GET["Id"]));

      echo "削除しました。";

    } catch (Exception $e) {
      echo 'エラーが発生しました。:' . $e->getMessage();
    }
  ?>
  <p>
    <a href="index.php">投稿一覧へ</a>
  </p> 
</body>
</html>