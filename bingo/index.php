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
// 방문자 쿠키 확인 및 설정
$visitor_cookie_name = "visited_result_page";

// 쿠키 확인
$cookie_set = false;
if (isset($_COOKIE[$visitor_cookie_name])) {
  $cookie_set = true;
}
if (!isset($_SESSION['es_enter_bingo_temp']) || !$_SESSION['es_enter_bingo_temp']) {
  header('Location: /es/buy/');
  exit("잘못된 접근입니다.");
} else {
  unset($_SESSION['es_enter_bingo_temp']);
}

?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/layout/header.php'; ?>
<div class="app-wrapper bingo-game-index" id="buy">
  <article class="main">
    <?php // include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/modal/fireWork.php'; 
    ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/modal/tutorial.php'; ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/modal/finish/none.php'; ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/modal/finish/good.php'; ?>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/modal/finish/clear.php'; ?>
    <!-- 게임 오버 -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/bingo/main.php'; ?>
  </article>

</div>

<script>
  getGtagEmotion('플레이_팝업_뜸', '플레이_팝업_뜸');

  function goBingoResult() {
    getGtagEmotion('플레이_종료 팝업_확인', '플레이_종료 팝업_확인');
    $('.firework-area').hide();
    location.href = "/es/buy/result"
  }
  // PHP에서 전달된 쿠키 상태 변수
  // var cookieSet = <?php echo json_encode($cookie_set); ?>;

  // // 페이지 로드 후 실행
  // document.addEventListener('DOMContentLoaded', function() {
  //   if (cookieSet) {
  //     closeTutorial();
  //   } else {
  //     getGtagEmotion('플레이_팝업_뜸', '플레이_팝업_뜸');
  //   }
  // });



  // let bgm = func_getAudioSrc(JS_GAME_IDX, JS_AUDIO_LIST, 'bgm', '<?= CDN_PATH ?>');
  // bgm 리스트들

  // let soundEffectStep = 0;

  // audios = new Audios({
  //   bgmArr: bgm
  // });
</script>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/layout/footer.php'; ?>