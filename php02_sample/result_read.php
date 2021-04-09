<?php
// var_dump($_POST);
// exit();

// DB接続情報
$dbn = 'mysql:dbname=gsacs_d02_08;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

$sql = 'SELECT * FROM result_table';
$stmt = $pdo->prepare($sql);
// バインド変数に格納（セキュリティ） 
$status = $stmt->execute(); // SQLを実行

if ($status==false) {
  $error = $stmt->errorInfo();
  exit('sqlError:'.$error[2]);
 } else {

  
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//   while($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
//     $view .= $result["id"]."-".$result;
// }
  $output = "";
  foreach ($result as $record) {
    $output .= "<tr>";    
    $output .= "<td>{$record["done_at"]}</td>";
    $output .= "<td>{$record["name"]}</td>";
    $output .= "<td>{$record["result"]}</td>";
    $output .= "<td>{$record["think"]}</td>";
    $output .= "</tr>";
  } 
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ミッション一覧</title>
</head>

<body>
  <fieldset>
    <legend>ミッション一覧</legend>
    <a href="mission_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>実行日付</th>
          <th>名前</th>
          <th>実行結果</th>
          <th>ミッションしてみての感想</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?> 
      </tbody>
    </table>
  </fieldset>
</body>

</html>