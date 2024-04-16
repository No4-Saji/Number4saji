<?php
require('private/ToDoList2Dao.php');

// 文字数制限を設ける

// 変数へ格納
$title = $_POST['Title'];
// バリデーション処理
$titleResaltOfPregMatch = preg_match('/\A[[:^cntrl:]]{1,20}+\z/u', $title);
$document = $_POST['Doc'];
// バリデーション処理
$documentResaltOfPregMatch = preg_match('/\A[[:^cntrl:]]{1,200}+\z/u', $document);

//データをカラムへ挿入
$newDate = date("Y-m-d H:i:s");
$editDate = null;
if ($titleResaltOfPregMatch == 1 && $documentResaltOfPregMatch == 1) {
  $todoList2Dao = new ToDoList2Dao();
  $todoList2Dao->insert($title, $document, $newDate);
  echo 'データの追加が完了しました。';
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="./style.css" type="text/css">
</head>

<body style="background-color:#fff3b8">
  <?php
  if ($titleResaltOfPregMatch == 0 || $documentResaltOfPregMatch == 0) {
    echo '文字数はタイトルが20字・内容が200字までです。';
  ?>
    <div class="bc"><a class="button" href="./index.php">リストへ</a></div>
  <?php
    exit();
  }
  ?>
  <div class="bc"><a class="button" href="./index.php">リストへ</a></div>
</body>

</html>