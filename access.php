<?php
//DB接続
try{
  $pdo=new PDO('mysql:host=localhost;dbname=zoo;charset=utf8','staff', 'password');
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOExeption $e){
  echo "エラーメッセージ：{$e->getMessage()}";
}
 ?>
