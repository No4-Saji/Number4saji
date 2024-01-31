<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ToDoList</title>
    </head>
        <style>
            p{
                font-size:40px;
                font-weight:600;
                font-family: Century;
                color: seagreen;
            }
            table,tr,td,th{
                border: solid 1px black; border-collapse: callapse;
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
            hr{
            height: 5px;
            background: black;
            border: none;
            align:center;
            }
        </style>
        <body>
        <?php
    $dsn = "mysql:dbname=todolistsystem;port=3306;host=localhost";
    $user = "root";
    $password = "root";
    //DBへの接続
    try{
        $dbh = new PDO( $dsn, $user, $password );
    }catch( PDOException $error ){
        echo "接続失敗:".$error->getMessage();
        die();
    }

    //タイトル
    echo "<p>TODOLIST</p>\n";
    echo "<hr></hr>";
    
    //追加ボタン
    echo "<form action='index.php' method='post'>";
    echo "<button type='submit' name='add'>追加</button>";
    echo "</form>";

    //対象のテーブルを変数に格納
    $sql = "SELECT * FROM todolist";
    $stmt = $dbh->query($sql);

    //テーブルの表示
    
    echo "<table>\n";
    echo "\t<tr><th>Id</th><th>Title</th><th>Text</th><th>Create</th><th>Edit</th><th>button</th></tr>\n";
//FETCH＿ASSOC：カラムを１行取得する。値を取得した後はこの関数をコールするたびに次のカラムの値を返す。カラムがなくなるとNULLを返す。
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "\t<tr>\n";
    echo "\t\t<td>{$result['Id']}</td>\n";
    echo "\t\t<td>{$result['Title']}</td>\n";
    echo "\t\t<t><td width = '100%'>{$result['Text']}</td></t>\n";
    echo "\t\t<td>{$result['Newdate']}</td>\n";
    echo "\t\t<td>{$result['Editdate']}</td>\n";
    echo "\t\t<form action= 'index.php'  method = 'post'>\n";
    echo "\t\t\t<td><button type='submit' name='edit'><a href=edit.php?Id=" . $result["Id"] . ">編集</a></button>\n<button type='submit' name = 'delete' ><a href=delete.php?Id=" . $result["Id"] . ">削除</a></button></td>\n";
    echo "\t\t</form>\n";
    echo "\t</tr>\n";
}
echo "</table>\n";

        ?>
        <?php
        //ボタンを押した際の出力
        $result = "";
        if(isset($_POST['add'])){
            header('Location: http://localhost:8000/add.php');
            exit;
        }elseif(isset($_POST['edit'])){

        }elseif(isset($_POST['delete'])){

        }

        ?>
        </body>


</html>