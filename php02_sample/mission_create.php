<?php


if(
  !isset($_POST['name']) || $_POST['name']=='' ||
  !isset($_POST['mission']) || $_POST['mission']=='' ||
  !isset($_POST['deadline']) || $_POST['deadline']==''
){
  exit('ParamError');
}

$name = $_POST['name'];
$mission = $_POST['mission'];
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




$sql = 'INSERT INTO misson_table(id, name, mission, deadline, created_at, updated_at) 
        VALUES(NULL, :name, :mission, :deadline, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
// バインド変数に格納（セキュリティ）
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //数値だった場合、INT(INTEGER:整数)
$stmt->bindValue(':mission', $mission, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR); 
$status = $stmt->execute(); // SQLを実行

if ($status==false) {
  $error = $stmt->errorInfo(); // データ登録失敗次にエラーを表示 exit('sqlError:'.$error[2]);
  } else {
  // 登録ページへ移動
    header('Location:mission_read.php');
  }
