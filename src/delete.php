<?php
$id = $_GET['Id'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>削除確認</title>
  <link rel="stylesheet" href="./style.css" type="text/css">
</head>

<body style="background-color:#fff3b8">
  <header class="t-header">
    <div class="i-header">
      <p class="c-logo">
        <a href="index.php">DELETE</a>
      <p class="c-logo-description">リストの削除</p>
    </div>
  </header>
  <br>
  <p class="delete">本当に削除しますか？</p>
  <a class="button" href="delete_do.php?Id=<?php echo $id ?>">はい</a>
  </br>
  <br>
  <div class=bc><a class="button" href="./index.php">いいえ</a></div>
  </br>
</body>

</html>