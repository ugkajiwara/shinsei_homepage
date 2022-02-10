<?php
  session_start();
  $mode = 'input';
  $errmessage = array();

  if(isset($_POST['back']) && $_POST['back']){

  } elseif (isset($_POST['confirm']) && $_POST['confirm']){

    $_SESSION['position']  = $_POST['position'];

    if(!$_POST['name']){
      $errmessage[] = "名前を入力してください";
    }elseif(mb_strlen($_POST['name']) > 30){
      $errmessage[] = "名前が長すぎます";
    }
    $_SESSION['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');

    if(!$_POST['tel']){
      $errmessage[] = "電話番号を入力してください";
    }elseif(mb_strlen($_POST['tel']) > 30){
      $errmessage[] = "電話番号が長すぎます";
    }
    $_SESSION['tel'] = htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8');

    if(!$_POST['email']){
      $errmessage[] = "メールアドレスを入力してください";
    }elseif(mb_strlen($_POST['email']) > 100){
      $errmessage[] = "メールアドレスは100文字以内にしてください";
    }elseif( !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
      $errmessage[] = "メールアドレスが不正です";
    }
    $_SESSION['email'] = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');

    if(!$_POST['adress']){
      $errmessage[] = "お住まいの県を選択してください";
    }
    $_SESSION['adress']  = $_POST['adress'];

    if(!$_POST['message']){
      $errmessage[] = "お問い合わせ内容を選択してください";
    }
    $_SESSION['message'] = $_POST['message'];

    if(mb_strlen($_POST['detail']) > 500){
      $errmessage[] = "その他ご要望の欄は500文字以内にしてください";
    }
    $_SESSION['detail'] = htmlspecialchars($_POST['detail'], ENT_QUOTES, 'UTF-8');

    if($errmessage){
      $mode = 'input';
    }else{
      $mode = 'confirm';
    }

  }elseif (isset($_POST['send']) && $_POST['send']){
    // 送信ボタンを押した時
    $message = "お問い合わせを受け付けました。". "\r\n"
             . "\r\n"
             . "この度はシンセイホームページをご覧いただきありがとうございます。" . "\r\n"
             . "お問い合わせ内容を改めてお送りさせていただきます。" . "\r\n"
             . "今後改めて担当者よりご連絡を差し上げさせていただきます。" . "\r\n"
             . "\r\n"
             . "シンセイホームページ:https://futon-no-shinsei.com/" . "\r\n"
             . "\r\n"
             . "==============================" . "\r\n"
             . "以下、お問い合わせ内容です。" . "\r\n"
             . "==============================" . "\r\n"
             . "" . "\r\n"
             . "お名前　　　　　:" . $_SESSION['name'] . "\r\n"
             . "電話番号　　　　:" . $_SESSION['tel'] . "\r\n"
             . "メールアドレス　:" . $_SESSION['email'] . "\r\n"
             . "お住まいの県　　:" . $_SESSION['adress'] . "\r\n"
             . "お問い合わせ内容:" . $_SESSION['message'] . "\r\n"
             . "その他ご要望:" . "\r\n"
             . preg_replace("/\r\n|\r|\n/", "\r\n", $_SESSION['detail'])
             . "\r\n"
             ;

    mb_language( 'Japanese' );
    mb_internal_encoding( 'UTF-8' );
    mb_send_mail($_SESSION['email'],'【布団のシンセイ】お問い合わせありがとうございます。', $message);
    mb_send_mail('メールアドレス@gmail.com','【布団のシンセイ】お問い合わせが入りました。', $message);
    mb_send_mail('メールアドレス@gmail.com','【布団のシンセイ】お問い合わせが入りました。', $message);
    $_SESSION = array();
    $url = './thanks.php';
    header('Location: ' . $url, true, 301);
    exit;
  }else {
    $_SESSION['position']= "";
    $_SESSION['name']    = "";
    $_SESSION['tel']     = "";
    $_SESSION['email']   = "";
    $_SESSION['adress']  = "";
    $_SESSION['message'] = "";
    $_SESSION['detail']  = "";
  }
