<?php

require('private/ToDoList2Dao.php');
$id = $_GET["Id"];
$ToDoList2Dao = new ToDoList2Dao();
$todo = $todoList2Dao->findById($id);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>EDIT</title>
  <link rel="stylesheet" href="./style.css" type="text/css">
</head>

<body style="background-color:#fff3b8">
  <div class="contact-form">
    <header class="t-header">
      <div class="i-header">
        <p class="c-logo">
          <a href="index.php">EDIT</a>
        <p class="c-logo-description">リストの編集</p>
      </div>
    </header>
    <h3>
      <!--フォーム作成・エスケープ処理（htmlspecialchar）-->
      <form action="edit_do.php" method="post">
        <input type="hidden" name="Id" value="<?php echo (htmlspecialchars($todolist["Id"], ENT_QUOTES, 'UTF-8')); ?>">
        <p>
          <label>&nbsp;Message：</label>
          <input type="text" name="Mes" size="30" value="<?php echo (htmlspecialchars($todolist["Mes"], ENT_QUOTES, 'UTF-8')); ?>">
        </p>
        <p>
          <label>&nbsp;Title：</label>
          <input type="text" name="Title" size="30" value="<?php echo (htmlspecialchars($todolist["Title"], ENT_QUOTES, 'UTF-8')); ?>">
        </p>
        <p>
          <label>&nbsp;Text：</label>
          <input type="text" name="Doc" size="200" value="<?php echo (htmlspecialchars($todolist["Doc"], ENT_QUOTES, 'UTF-8')); ?>">
        </p>
        <input type="submit" value="編集する">

      </form>
    </h3>
  </div>

  <a class=button href="index.php">投稿一覧へ</a>
</body>

</html>