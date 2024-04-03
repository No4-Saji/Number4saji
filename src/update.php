<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>更新完了</title>
</head>
<body>          
  <p>
      <a href="index.php">投稿一覧へ</a>
  </p> 
  <?php
    try {
      $Dsn = "mysql:dbname=todolistsystem;port=3306;host=host.docker.internal";
      $User = "root";
      $Password = "root";
      $EditDate = date("Y-m-d H:i:s");

      $Dbh = new PDO($Dsn, $User, $Password);

      $Stmt = $Dbh->prepare('UPDATE todolist SET Title = :Title, Text = :Text, EditDate = :EditDate WHERE Id = :Id');

      $Stmt->execute(array(':Title' => $_POST['Title'], ':Text' => $_POST['Text'], ':Id' => $_POST['Id'],':EditDate' => $EditDate));

      echo "情報を更新しました。";

    } catch (Exception $e) {
      echo 'エラーが発生しました。:' . $e->getMessage();
    }
  ?>
</body>
</html>