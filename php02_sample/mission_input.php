<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>失敗道場（ミッション提供の部屋）</title>
</head>

<body>
  <form action="mission_create.php" method="post">
    <fieldset>
      <legend>あなたが課すミッション教えて下さい。</legend>
      <a href="mission_read.php">一覧画面</a>
      <div>
        ミッション提供者<input type="text" name="name">
      </div>
      <div>
        ミッション内容<input type="text" name="mission">
      </div>
      <div>
        締切 <input type="date" name="deadline">
      </div>
      <div>
        <button>挑戦求ム</button>
      </div>
    </fieldset>
  </form>

</body>

</html>