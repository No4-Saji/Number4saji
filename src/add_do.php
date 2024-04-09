<!DOCTYPE html>
<!--add.phpから送られてきたIDをもとにデータをカラムに挿入する。-->

<body>
  <?php
  require('dbconnect.php');

  //文字数制限を設ける

  //変数へ格納
  $Title = $_POST['Title'];
  //バリデーション処理
  $TitleError = preg_match('/\A[[:^cntrl:]]{1,20}+\z/u', $Title);
  $Doc = $_POST['Doc'];
  //バリデーション処理
  $DocError = preg_match('/\A[[:^cntrl:]]{1,200}+\z/u', $Doc);

  //Errorの場合0　
  if ($TitleError == 0 || $DocError == 0) {
    echo '文字数はタイトルが20字・内容が200字までです。';
  ?>
    <div class=bc><button onclick="location.href='todolist.php'">リストへ戻る</button></div>
  <?php
    exit();
  }
  ?>

  <?php
  //データをカラムへ挿入
  $NewDate = date("Y-m-d H:i:s");
  $EditDate = NULL;
  $Query = "INSERT INTO todolist2(Title, Doc, NewDate) VALUES (:Title, :Doc, :NewDate)";
  $Stmt = $Dbh->prepare($Query);
  $Params = array(':Title' => $Title, ':Doc' => $Doc, ':NewDate' => $NewDate);
  $Stmt->execute($Params);

  echo "データの追加が完了しました。";
  ?>
  <div class=bc><button onclick="location.href='todolist.php'">リストへ戻る</button></div>
</body>