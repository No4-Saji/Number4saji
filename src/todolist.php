<?php

//headerの定義
ob_start();
if (isset($_POST['add'])) {
  header('Location: http://localhost/add.php');
  exit();
}
ob_end_flush();
?>
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="UTF-8">
  <title>ToDoList</title>
  <style>
    button.add {
      display: inline-block;
      font-size: 12pt;
      /* 文字サイズ */
      text-align: center;
      /* 文字位置   */
      cursor: pointer;
      /* カーソル   */
      padding: 4px 4px;
      line-height: 10px;
      position: absolute;
      right: 25px;
    }

    button:hover {
      box-shadow: none;
      /* カーソル時の影消去 */
      opacity: 0.8;
      /* カーソル時透明度 */
    }

    div.p1 {
      font-size: 40px;
      font-weight: 600;
      font-family: Century;
      color: seagreen;
    }

    table,
    tr,
    td,
    th {
      border: solid 1px black;
      border-collapse: collapse;
    }

    td,
    th {
      min-width: 70px;
    }

    td {
      font-size: 15px;
      background: white;
      text-align: center;
      color: dimgray;
    }

    th {
      font-family: Georgia;
      color: white;
      background: gray;
    }

    div.border {
      border: 5px solid;
      border-color: seagreen transparent transparent transparent;
      padding: 10px;
    }
  </style>
</head>

<body>
  <?php
  $Dsn = "mysql:dbname=ToDoListSystem2;port=3306;host=host.docker.internal";
  $User = "root";
  $Password = "root";

  //DBへの接続
  try {
    $Dbh = new PDO($Dsn, $User, $Password);
  } catch (PDOException $Error) {
    echo "接続失敗:" . $Error->getMessage();
    die();
  }
  ?>

  <!--タイトル-->
  <div class=p1>TODOLIST</div>
  <div class=border></div>

  <!--追加ボタン-->
  <form action='todolist.php' method='post'>
    <button type='submit' class=add name='add'>追加</button>
  </form>
  <?php

  //対象のテーブルを変数に格納
  $Sql = "SELECT * FROM todolist2";
  $Stmt = $Dbh->query($Sql);
  ?>

  <!--テーブルの表示-->
  <br>
  <table>
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
    <tbody>

      <!--FETCH＿ASSOC：カラムを１行取得する。値を取得した後はこの関数をコールするたびに次のカラムの値を返す。カラムがなくなるとNULLを返す。-->
      <?php
      while ($Result = $Stmt->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <tr>
          <td><?php echo $Result['Id'] ?></td>
          <?php
          $Title = $Result['Title'];

          $Doc = $Result['Doc'];
          ?>
          <td width='20%'><?php echo htmlspecialchars($Title, ENT_QUOTES, 'UTF-8') ?></td>
          <t>
            <td width='60%'><?php echo htmlspecialchars($Doc, ENT_QUOTES, 'UTF-8') ?></td>
          </t>
          <td><?php echo $Result['NewDate'] ?></td>
          <td><?php echo $Result['EditDate'] ?></td>
          <form action='delete.php' method='post'>
            <td>
              <button type='submit' name='edit'><a href="edit.php?Id= <?php echo $Result["Id"] ?>">編集</a></button>
              <button type='submit' name='delete'><a href="delete.php?Id= <?php echo $Result["Id"] ?>">削除</a></button>
            </td>
          </form>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  </br>
</body>

</html>