<!DOCTYPE html>
<html>
<!--編集内容をDBに保存させる-->

<head>
  <meta charset="utf-8">
  <title>更新完了</title>
  <style>
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
  <p>
    <a class=button href="todolist.php">投稿一覧へ</a>
  </p>
  <?php
  try {
    //カラムの変数への格納
    $Title = $_POST['Title'];
    $Doc = $_POST['Doc'];
    $Mes = $_POST['Mes'];
    $EditDate = date("Y-m-d H:i:s");

    //DB接続
    require('dbconnect.php');
    $ClassDB = new DBconnect();
    $Dbh = $ClassDB->connect();

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