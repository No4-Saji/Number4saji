<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
    <style>
        form{
            background: #f8b500;
        }
        hr{
            height: 5px;
            background: black;
            border: none;
            align:above;
        }
        p1{
            font-family: Century;
            font-size: 40px;
            font-weight: 600;
            color:seagreen;

        }
        p{
            font-weight:600;
            color: white;

        }
    </style>
<body>  
    <p1> &nbsp;ADD &nbsp;</p1>
    <hr></hr>
    <form method="post" action="add.php">
    <p> &nbsp;メッセージ：<input type="text" name = "Message" size="20"></p>
    <p> &nbsp;タイトル：&nbsp;&nbsp;<input type="text" name="Title" size="20"></p>
    <p> &nbsp;内容：</p>
    <p><textarea name = "Text" size="200" cols="101"  rows="10"></textarea></p>
    <p><button type='submit' name='add'>追加</button></p>
    <p><button type='submit' name='back'>戻る</button></p>
  </form>
  <?php
$dsn = "mysql:dbname=todolistsystem;port=3306;host=localhost";
$user = "root";
$password = "root";

  if(isset($_POST['add'])){
  //DBへの接続
  try{
    $dbh = new PDO( $dsn, $user, $password );
    }catch( PDOException $error ){
    echo "接続失敗:".$error->getMessage();
    die();
    }
//変数へ格納
    $Message = $_POST['Message'];
    $Title = $_POST['Title'];
    $Text = $_POST['Text'];
    $Newdate = date("Y-m-d H:i:s");
    $Editdate = NULL;
    
    $sql = "INSERT INTO todolist(Title, Text, Newdate, Message) VALUES (:Title, :Text, :Newdate, :Message)";
    $stmt = $dbh->prepare($sql);
    $params = array(':Title' => $Title, ':Text' => $Text, ':Newdate' => $Newdate, ':Message' => $Message);
    $stmt->execute($params);

    header('Location: http://localhost:8000/index.php');
    exit;
  }elseif(isset($_POST['back'])){
    header('Location: http://localhost:8000/index.php');
    exit;
  }
  ?>
</body>
</html>