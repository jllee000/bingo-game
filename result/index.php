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
$visitor_cookie_name = "visited_result_page";
$visitor_cookie_value = "yes";

// 방문한 적이 없다면 쿠키 설정
if (!isset($_COOKIE[$visitor_cookie_name])) {
  setcookie($visitor_cookie_name, $visitor_cookie_value, time() + (86400 * 30), "/es");
  $first_visit = true;
} else {
  $first_visit = false;
}
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/layout/header.php'; ?>
<style>
  .bingo-result-app-wrapper .top-bar.buy {
    background: white !important;

  }

  .bingo-result-app-wrapper .minus-modal {
    display: none;
  }

  .bingo-result-app-wrapper .top-bar.buy .title {
    color: black !important;
  }
</style>
<div class="app-wrapper bingo-result-app-wrapper" id="buy">
  <article class="main">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/layout/app_header.php'; ?>

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/modal/about.php';
    ?>
    <div class="bingo-result-nonmember"><?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/modal/banggooso-login-ver-send-modal.php'; ?></div>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/modal/check/none.php'; ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/modal/check/minus.php'; ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/modal/check/noHeart.php'; ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/result/main.php'; ?>
  </article>
  <!-- 모달 -->
</div>