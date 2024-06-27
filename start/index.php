<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/include/common.php'; ?>
<?php

define("PAGE_TYPE", "buy");
define("PAGE_TITLE", "좋은 감정 자판기");

$jsVar['JS_PAGE_TYPE'] = "'" . PAGE_TYPE . "'";

define('PLATFORM_TITLE', '좋은 감정 자판기');
define('PAGE_DESC', '주어진 시간 안에 좋은 감정을 최대한 많이 뽑아 보세요!');
define('PAGE_OG_TITLE', "좋은 감정 자판기");
define('PAGE_OG_DESC', "주어진 시간 안에 좋은 감정을 최대한 많이 뽑아 보세요!");
$jsVar['JS_PAGE_DESC'] = "'" . PAGE_DESC . "'";
$jsVar['JS_PAGE_OG_TITLE'] = "'" . PAGE_OG_TITLE . "'";
$jsVar['JS_PAGE_OG_DESC'] = "'" . PAGE_OG_DESC . "'";


define('PAGE_OG_IMAGE', "https://cdn.banggooso.com/es/assets/bingo/thumbnail.png");
$jsVar['JS_PAGE_OG_IMAGE'] = "'" . PAGE_OG_IMAGE . "'";
define('PAGE_OG_IMAGE_M',  "https://cdn.banggooso.com/es/assets/bingo/thumbnail_m.png");
$jsVar['JS_PAGE_OG_IMAGE_M'] = "'" . PAGE_OG_IMAGE_M . "'";
?>

<style>
  #buy .bingo-nonmember-modal {
    display: none !important;
  }
</style>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/layout/header.php'; ?>
<div class="app-wrapper bingo-start-index" id="buy">
  <div class="bingo-nonmember-modal">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/modal/banggooso-login-ver-send-modal.php'; ?>
  </div>
  <article class="main">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/layout/app_header.php'; ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/start/main.php'; ?>
  </article>
</div>
<script type="text/JavaScript" src="/es/assets/js/home.js<?= $cacheVer ?>"></script>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/layout/footer.php'; ?>
<script>
  function closeModal(_modalName) {
    if (_modalName == 'nonmembers') {
      getGtagEmotion('인트로_팝업_닫기', '인트로_팝업_닫기');
      $('.bingo-nonmember-modal').hide();
    }
  }

  let isActive = false;
  let _isLogin = false;
  $(document).ready(function() {
    _isLogin = login();

    $('.bingo-nonmember-modal .send-modal-modal-content-img').empty();
    $('.bingo-nonmember-modal .send-modal-modal-content-img').append(`<div class="nonmember-modal-bingo-flex"><div><img class="img-width" src="https://cdn.banggooso.com/es/assets/bingo/nonmember1.png"/></div><div><img class="img-width" src="https://cdn.banggooso.com/es/assets/bingo/nonmember2.png"/></div></div>`)

    $('.bingo-nonmember-modal .close-modal').removeAttr("onclick");
    $('.bingo-nonmember-modal .close-modal').attr('onclick', 'closeModal("nonmembers")');
    $('.bingo-nonmember-modal .no-login-btn').removeAttr("onclick");
    $('.bingo-nonmember-modal .no-login-btn').attr('onclick', 'closeModal("nonmembers")');

  });
</script>