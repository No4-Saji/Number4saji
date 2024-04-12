<!DOCTYPE html>
<html>
<!--削除を反映させる-->

<head>
  <meta charset="utf-8">
  <title>削除完了</title>
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
  <?php
  // //DBへ接続する。
  require('dbconnect.php');
  $ClassDB = new DBconnect();
  $Dbh = $ClassDB->connect();

  //DB削除
  try {
    $Stmt = $Dbh->prepare('DELETE FROM todolist2 WHERE Id = :Id');
    $Stmt->execute(array(':Id' => $_GET["Id"]));
    echo "削除しました。";
  } catch (Exception $e) {
    echo 'エラーが発生しました。:' . $e->getMessage();
  }
  ?>
  <div class=bc><a class="button" href="./todolist.php">リストへ</a></div>
</body>

</html>