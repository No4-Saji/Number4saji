<!DOCTYPE html>

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
    //変数へ格納
    $Title = $_POST['Title'];
    $Doc = $_POST['Doc'];
    $NewDate = date("Y-m-d H:i:s");
    $EditDate = NULL;

    $Query = "INSERT INTO todolist2(Title, Doc, NewDate) VALUES (:Title, :Doc, :NewDate)";
    $Stmt = $Dbh->prepare($Query);
    $Params = array(':Title' => $Title, ':Doc' => $Doc, ':NewDate' => $NewDate);
    $Stmt->execute($Params);

    echo "データの追加が完了しました。";
    ?>
    <div class=bc><button onclick="location.href='index.php'">リストへ戻る</button></div>
</body>