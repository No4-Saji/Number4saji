<?php
require('./private/dbconnect.php');
$dbConnector = new Db();
$dbh = $dbConnector->connect();
//文字数制限を設ける

//変数へ格納
$title = $_POST['Title'];
//バリデーション処理
$titleError = preg_match('/\A[[:^cntrl:]]{1,20}+\z/u', $title);
$document = $_POST['Doc'];
//バリデーション処理
$documentError = preg_match('/\A[[:^cntrl:]]{1,200}+\z/u', $document);

//Errorの場合0　
if ($titleError == 0 || $documentError == 0) {
  echo '文字数はタイトルが20字・内容が200字までです。';
?>
  <div class="bc"><button onclick="location.href='todolist.php'">リストへ戻る</button></div>
<?php
  exit();
}
?>

<?php
//データをカラムへ挿入
$newDate = date("Y-m-d H:i:s");
$editDate = NULL;
$query = "INSERT INTO todolist2(Title, Doc, NewDate) VALUES (:Title, :Doc, :NewDate)";
$stmt = $dbh->prepare($query);
$params = array(':Title' => $title, ':Doc' => $document, ':NewDate' => $newDate);
$stmt->execute($params);

echo "データの追加が完了しました。";
?>
<!DOCTYPE html>
<html>
<!--add.phpから送られてきたIDをもとにデータをカラムに挿入する。-->

<head>
  <link rel="stylesheet" href="./style.css" type="text/css">
</head>

<body>
  <div class="bc"><a class="button" href="./todolist.php">リストへ</a></div>
</body>

</html>