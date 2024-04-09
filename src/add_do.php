<!DOCTYPE html>
<!--add.phpから送られてきたIDをもとにデータをカラムに挿入する。-->

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
    //バリデーション処理
    $TitleError = preg_match('/\A[[:^cntrl:]]{1,20}+\z/u', $Title);

    $Doc = $_POST['Doc'];
    //バリデーション処理
    $DocError = preg_match('/\A[[:^cntrl:]]{1,200}+\z/u', $Doc);
    ?>

    <!--文字数制限を設ける-->
    <?php
    //Errorの場合0　
    if ($TitleError == 0 || $DocError == 0) {
        echo '文字数はタイトルが20字・内容が200字までです。';
    ?>
        <div class=bc><button onclick="location.href='todolist.php'">リストへ戻る</button></div>
    <?php
        exit();
    }
    ?>

    <?php
    //データをカラムへ挿入
    $NewDate = date("Y-m-d H:i:s");
    $EditDate = NULL;

    $Query = "INSERT INTO todolist2(Title, Doc, NewDate) VALUES (:Title, :Doc, :NewDate)";
    $Stmt = $Dbh->prepare($Query);
    $Params = array(':Title' => $Title, ':Doc' => $Doc, ':NewDate' => $NewDate);
    $Stmt->execute($Params);

    echo "データの追加が完了しました。";
    ?>
    <div class=bc><button onclick="location.href='todolist.php'">リストへ戻る</button></div>
</body>