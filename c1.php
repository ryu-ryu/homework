<!DOCTYPE html>
<html lang=ja dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>課題１</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header style="background-color:red">
    <h1>削除</h1>
    </header>
    <?php
      $pdo=new PDO('mysql:host=localhost;dbname=zoo;charset=utf8','staff', 'password');
      $sql=$pdo->prepare('delete from member where id=?');
      if ($sql->execute( [$_REQUEST['id']] )) {
      	echo $_REQUEST['name'],'の削除が完了しました。';
      } else {
      	echo $_REQUEST['name'],'の削除に失敗しました。';
      }
    ?>
    <br><br>
    <a href="lp.php">戻る</a>
    
    <footer>
   				<p><small>Copyright&copy;<a href"#">西島動物園</a>
   				All rights Reserved.</small></p>
    </footer>
   </body>
 </html>
