$(function(){

  // メニューボタン
  $('.btn').click(function(){
    // $('.menu').toggleClass('isClicked');
    $('.top_bar').toggleClass('topChanged');
    $('.under_bar').toggleClass('underChanged');

    if ($('.menu').hasClass('isClicked')){
      $('.menu').slideUp() .removeClass('isClicked');
    }else{
      $('.menu').slideDown() .addClass('isClicked');
    }
  });

  // メニューリンク
  $('a').click(function(){
    var _link = $(this).attr('href');
    var _dis  = $(_link).offset().top;

    $('html').animate({scrollTop:_dis});
  });

// スクロールされたときのヘッダー変化に関して。ANDトップへボタン。
  $(window).scroll(function(){
    if(!($(window).scrollTop() == 0)){
      $('.site_header').addClass('top_scrolled');
      $('.toTop').addClass('scrolled');
    }else{
      $('.site_header').removeClass('top_scrolled');
      $('.toTop').removeClass('scrolled');
    }
  });

// トップ画像のセットインターバル
  $(function(){
    var _t = 3001
    setInterval(function(){
      _t ++;
      if(_t%2 == 1){
        $('.even').addClass('outOfDis').removeClass('zoom');
        $('.odd').addClass('zoom');
      }else{
        $('.even').removeClass('outOfDis').addClass('zoom');
        $('.odd').removeClass('zoom');
      }
    },_t);
  });


// お問い合わせフォームのエラーメッセージ表示時の画面スクロール固定

    window.onload = function (){
      var positionValue = $('.position').attr('value');
      $(window).scrollTop(positionValue);
      }

    $('#confirmbtn').click(function(){
      var position = $(window).scrollTop();
      $(".position").val(position);

    });





});
