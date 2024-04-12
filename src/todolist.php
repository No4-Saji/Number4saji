  <?php
  require('./private/dbconnect.php');
  $dbConnector = new Db();
  $dbh = $dbConnector->connect();
  ?>
  <!--タイトル-->
  <div class="p1">TODOLIST</div>
  <div class="border"></div>
  <!--追加ボタン-->
  <a class="button" href="./add.php">追加</a>
  <?php
  //対象のテーブルを変数に格納
  $query = "SELECT * FROM todolist2";
  $stmt = $dbh->query($query);
  ?>
  <!DOCTYPE HTML>
  <html>

  <head>
    <meta charset="UTF-8">
    <title>ToDoList</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
    <style>

    </style>
  </head>

  <body>
    <!--テーブルの表示-->
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
        <!--FETCH＿ASSOC：カラムを１行取得する。値を取得した後はこの関数をコールするたびに次のカラムの値を返す。カラムがなくなるとNULLを返す。-->
        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>

          <tr>
            <td><?php echo $result['Id'] ?></td>
            <?php
            $title = $result['Title'];

            $document = $result['Doc'];
            ?>
            <td width='20%'><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></td>
            <td width='60%'><?php echo htmlspecialchars($document, ENT_QUOTES, 'UTF-8') ?></td>
            <td><?php echo $result['NewDate'] ?></td>
            <td><?php echo $result['EditDate'] ?></td>

            <td>
              <form action='delete.php' method='post'>
                <a class="button" href="edit.php?Id= <?php echo $result["Id"] ?>">編集</a>
                <a class="button" href="delete.php?Id= <?php echo $result["Id"] ?>">削除</a>
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