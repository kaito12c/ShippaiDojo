<?php

if(
  !isset($_POST['todo']) || $_POST['todo']=='' ||
  !isset($_POST['deadline']) || $_POST['deadline']==''
){
  exit('ParamError');
}


$todo = $_POST['todo'];
$deadline = $_POST['deadline'];

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

$sql = 'INSERT INTO todo_table(id, todo, deadline, created_at, uplodee_at) 
        VALUES(NULL, :todo, :deadline, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
// バインド変数に格納（セキュリティ）
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR); //数値だった場合、INT(INTEGER:整数)
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR); 
$status = $stmt->execute(); // SQLを実行


if ($status==false) {
  $error = $stmt->errorInfo(); // データ登録失敗次にエラーを表示 exit('sqlError:'.$error[2]);
  } else {
  // 登録ページへ移動
    header('Location:todo_input.php');
  }
