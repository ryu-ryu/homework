<!DOCTYPE html>
<html lang=ja dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>課題１</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header style="background-color:aqua">
    <h1>更新</h1>
    </header>
<?php
  $pdo=new PDO('mysql:host=localhost;dbname=zoo;charset=utf8','staff', 'password');
  $sql=$pdo->prepare('update member set name=?, age=? where id=?');
  $age=mb_convert_kana($_REQUEST['age'],'n');
  if (empty($_REQUEST['name'])) {
  	echo '名前を入力してください。';
  } else
  if ( !preg_match('/[0-9]+/',$age) ) {
  	echo '年齢を整数で入力してください。';
  } else
  if ($sql->execute([htmlspecialchars($_REQUEST['name']),$age, $_REQUEST['id']])) {
  	echo '更新に成功しました。';
  } else {
  	echo '更新に失敗しました。';
  }
?>
<br>
<a href="lp.php">戻る</a>

<footer>
       <p><small>Copyright&copy;<a href"#">西島動物園</a>
       All rights Reserved.</small></p>
</footer>
</body>
</html>
