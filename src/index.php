<?php

//　カラムの全探索
require("private/ToDoList2Dao.php");
$ToDoList2Dao = new ToDoList2Dao();
$todolist = $ToDoList2Dao->findAll();
?>
<header class="t-header">
  <div class="i-header">
    <p class="c-logo">
      <a href="index.php">TODOLIST</a>
    <p class="c-logo-description">リストの表示</p>
  </div>
</header>
<br>
<a class="button" href="./add.php">追加</a>
</br>
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="UTF-8">
  <title>ToDoList</title>
  <link rel="stylesheet" href="./style.css" type="text/css">
  <style>

  </style>
</head>

<body style="background-color:#fff3b8">
  <table>
    <br>
    <thead>
      <tr>
        <th>番号</th>
        <th>タイトル</th>
        <th>内容</th>
        <th>作成日</th>
        <th>更新日</th>
        <th></th>
      </tr>
    </thead>
    </br>
    <tbody>
      <?php
      //　カラムをひとつずつ出力
      foreach ($todolist as $todo) {
      ?>
        <tr>
          <td><?php echo $todo['Id'] ?></td>
          <td width='20%'><?php echo htmlspecialchars($todo["Title"], ENT_QUOTES, 'UTF-8') ?></td>
          <td width='60%'><?php echo htmlspecialchars($todo["Doc"], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?php echo $todo['NewDate'] ?></td>
          <td><?php echo $todo['EditDate'] ?></td>

          <td>
            <form action='delete.php' method='post'>
              <a class="button" href="edit.php?Id= <?php echo $todo["Id"] ?>">編集</a>
              <a class="button" href="delete.php?Id= <?php echo $todo["Id"] ?>">削除</a>
            </form>
          </td>

        </tr>

      <?php
      }
      ?>
    </tbody>
  </table>
</body>

</html>