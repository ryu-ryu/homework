<!DOCTYPE html>
<html lang=ja dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>課題１</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
<?php
if (isset($_REQUEST['command'])) {
	switch ($_REQUEST['command']) {
	case 'update':
	  echo '<h1 style="background-color:aqua">更新</h1>';
	  echo '<p>新しい会員情報を入力してください。</p>';
	  echo '<form action="output.php" method="post">';
	  echo '<p>名前<input type="text" name="name"></p>';
	  echo '<p>年齢<input type="text" name="age"></p>';
	  echo '<input type="submit" value="更新確定">';
		echo '<input type="hidden" name="command" value="update">';
		echo '<input type="hidden" name="id" value="',$_REQUEST['id'],'">';
		echo '</form>';
	  break;
	case 'insert':
	  echo '<h1 style="background-color:pink">新規登録</h1>';
		echo '<p>会員情報を入力してください。</p>';
		echo '<form action="output.php" method="post">';
		echo '<p>名前<input type="text" name="name"></p>';
		echo '<p>年齢<input type="text" name="age"></p>';
		echo '<input type="hidden" name="command" value="insert">';
		echo '<input type="submit" value="登録確定">';
		echo '</form>';
		break;
	case 'delete':
	  echo '<h1 style="background-color:red">削除</h1>';
		echo '<p>本当に',$_REQUEST['name'],'を削除しますか？</p>';
		echo '<form action="output.php" method="post">';
		echo '<input type="submit" name="yes" value="はい">';
		echo '<input type="hidden" name="command" value="delete">';
		echo '<input type="hidden" name="id" value="',$_REQUEST['id'],'">';
		echo '<input type="hidden" name="name" value="',$_REQUEST['name'],'">';
		echo '</form>';
		echo '<form action="output.php" method="post">';
		echo '<input type="submit" name="no" value="いいえ">';
		echo '</form>';
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
