<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>失敗道場（ミッション実行の部屋）</title>
</head>

<body>
  <form action="result_create.php" method="post">
    <fieldset>
      <legend>あなたが挑んだミッション結果</legend>
      <a href="result_read.php">一覧画面</a>
      <div>
        名前<input type="text" name="name">
      </div>
      <div>
        ミッション実行結果<input type="text" name="result">
      </div>
      <div>
        ミッションやってみた感想<input type="text" name="think">
      </div>
      <div>
        <button>挑戦しました。</button>
      </div>
    </fieldset>
  </form>

</body>

</html>