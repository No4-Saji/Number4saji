<!DOCTYPE html>
<html>
<!--編集内容をDBに保存させる-->

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
    //DBの接続情報
    $Dsn = "mysql:dbname=ToDoListSystem2;port=3306;host=host.docker.internal";
    $User = "root";
    $Password = "root";

    //カラムの変数への格納
    $Title = $_POST['Title'];
    $Doc = $_POST['Doc'];
    $Mes = $_POST['Mes'];
    $EditDate = date("Y-m-d H:i:s");

    //DBへの値の格納
    $Dbh = new PDO($Dsn, $User, $Password);
    //SQLインジェクション対策（バインドバリュー）
    $Stmt = $Dbh->prepare('UPDATE todolist2 SET Mes = :Mes, Title = :Title, Doc = :Doc, EditDate = :EditDate WHERE Id = :Id');
    $Stmt->execute(array(':Mes' => $Mes, ':Title' => $Title, ':Doc' => $Doc, ':Id' => $_POST['Id'], ':EditDate' => $EditDate));

    echo "情報を更新しました。";
  } catch (Exception $e) {
    echo 'エラーが発生しました。:' . $e->getMessage();
  }
  ?>
</body>

</html>