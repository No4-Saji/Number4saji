<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>EDIT</title>
    <style>
        h2 {
            font-size:40px;
            font-weight:600;
            font-family: Century;
            color: seagreen;
        }
        div.border{
            border:5px solid;
            border-color: #000 transparent transparent transparent;
            padding: 2px;
        }
        label {
            font-weight:600;
            color: white;
        }
        h3 {
            background: #f8b500;
        }
    </style>
</head>
<body>
    <div class="contact-form">
        <h2>&nbsp;EDIT&nbsp;</h2>
        <div class = border></div>
        <h3>
        <form action="update.php" method="post">
            <input type="hidden" name="Id" value="<?php if (!empty($Result['Id'])) echo(htmlspecialchars($Result['Id'], ENT_QUOTES, 'UTF-8'));?>">
            <p>
                <label>&nbsp;Title：</label>
                <input type="text" name="Title" size="30" value="<?php if (!empty($Result['Title'])) echo(htmlspecialchars($Result['Title'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <p>
                <label>&nbsp;Text：</label>
                <input type="text" name="Text" size="200" value="<?php if (!empty($Result['Text'])) echo(htmlspecialchars($Result['Text'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <input type="submit" value="編集する">
        </form>
        </h3>
    </div>

    <a href="index.php">投稿一覧へ</a>
    <?php

    try {
        $Dsn = "mysql:dbname=todolistsystem;port=3306;host=host.docker.internal";
        $User = "root";
        $Password = "root";

        $Dbh = new PDO($Dsn, $User, $Password);

        $Stmt = $Dbh->prepare('SELECT * FROM todolist WHERE Id = :Id');

        $Stmt->execute(array(':Id' => $_GET["Id"]));

        $Result = 0;

        $Result = $Stmt->fetch(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        echo 'エラーが発生しました。:' . $e->getMessage();
    }

    ?>
</body>
</html>