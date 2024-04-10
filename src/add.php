<!DOCTYPE html>
<html>
<!--カラムへデータを追加するためにadd_do.phpへ入力内容を渡す。-->

<head>
  <meta charset="utf-8">
  <title></title>
  <style>
    form {
      background: gray;
    }

    div.border {
      border: 5px solid;
      border-color: seagreen transparent transparent transparent;
      padding: 2px;
    }

    div.p1 {
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

<!--フォーム入力-->

<body>
  <div class=p1> &nbsp;ADD &nbsp;</div>
  <div class=border></div>
  <form method="post" action="add_do.php">
    <p> &nbsp;タイトル：&nbsp;&nbsp;<input type="text" name="Title" size="20" required></input></p>
    <p> &nbsp;内容：</p>
    <p><textarea name="Doc" size="200" cols="101" rows="10" required></textarea></p>
    <p><button type="submit" name="add">追加</button></p>
  </form>

  <div class=bc><button onclick="location.href='todolist.php'">リストへ戻る</button></div>
</body>

</html>