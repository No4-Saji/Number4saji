<?php

try {
    $dsn = "mysql:dbname=todolistsystem;port=3306;host=localhost";
    $user = "root";
    $password = "root";
    $Editdate = date("Y-m-d H:i:s");

    $dbh = new PDO($dsn, $user, $password);

    $stmt = $dbh->prepare('UPDATE todolist SET Title = :Title, Text = :Text, Editdate = :Editdate WHERE Id = :Id');

    $stmt->execute(array(':Title' => $_POST['Title'], ':Text' => $_POST['Text'], ':Id' => $_POST['Id'],':Editdate' => $Editdate));

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
  </head>
  <body>          
  <p>
      <a href="index.php">投稿一覧へ</a>
  </p> 
  </body>
</html>