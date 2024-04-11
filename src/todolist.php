<!DOCTYPE HTML>
<html>

<head>
  <meta charset="UTF-8">
  <title>ToDoList</title>
  <style>
    .p1 {
      font-size: 40px;
      font-weight: 600;
      font-family: Century;
      color: seagreen;
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
  require('dbconnect.php');
  $ClassDB = new DBconnect();
  $Dbh = $ClassDB->connect();
  ?>
  <!--タイトル-->
  <div class="p1">TODOLIST</div>
  <div class="border"></div>
  <!--追加ボタン-->
  <a class="button" href="./add.php">追加</a>
  <?php
  //対象のテーブルを変数に格納
  $Query = "SELECT * FROM todolist2";
  $Stmt = $Dbh->query($Query);
  ?>
  <!--テーブルの表示-->
  <table>
    <thead>
      <br>
      <tr>
        <th>番号</th>
        <th>タイトル</th>
        <th>内容</th>
        <th>作成日</th>
        <th>更新日</th>
        <th></th>
      </tr>
      </br>
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
          <td width='60%'><?php echo htmlspecialchars($Doc, ENT_QUOTES, 'UTF-8') ?></td>
          <td><?php echo $Result['NewDate'] ?></td>
          <td><?php echo $Result['EditDate'] ?></td>

          <td>
            <form action='delete.php' method='post'>
              <a class="button" href="edit.php?Id= <?php echo $Result["Id"] ?>">編集</a>
              <a class="button" href="delete.php?Id= <?php echo $Result["Id"] ?>">削除</a>
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