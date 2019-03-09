<!DOCTYPE html>
<html lang=ja dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>課題１</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

<?php
//削除「本当に削除しますか？」でいいえを選択
if(isset($_REQUEST['no'])){
	header('Location:homepage.php');
	exit;
}
//ブラウザでエラー非表示
ini_set('display_errors',0);

//バリデーション関数の有効化
require_once 'validation.php';

//リクエストパラメータ
$name=$_REQUEST['name'];
$age=$_REQUEST['age'];
$id=$_REQUEST['id'];

//DB接続
require_once 'access.php';

if (isset($_REQUEST['command'])) {
	switch ($_REQUEST['command']) {
	case 'update':
	  echo '<h1 style="background-color:aqua">更新</h1>';
		$sql=$pdo->prepare('update member set name=?, age=? where id=?');

    //バリデーション
    list($name,$age,$err)=val($name,$age);
    if($err==1)echo $name;break;

		//三項演算子を用いた。
    echo $sql->execute([htmlspecialchars($name),$age,$id]) ? '更新に成功しました。':'更新に失敗しました。';
	  /*以下と同義
		if ($sql->execute([htmlspecialchars($name),$age,$id])) {
		  echo '更新に成功しました。';
	  } else {
		  echo '更新に失敗しました。';
	  }
		*/
		break;


	case 'insert':
	  echo '<h1 style="background-color:pink">新規登録</h1>';
		$sql=$pdo->prepare('insert into member values(null,?,?)');

		//バリデーション
    list($name,$age,$err)=val($name,$age);
    if($err==1){echo $name;break;}

    //三項演算子を用いた。
	  echo $sql->execute([htmlspecialchars($name),$age]) ? '新規登録が完了しました。':'新規登録に失敗しました。';
		/*以下と同義
		if ($sql->execute( [ htmlspecialchars($name),$age])) {
	  	echo '新規登録が完了しました。';
	  } else {
	  	echo '新規登録に失敗しました。';
	  }
		*/
		break;


	case 'delete':
	  echo '<h1 style="background-color:red">削除</h1>';
		$sql=$pdo->prepare('delete from member where id=?');
		if ($sql->execute( [$id] )) {
			echo $name,'の削除が完了しました。';
		} else {
			echo $name,'の削除に失敗しました。';
		}
		/*三項演算子を用いて
    echo $sql->execute([$id]) ? $name,'の削除が完了しました。': $name,'の削除に失敗しました。';
		のようにかくと","でParse errorとなるのでここではifを使った。*/
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
