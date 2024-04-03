<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <style>
    form {
        background: #f8b500;
    }
    div.border{
            border:5px solid;
            border-color: #000 transparent transparent transparent;
            padding: 2px;
    }
    p1 {
        font-family: Century;
        font-size: 40px;
        font-weight: 600;
        color:seagreen;
    }
    p {
        font-weight:600;
        color: white;
    }
  </style>
</head>
<body>  
  <p1> &nbsp;ADD &nbsp;</p1>
  <div class=boder></div>
  <form method="post" action="add.php">
  <p> &nbsp;メッセージ：<input type="text" name = "Message" size="20"></p>
  <p> &nbsp;タイトル：&nbsp;&nbsp;<input type="text" name="Title" size="20"></p>
  <p> &nbsp;内容：</p>
  <p><textarea name = "Text" size="200" cols="101" rows="10"></textarea></p>
  <p><button type='submit' name='add'>追加</button></p>
  <p><button type='submit' name='back'>戻る</button></p>
  </form>
  <?php
    $Dsn = "mysql:dbname=todolistsystem;port=3306;host=host.docker.internal";
    $User = "root";
    $Password = "root";

    if(isset($_POST['add'])) {
      //DBへの接続
      try {
      $Dbh = new PDO( $Dsn, $User, $Password );
      } catch( PDOException $Error ) {
      echo "接続失敗:".$Error->getMessage();
      die();
      }
      //変数へ格納
      $Message = $_POST['Message'];
      $Title = $_POST['Title'];
      $Text = $_POST['Text'];
      $NewDate = date("Y-m-d H:i:s");
      $EditDate = NULL;
    
      $Sql = "INSERT INTO todolist(Title, Text, NewDate, Message) VALUES (:Title, :Text, :NewDate, :Message)";
      $Stmt = $Dbh->prepare($Sql);
      $Params = array(':Title' => $Title, ':Text' => $Text, ':NewDate' => $NewDate, ':Message' => $Message);
      $Stmt->execute($Params);

      header('Location: http://localhost:8000/index.php');
      exit;
    } elseif(isset($_POST['back'])) {
      header('Location: http://localhost:8000/index.php');
      exit;
    }
  ?>
</body>
</html>