?>


<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="福岡・佐賀・長崎の布団の打ち直し、リフォームならシンセイ。長年使用してヘタってしまったお布団、甦らせます。是非一度、ご連絡ください。ご自宅へ直接引き取り・配送させていただきます！">
    <title>福岡佐賀長崎｜無料出張見積｜布団打ち直しの【シンセイ】</title>
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
  <body>



    <?php if( $mode == 'input'){?>
<!-- フォーム入力画面 -->
      <header>
        <div class="topPics">
          <!-- <img src="img/fakeIMG.png" alt="topPicture"> -->
          <div class="topPic1">
            <img src="img/top11.JPG" class="odd" alt="布団　綿　打ち直し">
          </div>
             <div class="topPic21">
               <img src="img/top21.JPG" class="even" alt="布団　打ち直しの様子">
             </div>
          <div class="topPic2">
            <img src="img/top12.JPG" class="odd" alt="様々な布団の仕様に打ち直すことができる">
          </div>
              <div class="topPic22">
                <img src="img/top22.JPG" class="even" alt="布団　打ち直し　製綿の様子">
              </div>
          <div class="topPic3">
            <img src="img/top13.JPG" class="odd" alt="羽毛布団の打ち直し">
          </div>
             <div class="topPic23">
               <img src="img/top23.JPG" class="even" alt="布団　打ち直し　機会による作業">
             </div>
        </div>


        <div class="site_header">
          <h2><a href="https://futon-no-shinsei.com/"><img src="img/icon.PNG" alt="シンセイアイコン"></a></h2>
          <div class="btn">
            <i class="top_bar"></i>
            <i class="under_bar"></i>
          </div>
        </div>
        <div class="menu">
          <ul>
            <a href="#reason"><li>選ばれる理由</li></a>
            <a href="#flow"><li>リフォームの流れ</li></a>
            <a href="#aboutFee"><li>料金について</li></a>
            <a href="#contact"><li>お問い合わせ</li></a>
          </ul>
        </div>
      </header>
      <body>
        <section class="firstView"  id="top">
          <h1>古くなった布団、<br>
            リフォームしませんか？</h1>
          <div class="notTransparent">
            <div class="text">
              <fieldset class="textA">
                <p>店舗へ赴く必要なし。<br>
                  お預かりからお届けまで全て担当させていただきます。<br>
                  見積もり、出張無料。
                </p>
              </fieldset>
              <div class="beforeAfter">
                <div class="before">
                  <h2>before</h2>
                  <img src="img/before.JPG" alt="打ち直す前の布団">
                </div>
                <div class="after">
                  <h2>after</h2>
                  <img src="img/after.JPG" alt="打ち直した後の布団">
                </div>
              </div>
             <p>毎日使用するお布団ですので、睡眠時に分泌される皮脂などの汚れが、細菌類やダニ、害虫等の理想的な繁殖場所となっております。そして、カビの発生は、それらを食物とするダニの大量発生を招き、アレルギー性疾患など身体への悪い影響がでます。布団を清潔に保つためにも、掛け布団で５年、敷布団は３年毎に打ち直しに出すのが理想的です。<br>
             また、一度中身を取り出しリフォームするので、今のサイズにご不満がある場合、変更することも可能です。そして何より厚みを取り戻すことで、保温力の向上などの効果を実感していただけると思います。<br>
             <span>長年の使用により厚みを失い、ヘタってしまったお布団、押入れの奥で眠っている思い出のお布団、この機会にリフォーム（打ち直し）してみませんか？</span></p>
           </div>
          </div>
        </section>
        <section class="reason" id="reason">
          <h2>「シンセイ」が選ばれる理由</h2>
          <div class="wrapper">
            <h3>提携工場での一貫したシステム</h3>
            <p>各所にある提携工場にて、お預かりしたお布団を他のお客様のものと混ざらないように個別管理し、殺菌、解体、綿入れからキルティング、検針と、一枚一枚丁寧に仕上げさせていただきます。</p>
            <h3>お預かり・配送の出張サービス</h3>
            <p>布団をお店に持ち込んだり、受け取りに出向いたりする手間を省けるとともに、やはりコロナ禍ですので、密である時間や空間を最小限に抑えることができます。</p>
            <h3>無料出張お見積もり</h3>
            <p>敷布団や掛け布団、羽毛布団等の布団類の打ち直しに限らず、こたつ布団や座布団、カーテンやじゅうたん、ベット等の、打ち直しから修理、仕立て直し、買い替えのご相談まで、お気軽にお問い合わせください。</p>
          </div>
        </section>
        <section class="flow" id="flow">
          <h2>リフォームの流れ</h2>
          <div class="wrapper">
             <div class="flowItems">
              <div class="flowItem">
                <img src="img/flow1.JPG" alt="打ち直す前の布団">
                <p>お電話いただいたご自宅へ伺い、古布団を預からせていただきます。お預かりしたお布団は、他のお客様の綿と混ざらないように個別管理させていただいております。</p>
              </div>
              <div class="flowItem">
                <img src="img/flow2.JPG" alt="打ち直し後の布団の柄">
                <p>仕上がりのサイズや色、柄等、仕様を決定していただきます。</p>
              </div>
              <div class="flowItem">
                <img src="img/flow3.JPG" alt="布団打ち直しの過程">
                <p>お預かりした綿のゴミやホコリなどを除去し、製綿します。出来上がった綿を、側生地に入れ機械で縫製し布団を作ります。</p>
              </div>
              <div class="flowItem">
                <img src="img/flow4.JPG" alt="布団打ち直し後">
                <p>リフォームしたお布団を、ご自宅へお届けします。お届けは、お預かりより２週間から３週間程度の期間をいただきます。</p>
              </div>
            </div>
          </div>
        </section>
        <section class="aboutFee" id="aboutFee">
          <h2>料金について</h2>
          <div class="wrapper">
            <p>Sサイズ掛け布団１枚、8800円より承っております。<br>
              掛け布団や敷布団の他にも、こたつ布団や、座布団、カーテンや絨毯等も取り扱っておりますので、料金等詳細はお気軽にお問い合せください。
            </p>
          </div>
        </section>
        <section class="contact" id="contact">
          <h2><span class="onemin">簡単１分！</span>お問い合わせ</h2>
          <div class="wrapper">
          <!-- コンタクトフォーム -->
          <fieldset>
            <legend>こちらからお問い合わせください</legend>
            <?php
              if($errmessage){
                echo '<div class="errmsg">';
                echo implode('<br>',$errmessage);
                echo '</div>';
              }else{
                echo '<p class="msg">必要事項を記入の上、確認ボタンを押してください</p>';
              }
             ?>
            <form action="./index.php" method="post" class="contactform">


              <input name="position" type="hidden" value="<?php echo $_SESSION['position'] ?>" class="position">

              <label><p><span>必須</span>お名前</p>
                <input type="text" name="name" value="<?php echo $_SESSION['name'] ?>"></label><br>

              <label><p><span>必須</span>電話番号</p>
                <input type="text" name="tel" value="<?php echo $_SESSION['tel'] ?>"></label><br>

              <label><p><span>必須</span>メールアドレス</p>
                <input type="text" name="email" value="<?php echo $_SESSION['email'] ?>"></label><br>

              <label for="prefecture"><p><span>必須</span>お住まいの県</p></label>
              <select id="prefecture" name="adress" value="">
                <option value="">選択してください</option>
                <option value="福岡県">福岡県</option>
                <option value="佐賀県">佐賀県</option>
                <option value="長崎県">長崎県</option>
              </select><br>

              <label for="message"><p><span>必須</span>お問い合わせ内容</p></label>
              <select id="message" name="message" value="">
                <option value="">選択してください</option>
                <option value="見積もりを依頼したい">見積もりをしたい</option>
                <option value="申し込みをしたい">申し込みをしたい</option>
                <option value="その他質問等">その他質問等（下の欄にご記入ください）</option>
              </select><br>

              <label><p>その他ご要望等ございましたらご記入ください(500文字以内)</p>
                <textarea cols="" lows="" name="detail" value=""><?php echo $_SESSION['detail'] ?></textarea></label><br>

              <input type="submit" name="confirm" value="確認" id="confirmbtn">
            </form>
        </fieldset>

        <div>
          <div class="callToActionMsg">
          ▽お急ぎの方はこちらから▽<br>
          お電話ください
          </div>
          <a href="tel:電話番号">
            <div class="callToAction">
              TEL
            </div>
          </a>
        </div>

        <div id="map">
          <div class="fukuoka">
            <h2>福岡/工場</h2>
            <p>〒815-0033　福岡市南区大橋3丁目13-5</p>
            <p>〒826-0042　田川市大字川宮1493-5</p>
            <p>〒811-3122　古賀市薦野1266-5</p>
            <p>〒832-0806　柳川市三橋町柳河226-1</p>
          </div>
          <div class="saga">
            <h2>佐賀</h2>
            <p>〒840-0034　佐賀市西与賀町厘外731</p>
          </div>
          <div class="nagasaki">
            <h2>長崎</h2>
            <p>〒851-3501　西海市西海町丹納郷2471-3</p>
            <p>〒857-1161　佐世保市大塔町616-88</p>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="footerTop">
        <a href="https://futon-no-shinsei.com/"><img src="img/icon.PNG" alt="シンセイアイコン"></a>
      </div>
      <div class="footerBottom">
        <p>Copyright(C) シンセイ All Rights Reserved.</p>
      </div>
    </footer>

    <div>
      <a href="#top" class="toTop">
        <i class="fas fa-chevron-up"></i>
      </a>
    </div>



      <?php }elseif( $mode == 'confirm'){ ?>
<!-- フォーム確認画面 -->
    <header>
      <div class="site_header">
        <h2><a href="https://futon-no-shinsei.com/">シンセイ</a></h2>
      </div>
    </header>
    <body class="confirmsrc">
      <form action="./index.php" method="post">
        <fieldset>
          <legend>確認内容</legend>
          <span>お問い合わせはまだ完了していません！</span>
          <p>この内容でよろしければ、送信ボタンを押してください</p>

          <p class="confirmQ">名前</p>
          <p class="confirmA"><?php echo $_SESSION['name']; ?></p>
          <p class="confirmQ">電話番号</p>
          <p class="confirmA"> <?php echo $_SESSION['tel']; ?></p>
          <p class="confirmQ">メールアドレス</p>
          <p class="confirmA"><?php echo $_SESSION['email']; ?></p>
          <p class="confirmQ">お住まいの県</p>
          <p class="confirmA"> <?php echo $_SESSION['adress']; ?></p>
          <p class="confirmQ">お問い合わせ内容</p>
          <p class="confirmA"><?php echo $_SESSION['message']; ?></p>
          <p class="confirmQ">その他ご要望等</p>
          <p class="confirmA"><?php echo nl2br($_SESSION['detail']); ?></p>
        </fieldset>
        <div class="confirmbtns">
          <input type="submit" name="send" value="送信" class="btna" id="btna">
          <input type="submit" name="back" value="修正" class="btnb">
        </div>

        <footer>
          <div class="footerTop">
            <a href="https://futon-no-shinsei.com/"><img src="img/icon.PNG" alt="シンセイアイコン"></a>
          </div>
          <div class="footerBottom">
            <p>Copyright(C) シンセイ All Rights Reserved.</p>
          </div>
        </footer>

        <script>
          $(function () {
            $('form').submit(function () {
              $(this).find(':submit').val('処理中...');
            });
          });
        </script>

  <?php } ?>
  <script src="script.js?20210921"></script>
  </body>
</html>
