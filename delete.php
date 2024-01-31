<?php

try {
    $dsn = "mysql:dbname=todolistsystem;port=3306;host=localhost";
    $user = "root";
    $password = "root";

    $dbh = new PDO($dsn, $user, $password);

    $stmt = $dbh->prepare('DELETE FROM todolist WHERE Id = :Id');

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
  </head>
  <body>          
  <p>
      <a href="index.php">投稿一覧へ</a>
  </p> 
  </body>
</html>