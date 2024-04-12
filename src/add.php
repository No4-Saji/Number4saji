<!DOCTYPE html>
<html>
<!--カラムへデータを追加するためにadd_do.phpへ入力内容を渡す。-->

<head>
  <meta charset="utf-8">
  <title>追加フォーム</title>
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

  <div class=bc><a class="button" href="./todolist.php">リストへ</a></div>
</body>

</html>