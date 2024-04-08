<!DOCTYPE html>
<html>
<!--カラムへデータを追加するためにcatch.phpへ入力内容を渡す。-->

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
  <form method="post" action="catch.php">
    <p> &nbsp;タイトル：&nbsp;&nbsp;<input type="text" name="Title" size="20" required></input></p>
    <p> &nbsp;内容：</p>
    <p><textarea name="Doc" size="200" cols="101" rows="10" required></textarea></p>
    <p><button type="submit" name="add">追加</button></p>
  </form>

  <div class=bc><button onclick="location.href='index.php'">リストへ戻る</button></div>
</body>

</html>