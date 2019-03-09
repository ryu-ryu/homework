<!DOCTYPE html>
<html lang=ja dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>課題１</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header style="background-color:lime">
    <h1>ユーザー</h1>
    </header>
    <table>
    <tr><th>名前</th><th>年齢</th></tr>
<?php
  require_once 'access.php';
  foreach ($pdo->query('select * from member') as $row) {
    echo '<tr>';
  	echo '<td>',$row['name'], '</td>';
    echo '<td>',$row['age'], '</td>';
    //更新
    echo '<form class="ib" action="input.php" method="post">';
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<input type="hidden" name="command" value="update">';
  	echo '<td><input type="submit" value="更新"></td>';
  	echo '</form> ';
    //削除
  	echo '<form class="ib" action="input.php" method="post">';
  	echo '<input type="hidden" name="name" value="', $row['name'], '">';
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<input type="hidden" name="command" value="delete">';
  	echo '<td><input type="submit" value="削除"></td>';
  	echo '</form>';

    echo '</tr>';
  	echo "\n";
  }
 ?>
</table>
<br>
 <form class="ib" action="input.php" method="post">
 <input type="hidden" name="command" value="insert">
 <input type="submit" value="新規登録">
 </form>

 <footer>
				<p id="copyright"><small>Copyright&copy;<a href"#">西島動物園</a>
				All rights Reserved.</small></p>
 </footer>
  </body>
</html>
