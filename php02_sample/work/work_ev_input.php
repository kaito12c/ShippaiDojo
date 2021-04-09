<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>授業後振り返りシート</title>
</head>

<body>
  <form action="work_ev_create.php" method="post">
    <fieldset>
      <legend>授業後振り返りシート</legend>
      <a href="work_ev_read.php">一覧画面</a>
      <div>名前： <input type="text" name="name"></div>
      <div>働いた日： <input type="date" name="wa"></div>
      <div>働いた場所： <select size="1" name="where"></div>
        <option value="odori">大通校</option>
        <option value="k8">北８校</option>
        <option value="msn">美園</option>
      </select>
      <div>一緒に働いた先生： <select size="1" name="ww1"></div>
        <option value="keito">けいと先生</option>
        <option value="hanako">はなこ先生</option>
        <option value="kenji">けんじ先生</option>
      </select>      
      <div>一緒に働いた先生： <select size="1" name="ww2"></div>
        <option value="keito">けいと先生</option>
        <option value="hanako">はなこ先生</option>
        <option value="kenji">けんじ先生</option>ß
      </select>      
      <div>働いた充実度： <select size="1" name="wp"></div>
      <option value="1">すごく充実していた</option>
        <option value="2">充実していた</option>
        <option value="3">普通</option>
        <option value="4">充実できなかった</option>
        <option value="5">たくさん課題が残った</option>
      </select>    
      <div>理由： <input type="text" name="reason"></div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>