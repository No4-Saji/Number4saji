<!DOCTYPE html>
<html>
<!--編集をするために値をDBから受け取りedit_do.phpへ渡す-->

<head>
  <meta charset="utf-8">
  <title>EDIT</title>
  <style>
    div.p1 {
      font-size: 40px;
      font-weight: 600;
      font-family: Century;
      color: seagreen;
    }

    div.border {
      border: 5px solid;
      border-color: seagreen transparent transparent transparent;
      padding: 2px;
    }

    label {
      font-weight: 600;
      color: white;
    }

    h3 {
      background: gray;
    }

    .button {
      display: inline-block;
      border-radius: 5%;
      font-size: 10pt;
      text-align: center;
      cursor: pointer;
      padding: 10px 10px;
      background: #999999;
      color: #ffffff;
      line-height: 1em;
      opacity: 1;
      transition: .3s;

    }

    .button:hover {
      box-shadow: none;
      opacity: 0.8;
    }
  </style>
</head>

<body>
  <?php

  //DBへの接続
  require('dbconnect.php');
  $ClassDB = new DBconnect();
  $Dbh = $ClassDB->connect();

  //DBから値を取得
  try {
    $Stmt = $Dbh->prepare('SELECT * FROM todolist2 WHERE Id = :Id');
    $Stmt->execute(array(':Id' => $_GET["Id"]));
    $Result = 0;
    $Result = $Stmt->fetch(PDO::FETCH_ASSOC);
  } catch (Exception $e) {
    echo 'エラーが発生しました。:' . $e->getMessage();
  }

  ?>
  <div class="contact-form">
    <div class=p1>&nbsp;EDIT&nbsp;</div>
    <div class=border></div>
    <h3>
      <!--フォーム作成・エスケープ処理（htmlspecialchar）-->
      <form action="edit_do.php" method="post">
        <input type="hidden" name="Id" value="<?php if (!empty($Result['Id'])) echo (htmlspecialchars($Result['Id'], ENT_QUOTES, 'UTF-8')); ?>">
        <p>
          <label>&nbsp;Message：</label>
          <input type="text" name="Mes" size="30" value="<?php if (!empty($Result['Mes'])) echo (htmlspecialchars($Result['Mes'], ENT_QUOTES, 'UTF-8')); ?>">
        </p>
        <p>
          <label>&nbsp;Title：</label>
          <input type="text" name="Title" size="30" value="<?php if (!empty($Result['Title'])) echo (htmlspecialchars($Result['Title'], ENT_QUOTES, 'UTF-8')); ?>">
        </p>
        <p>
          <label>&nbsp;Text：</label>
          <input type="text" name="Doc" size="200" value="<?php if (!empty($Result['Doc'])) echo (htmlspecialchars($Result['Doc'], ENT_QUOTES, 'UTF-8')); ?>">
        </p>
        <input type="submit" value="編集する">

      </form>
    </h3>
  </div>

  <a class=button href="todolist.php">投稿一覧へ</a>
</body>

</html>