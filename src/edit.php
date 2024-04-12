<?php

//DBへの接続
require('./private/dbconnect.php');
$dbConnector = new Db();
$dbh = $dbConnector->connect();

//DBから値を取得
try {
  $stmt = $dbh->prepare('SELECT * FROM todolist2 WHERE Id = :Id');
  $stmt->execute(array(':Id' => $_GET["Id"]));
  $result = 0;
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  echo 'エラーが発生しました。:' . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<!--編集をするために値をDBから受け取りedit_do.phpへ渡す-->

<head>
  <meta charset="utf-8">
  <title>EDIT</title>
  <link rel="stylesheet" href="./style.css" type="text/css">
</head>

<body>
  <div class="contact-form">
    <div class=p1>&nbsp;EDIT&nbsp;</div>
    <div class=border></div>
    <h3>
      <!--フォーム作成・エスケープ処理（htmlspecialchar）-->
      <form action="edit_do.php" method="post">
        <input type="hidden" name="Id" value="<?php if (!empty($result['Id'])) echo (htmlspecialchars($result['Id'], ENT_QUOTES, 'UTF-8')); ?>">
        <p>
          <label>&nbsp;Message：</label>
          <input type="text" name="Mes" size="30" value="<?php if (!empty($result['Mes'])) echo (htmlspecialchars($result['Mes'], ENT_QUOTES, 'UTF-8')); ?>">
        </p>
        <p>
          <label>&nbsp;Title：</label>
          <input type="text" name="Title" size="30" value="<?php if (!empty($result['Title'])) echo (htmlspecialchars($result['Title'], ENT_QUOTES, 'UTF-8')); ?>">
        </p>
        <p>
          <label>&nbsp;Text：</label>
          <input type="text" name="Doc" size="200" value="<?php if (!empty($result['Doc'])) echo (htmlspecialchars($result['Doc'], ENT_QUOTES, 'UTF-8')); ?>">
        </p>
        <input type="submit" value="編集する">

      </form>
    </h3>
  </div>

  <a class=button href="todolist.php">投稿一覧へ</a>
</body>

</html>