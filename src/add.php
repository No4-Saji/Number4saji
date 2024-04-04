<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <style>
    form {
      background: #f8b500;
    }

    div.border {
      border: 5px solid;
      border-color: #000 transparent transparent transparent;
      padding: 2px;
    }

    p1 {
      font-family: Century;
      font-size: 40px;
      font-weight: 600;
      color: seagreen;
    }

    p {
      font-weight: 600;
      color: white;
    }
  </style>
</head>

<body>
  <p1> &nbsp;ADD &nbsp;</p1>
  <div class=border></div>
  <form method="post" action="catch.php">
    <p> &nbsp;メッセージ：<input type="text" name="Message" size="20"></input></p>
    <p> &nbsp;タイトル：&nbsp;&nbsp;<input type="text" name="Title" size="20" required></input></p>
    <p> &nbsp;内容：</p>
    <p><textarea name="Doc" size="200" cols="101" rows="10" required></textarea></p>
    <p><button type="submit" name="add">追加</button></p>
  </form>
  <?php
  $Dsn = "mysql:dbname=ToDoListSystem2;port=3306;host=host.docker.internal";
  $User = "root";
  $Password = "root";

  if (isset($_POST['add'])) {
    //DBへの接続
    try {
      $Dbh = new PDO($Dsn, $User, $Password);
    } catch (PDOException $Error) {
      echo "接続失敗:" . $Error->getMessage();
      die();
    }
    //変数へ格納
    $Title = $_POST['Title'];
    $Doc = $_POST['Doc'];
    $NewDate = date("Y-m-d H:i:s");
    $EditDate = NULL;

    $Query = "INSERT INTO todolist2(Title, Doc, NewDate) VALUES (:Title, :Doc, :NewDate)";
    $Stmt = $Dbh->prepare($Query);
    $Params = array(':Title' => $Title, ':Doc' => $Doc, ':NewDate' => $NewDate);
    $Stmt->execute($Params);
  }
  ?>
  <div class=bc><button onclick="location.href='index.php'">リストへ戻る</button></div>
</body>

</html>