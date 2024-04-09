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
        p {
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
            background: #f8b500;
        }

        div.border {
            border: 5px solid;
            border-color: #000 transparent transparent transparent;
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
    <p>TODOLIST</p>
    <div class=border></div>
    <!--追加ボタン-->
    <form action='index.php' method='post'>
        <button type='submit' name='add'>追加</button>
    </form>
    <?php
    //対象のテーブルを変数に格納
    $Query = "SELECT * FROM todolist2";
    $Stmt = $Dbh->query($Query);
    ?>
    <!--テーブルの表示-->
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
                <form action='delete.php' method='post'>
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
</body>

</html>