<?php
//なぜかPOSTメソッドが反応しなかったため、GETでの値の引き渡し。
$id = $_GET['Id'];
?>
<!DOCTYPE html>
<html>
<!--削除の確認をし、する場合押されたボタンの行のIDをdelete_do.phpに渡す。-->

<head>
  <meta charset="utf-8">
  <title>削除確認</title>
  <link rel="stylesheet" href="./style.css" type="text/css">
</head>

<body>
  <div class=p1>DELETE</div>
  <div class=border></div>
  <br>
  <p>本当に削除しますか？</p>
  <button type='submit' name='delete'><a href="delete_do.php?Id=<?php echo $id ?>">はい</a></button>
  </br>
  <br>
  <div class=bc><a class="button" href="./todolist.php">リストへ</a></div>
  </br>
</body>

</html>