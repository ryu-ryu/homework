<!DOCTYPE html>
<html lang=ja dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>課題１</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header style="background-color:lime">
    <h1>ユーザー</h1>
    </header>
    <table>
    <tr><th>名前</th><th>年齢</th></tr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=zoo;charset=utf8','staff', 'password');
  foreach ($pdo->query('select * from member') as $row) {
    echo '<tr>';
    echo '<form class="ib" action="a1.php" method="post">';
  	echo '<td>',$row['name'], '</td>';
    echo '<td>',$row['age'], '</td>';
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
  	echo '<td><input type="submit" value="更新"></td>';
  	echo '</form> ';
  	echo '<form class="ib" action="c1.php" method="post">';
  	echo '<input type="hidden" name="name" value="', $row['name'], '">';
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
  	echo '<td><input type="submit" value="削除"></td>';
  	echo '</form>';
    echo '</tr>';
  	echo "\n";
  }
 ?>
</table>
<br>
 <a href="b1.php">新規登録</a>

 <footer>
				<p><small>Copyright&copy;<a href"#">西島動物園</a>
				All rights Reserved.</small></p>
 </footer>
  </body>
</html>
