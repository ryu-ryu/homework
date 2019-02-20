<!DOCTYPE html>
<html lang=ja dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>課題１</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
<?php
if(isset($_REQUEST['no'])){
	header('Location:landing-page.php');
	exit;
}
$pdo=new PDO('mysql:host=localhost;dbname=zoo;charset=utf8','staff', 'password');
if (isset($_REQUEST['command'])) {
	switch ($_REQUEST['command']) {
	case 'update':
	  echo '<h1 style="background-color:aqua">更新</h1>';
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
		break;
	case 'insert':
	  echo '<h1 style="background-color:pink">新規登録</h1>';
		$sql=$pdo->prepare('insert into member values(null,?,?)');
	  $age=mb_convert_kana($_REQUEST['age'],'n');
	  if (empty($_REQUEST['name'])) {
	  	echo '名前を入力してください。';
	  } else
	  if ( !preg_match('/[0-9]+/',$age) ) {
	  	echo '年齢を整数で入力してください。';
	  } else
	  if ($sql->execute( [ htmlspecialchars($_REQUEST['name']),$age ] )) {
	  	echo '新規登録が完了しました。';
	  } else {
	  	echo '新規登録に失敗しました。';
	  }
		break;
	case 'delete':
	  echo '<h1 style="background-color:red">削除</h1>';
		$sql=$pdo->prepare('delete from member where id=?');
		if ($sql->execute( [$_REQUEST['id']] )) {
			echo $_REQUEST['name'],'の削除が完了しました。';
		} else {
			echo $_REQUEST['name'],'の削除に失敗しました。';
		}
		break;
	}
}
?>
<br>
<a href="homepage.php">戻る</a>

<footer>
	<p id="copyright"><small>Copyright&copy;<a href"#">西島動物園</a>
	All rights Reserved.</small></p>
</footer>
 </body>
</html>
