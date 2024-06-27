<?php

define('PLATFORM_TITLE', '좋은 감정 자판기');
define('PAGE_DESC', '주어진 시간 안에 좋은 감정을 최대한 많이 뽑아 보세요!');
define('PAGE_OG_TITLE', "좋은 감정 자판기");
define('PAGE_OG_DESC', "주어진 시간 안에 좋은 감정을 최대한 많이 뽑아 보세요!");
$jsVar['JS_PAGE_DESC'] = "'" . PAGE_DESC . "'";
$jsVar['JS_PAGE_OG_TITLE'] = "'" . PAGE_OG_TITLE . "'";
$jsVar['JS_PAGE_OG_DESC'] = "'" . PAGE_OG_DESC . "'";

define('PAGE_OG_IMAGE',  "https://cdn.banggooso.com/es/assets/bingo/thumbnail.png");
$jsVar['JS_PAGE_OG_IMAGE'] = "'" . PAGE_OG_IMAGE . "'";

define('PAGE_OG_IMAGE_M',  "https://cdn.banggooso.com/es/assets/bingo/thumbnail_m.png");
$jsVar['JS_PAGE_OG_IMAGE_M'] = "'" . PAGE_OG_IMAGE_M . "'";

?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/include/common.php'; ?>
<?php
// if (!isset($_SESSION['es_u_aid'])) {
//   echo "<script>location.replace('/es/')</script>";
// }
define("PAGE_TYPE", "buy");
define("PAGE_TITLE", "좋은 감정 자판기");

$jsVar['JS_PAGE_TYPE'] = "'" . PAGE_TYPE . "'";

// 쿠키관련 설정 전역적으로 index.php에 우선 선언
$visitor_cookie_name = "visited_before";
$visitor_cookie_value = "yes";
$cookie_set = false;

?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/layout/header.php'; ?>
<div class="app-wrapper bg-gradient1" id="loading">
  <article class="sell">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/start/index.php'; ?>
  </article>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/layout/footer.php'; ?>