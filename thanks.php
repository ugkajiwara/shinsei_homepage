<?php
    $_SESSION['position']= "";
    $_SESSION['name']    = "";
    $_SESSION['tel']     = "";
    $_SESSION['email']   = "";
    $_SESSION['adress']  = "";
    $_SESSION['message'] = "";
    $_SESSION['detail']  = "";
?>


<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>【シンセイ】お問い合わせありがとうございます。</title>
      <link rel="stylesheet" href="css/styles.css?20210921">
      <link rel="icon" href="img/favicon.ico">
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://kit.fontawesome.com/c87141f0c8.js" crossorigin="anonymous"></script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159683342-1">
      </script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-159683342-1');
      </script>

  </head>

<!-- 完了画面 -->
  <header>
    <div class="site_header">
      <h2><a href="https://futon-no-shinsei.com/">シンセイ</a></h2>
    </div>
  </header>
  <body class="done">
    <p>送信しました。この度はお問い合わせありがとうございました。<br>
    後ほど担当者よりご連絡を差し上げさせていただきます。</p>
    <a href="https://futon-no-shinsei.com/" class="donetotop">トップへ戻る</a>
  </body>
</html>