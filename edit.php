<?php


try {
    $dsn = "mysql:dbname=todolistsystem;port=3306;host=localhost";
    $user = "root";
    $password = "root";

    $dbh = new PDO($dsn, $user, $password);

    $stmt = $dbh->prepare('SELECT * FROM todolist WHERE Id = :Id');

    $stmt->execute(array(':Id' => $_GET["Id"]));

    $result = 0;

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (Exception $e) {
          echo 'エラーが発生しました。:' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>EDIT</title>
    <style>
        h2{
            font-size:40px;
            font-weight:600;
            font-family: Century;
            color: seagreen;
        }
        hr{
            height: 5px;
            background: black;
            border: none;
            align:center;
        }
        label{
            font-weight:600;
            color: white;
        }
        h3{
            background: #f8b500;
        }
    </style>
    <div class="contact-form">
        <h2>&nbsp;EDIT&nbsp;</h2>
        <hr></hr>
        <h3>
        <form action="update.php" method="post">
                <input type="hidden" name="Id" value="<?php if (!empty($result['Id'])) echo(htmlspecialchars($result['Id'], ENT_QUOTES, 'UTF-8'));?>">
            <p>
                <label>&nbsp;Title：</label>
                <input type="text" name="Title" size="30" value="<?php if (!empty($result['Title'])) echo(htmlspecialchars($result['Title'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <p>
                <label>&nbsp;Text：</label>
                <input type="text" name="Text" size="200" value="<?php if (!empty($result['Text'])) echo(htmlspecialchars($result['Text'], ENT_QUOTES, 'UTF-8'));?>">
            </p>

            <input type="submit" value="編集する">

        </form>
    </h3>
    </div>
        <a href="index.php">投稿一覧へ</a>
</body>
</html>