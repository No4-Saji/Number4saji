<!DOCTYPE HTML>
<html>
</html>
    <head>
    </head>
        <body>
        <?php
$dsn = "mysql:dbname=todolistsystem;port=3307;host=localhost";
$user = "root";
$password = "";

try{
    $dbh = new PDO( $dsn, $user, $password );
}catch( PDOException $error ){
    echo "接続失敗:".$error->getMessage();
    die();
}
//対象のテーブルを変数に格納
$sql = 'select Id, Title, Text, Created, New from TodoList';
$stmt = $dbh->query($sql);

echo "<table>\n";
echo "\t<tr><th>Id</th><th>Title</th><th>Text</th><th>Created</th><th>New</th></tr>\n";
//FETCH＿ASSOC：カラムを１行取得する。値を取得した後はこの関数をコールするたびに次のカラムの値を返す。カラムがなくなるとNULLを返す。
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "\t<tr>\n";
    echo "\t\t<td>{$result['Id']}</td>\n";
    echo "\t\t<td>{$result['Title']}</td>\n";
    echo "\t\t<td>{$result['Text']}</td>\n";
    echo "\t\t<td>{$result['Created']}</td>\n";
    echo "\t\t<td>{$result['New']}</td>\n";
    echo "\t</tr>\n";
}
echo "</table>\n";
        ?>
        </body>


