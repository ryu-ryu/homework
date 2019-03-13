<?php
// errメッセージ系
const ERR_MESSAGE_NAME = '名前を入力してください。';
const ERR_MESSAGE_AGE = '年齢を整数で入力してください。';

//バリデーション関数
//エラーが出た際は$err=1を返し、出なかった際は$err=0を返す。
function validateName($name) {
  $err = 0;
  if (empty($name)) {
    $err = 1;
    $message = ERR_MESSAGE_NAMEl;
  }
  return [$message, $err];
}

function validateAge($age) {
  $err = 0;
  if (!preg_match('/[0-9]+/',$age)) {
    $err = 1;
    $message = ERR_MESSAGE_AGE;
  }
}
