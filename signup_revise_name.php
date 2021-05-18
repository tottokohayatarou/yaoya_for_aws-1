<?php
  session_start();

  
  $data = array(  //POST送信で送りたいデータ
    'name' => $_SESSION['signup']['name'],
  );
  unset($_SESSION['signup']['name']);
  
  $context = array(
    'http' => array(
      'method'  => 'POST',
      'header'  => implode("\r\n", array('Content-Type: application/x-www-form-urlencoded',)),
      'content' => http_build_query($data)
      )
    );
    
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/signup_input.php';  //リダイレクト先URLの準備
  $html = file_get_contents($url, false, stream_context_create($context));
  echo $html;

?>