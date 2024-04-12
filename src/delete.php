<!DOCTYPE html>
<html>
<!--削除の確認をし、する場合押されたボタンの行のIDをdelete_do.phpに渡す。-->

<head>
  <meta charset="utf-8">
  <title>削除確認</title>
  <style>
    div.p1 {
      font-size: 40px;
      font-weight: 600;
      font-family: Century;
      color: seagreen;
    }

    div.border {
      border: 5px solid;
      border-color: seagreen transparent transparent transparent;
      padding: 10px;
    }

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
  <div class=p1>DELETE</div>
  <div class=border></div>
  <?php
  //なぜかPOSTメソッドが反応しなかったため、GETでの値の引き渡し。
  $Id = $_GET['Id'];
  echo "本当に削除しますか？"
  ?>
  <br>
  <button type='submit' name='delete'><a href="delete_do.php?Id=<?php echo $Id ?>">はい</a></button>
  </br>
  <br>
  <div class=bc><a class="button" href="./todolist.php">リストへ</a></div>
  </br>
</body>

</html>