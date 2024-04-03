<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>ToDoList</title>
    <style>
        p{
            font-size:40px;
            font-weight:600;
            font-family: Century;
            color: seagreen;
        }
        table,tr,td,th{
            border: solid 1px black; border-collapse: collapse;
        }
        td,th{
            min-width: 70px;
        }
        td{
            font-size: 15px;
            background: white;
            text-align: center;
            color: dimgray;
        }
        th{
            font-family: Georgia;
            color: white;
            background: #f8b500;
        }
        div.border{
            border:5px solid;
            border-color: #000 transparent transparent transparent;
            padding: 10px;
        }
    </style>
</head>    
<body>
    <?php
    $Dsn = "mysql:dbname=todolistsystem;port=3306;host=host.docker.internal";
    $User = "root";
    $Password = "root";
    //DBへの接続
    try {
        $Dbh = new PDO( $Dsn, $User, $Password );
    } catch ( PDOException $Error ) {
        echo "接続失敗:".$Error->getMessage();
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
    $Sql = "SELECT * FROM todolist";
    $Stmt = $Dbh->query($Sql);
    ?>

    <!--テーブルの表示-->
    <table>
    <tr><th>Id</th><th>Title</th><th>Text</th><th>Create</th><th>Edit</th><th></th></tr>
    
    <!--FETCH＿ASSOC：カラムを１行取得する。値を取得した後はこの関数をコールするたびに次のカラムの値を返す。カラムがなくなるとNULLを返す。-->
    <?php
    while($Result = $Stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr>
        <td><?php echo $Result['Id'] ?></td>
        <td><?php echo $Result['Title'] ?></td>
        <t><td width = '100%'><?php echo $Result['Text']?></td></t>
        <td><?php echo $Result['NewDate'] ?></td>
        <td><?php echo $Result['EditDate'] ?></td>
        <form action= 'index.php'  method = 'post'>
        <td><button type='submit' name='edit'><a href="edit.php?Id=<?php echo $Result["Id"] ?>">編集</a></button><button type='submit' name = 'delete' ><a href="delete.php?Id= <?php echo $Result["Id"]?>">削除</a></button></td>
        </form>
        </tr>
    <?php
    }
    ?>
    </table>
    <?php
    //ボタンを押した際の出力
    $Result = "";
    if(isset($_POST['add'])) {
        header('Location: http://localhost:8000/add.php');
        exit;
    } 
    ?>
</body>
</html>