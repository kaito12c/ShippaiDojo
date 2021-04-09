<?php


if(
  !isset($_POST['name']) || $_POST['name']=='' ||
  !isset($_POST['result']) || $_POST['result']=='' ||
  !isset($_POST['think']) || $_POST['think']==''
){
  exit('ParamError');
}

$name = $_POST['name'];
$result = $_POST['result'];
$think = $_POST['think'];

// DB接続情報
$dbn = 'mysql:dbname=gsacs_d02_08;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';
// ↑は桜サーバーができたら書き換える

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}




$sql = 'INSERT INTO result_table(id, name, result, think, done_at) 
        VALUES(NULL, :name, :result, :think, sysdate())';

$stmt = $pdo->prepare($sql);
// バインド変数に格納（セキュリティ）
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //数値だった場合、INT(INTEGER:整数)
$stmt->bindValue(':result', $result, PDO::PARAM_STR);
$stmt->bindValue(':think', $think, PDO::PARAM_STR); 
$status = $stmt->execute(); // SQLを実行

if ($status==false) {
  $error = $stmt->errorInfo(); // データ登録失敗次にエラーを表示 exit('sqlError:'.$error[2]);
  } else {
  // 登録ページへ移動
    header('Location:result_read.php');
  }
