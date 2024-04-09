<!DOCTYPE html>
<html>
<!--削除の確認をし、する場合押されたボタンの行のIDをdelete_do.phpに渡す。-->

<head>
  <meta charset="utf-8">
  <title>削除確認</title>
</head>

<body>
  <?php
  //なぜかPOSTメソッドが反応しなかったため、GETでの値の引き渡し。
  $Id = $_GET['Id'];
  echo "本当に削除しますか？"
  ?>
  <br>
  <button type='submit' name='delete'><a href="delete_do.php?Id=<?php echo $Id ?>">はい</a></button>
  </br>
  <div class=bc><button onclick="location.href='todolist.php'">いいえ</button></div>
</body>

</html>