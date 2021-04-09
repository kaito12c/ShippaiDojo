<?php
// var_dump($_POST);
// exit();

if(
  !isset($_POST['name']) || $_POST['name']=='' ||
  !isset($_POST['wa']) || $_POST['wa']=='' ||
  !isset($_POST['where']) || $_POST['where']=='' ||
  !isset($_POST['ww1']) || $_POST['ww1']=='' ||
  !isset($_POST['ww2']) || $_POST['ww2']=='' ||
  !isset($_POST['wp']) || $_POST['wp']=='' ||
  !isset($_POST['reason']) || $_POST['reason']=='' 
){
  exit('ParamError');
}


$name = $_POST['name'];
$w_a = $_POST['wa'];
$where = $_POST['where'];
$w_w1 = $_POST['ww1'];
$w_w2 = $_POST['ww2'];
$w_p = $_POST['wp'];
$reason = $_POST['reason'];

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

$sql = "INSERT INTO work_fulfill(id, get_time, name, work_at, work_where, work_with, work_with2, work_point, work_fulfill) 
VALUES(NULL, sysdate(), :name1, :wa, :where1, :ww1, :ww2, :wp, :reason)";
$stmt = $pdo->prepare($sql);

// バインド変数に格納（セキュリティ）
$stmt->bindValue(':name1', $name, PDO::PARAM_STR); 
$stmt->bindValue(':wa', $w_a, PDO::PARAM_STR); 
$stmt->bindValue(':where1', $where, PDO::PARAM_STR); 
$stmt->bindValue(':ww1', $w_w1, PDO::PARAM_STR); 
$stmt->bindValue(':ww2', $w_w2, PDO::PARAM_STR);
$stmt->bindValue(':wp', $w_p, PDO::PARAM_INT); 
$stmt->bindValue(':reason', $reason, PDO::PARAM_STR); 

$status = $stmt->execute(); // SQLを実行


if ($status==false) {
$error = $stmt->errorInfo(); // データ登録失敗次にエラーを表示 exit('sqlError:'.$error[2]);
} else {
// 登録ページへ移動
  header('Location:work_ev_input.php');
}