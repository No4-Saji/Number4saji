<!DOCTYPE html>
<html>
<!--削除を反映させる-->

<head>
    <meta charset="utf-8">
    <title>削除完了</title>
</head>

<body>
    <?php
    //DBへ接続し、削除する。
    try {
        $Dsn = "mysql:dbname=ToDoListSystem2;port=3306;host=host.docker.internal";
        $User = "root";
        $Password = "root";

        $Dbh = new PDO($Dsn, $User, $Password);
        $Stmt = $Dbh->prepare('DELETE FROM todolist2 WHERE Id = :Id');
        $Stmt->execute(array(':Id' => $_GET["Id"]));
        echo "削除しました。";
    } catch (Exception $e) {
        echo 'エラーが発生しました。:' . $e->getMessage();
    }
    ?>
    <div class=bc><button onclick="location.href='index.php'">リストへ戻る</button></div>
</body>

</html>