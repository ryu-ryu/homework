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
    <p>新しい会員情報を入力してください。</p>
    <form action="a2.php" method="post">
    <p>名前<input type="text" name="name"></p>
    <p>年齢<input type="text" name="age"></p>
    <input type="submit" value="更新確定">
    <?php
    echo '<input type="hidden" name="id" value="',$_REQUEST['id'],'">';
    ?>
    </form>
    <br>
    <a href="lp.php">戻る</a>

    <footer>
   				<p><small>Copyright&copy;<a href"#">西島動物園</a>
   				All rights Reserved.</small></p>
    </footer>
   </body>
 </html>
