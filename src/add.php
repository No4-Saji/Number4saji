<!DOCTYPE html>
<html>
<!--カラムへデータを追加するためにadd_do.phpへ入力内容を渡す。-->

<head>
  <meta charset="utf-8">
  <title>追加フォーム</title>
  <link rel="stylesheet" href="./style.css" type="text/css">
</head>

<!--フォーム入力-->

<body style="background-color:#fff3b8">
  <header class="t-header">
    <div class="i-header">
      <p class="c-logo">
        <a href="index.php">ADD</a>
      <p class="c-logo-description">リストの追加</p>
    </div>
  </header>
  <h3>
    <form method="post" action="add_do.php">
      <p> &nbsp;タイトル：&nbsp;&nbsp;<input type="text" name="Title" size="20" required></input></p>
      <p> &nbsp;内容：</p>
      <p><textarea name="Doc" size="200" cols="101" rows="10" required></textarea></p>
      <p><button type="submit" name="add">追加</button></p>
  </h3>
  </form>

  <div class="bc"><a class="button" href="./index.php">リストへ</a></div>
</body>

</html>