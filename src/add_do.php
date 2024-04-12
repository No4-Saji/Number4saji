<!DOCTYPE html>
<!--add.phpから送られてきたIDをもとにデータをカラムに挿入する。-->

<head>
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
  require('dbconnect.php');
  $ClassDB = new DBconnect();
  $Dbh = $ClassDB->connect();
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
  <div class=bc><a class="button" href="./todolist.php">リストへ</a></div>
</body>