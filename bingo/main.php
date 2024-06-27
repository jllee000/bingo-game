<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/include/common.php'; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/bingo-text.php'; ?>

<div class="bingo-content-area">
  <div class="bingo-game-area">
    <div class="bingo-content-wrap">
      <div class="bingo-top-wrap">
        <div class="timer-wrap">
          <div class="timer-sec">
            <div class="timer-sec-txt">60</div>
          </div>
          <div class="timer-outer">
            <div class="timer-inner">
              <div class="timer-inner-glow"></div>
            </div>
          </div>
        </div>

        <div class="sound-toggle" onclick="soundClick();">
          <img src="https://cdn.banggooso.com/es/assets/bingo/sound/on.png" class="img-width " />
        </div>
      </div>

      <div class="bingo-wrap">
        <div class="bingo-container">
          <?php
          // goodTxt 배열에서 각 텍스트를 가져와서 사각형으로 배치합니다. 
          foreach ($goodTxt as $key => $text) {
            echo '<div class="bingo-box" id="' . ($key + 1) . '">
                <div class="intro-box" id="intro-box-' . ($key + 1) . '">
                  <div class="flip">    
                    <div class="flip-card">
                      <div class="front">
                        
                      </div>
                      <div class="back"></div>
                    </div>
                  </div>
                </div>
                <div class="finish-box" id="finish-box-' . ($key + 1) . '"></div>
                <div class="hide-box" id="hide-box-' . ($key + 1) . '"></div>' .
              str_replace('[]', '<br>', $text)
              .
              '</div>';
          }
          ?>
        </div>

      </div>
      <div class="bingo-input-area">

        <div class="bingo-input-box">
          <input id="bingo-input" class="bingo-input" placeholder="등장하는 문구를 입력하세요" onkeydown="if (event.keyCode === 13) highlightBingo()" />
          <button id="bingo-input-btn" class="bingo-input-btn" onclick="highlightBingo()">입력</button>
        </div>
      </div>

    </div>
    <!-- <div class="tutorial-relative-area">
      <div class="tutorial-absolute-area" onclick="toggleTimer();"></div>
    </div> -->
  </div>

</div>
<script src="/es/assets/js/bingoSound.js<?= $cacheVer ?>"></script>
<script>
  let resizeGameWrap = null;
  var agent = "win16|win32|win64|macintel|mac";
  var mySelect2 = [];
  const audio = new Audio(soundEffect[0]);
  audio.play();


  if (agent.indexOf(navigator.platform.toLowerCase()) < 0) { //모바일로 접속
    var bingoHeight = $('.timer-wrap  + .bingo-wrap').height() + 16;
    if (checkMobile() == 0) {
      if (window.innerHeight <= 900 && window.innerHeight > 680) {
        $('.bingo-input-box').css('top', bingoHeight);
        $('.bingo-container').css('width', '70vw');
        $('.bingo-input').css('width', '80%');
        $('.bingo-content-wrap').css('height', '50vh');
      } else if (window.innerHeight <= 680) {
        $('.bingo-input-box').css('top', bingoHeight);
        $('.bingo-container').css('width', '70vw');
        $('.bingo-input').css('width', '80%');
        $('.bingo-content-wrap').css('height', '56vh');
      } else {
        $('.bingo-input-box').css('top', bingoHeight + 60);
      }
    } else if (checkMobile() == 1) {
      $('.bingo-input-box').css('top', bingoHeight + 50);
      document.getElementById('bingo-input').addEventListener('focus', function() {
        window.scrollTo(0, 0); // bingo-input이 focus될 때 항상 화면을 맨 위로 이동시킵니다.
        if (window.innerHeight <= 750 && window.innerHeight > 680) {
          $('.bingo-input').css('width', '80%');
          $('.bingo-container').css('width', '75vw');
          $('.bingo-game-index .bingo-content-wrap').attr('style', 'height:55vh !important');
        } else if (window.innerHeight <= 680) {
          $('.bingo-input').css('width', '80%');
          $('.bingo-container').css('width', '75vw');
          $('.bingo-game-index .bingo-content-wrap').attr('style', 'height:59vh !important');
        } else {
          $('.bingo-input').css('width', '90%');
          $('.bingo-container').css('width', '80vw');
          $('.bingo-game-index .bingo-content-wrap').attr('style', 'height:50vh !important');
        }
      });
    }
    window.addEventListener('scroll', function() {
      window.scrollTo(0, 0); // 항상 화면 상단으로 스크롤을 이동시킵니다.
    });
    document.getElementById('bingo-input').addEventListener('focus', function() {
      window.scrollTo(0, 0); // bingo-input이 focus될 때 항상 화면을 맨 위로 이동시킵니다.
    });
    document.getElementById('bingo-input').addEventListener('blur', e => {
      $('.bingo-content-wrap').css('position', 'relative');
    });
  } else {
    $('.bingo-input-area').css('top', '33rem')
    $('.bingo-input-area').css('height', 'auto');
  }

  // resizeGameWrap = function() {
  //   if (document.activeElement.id !== 'bingo-input') {
  //     $(".bingo-content-wrap").css("height", window.innerHeight + "px");
  //   }
  // }
  // $(window).resize(resizeGameWrap);




  function handleFocus() {
    window.scrollTo(0, 0); // 입력창 포커스시 화면 맨 위로 스크롤
  }


  function isMobileKeyboardActive() {
    // 현재의 window 높이와 viewport의 높이를 비교하여 차이를 계산합니다.
    var windowHeight = window.innerHeight;
    var threshold = 100; // 임계값 (픽셀)

    // 높이 차이가 임계값보다 작으면 키보드가 활성화된 상태로 간주합니다.
    return windowHeight < document.documentElement.clientHeight - threshold;
  }

  function checkMobile() {
    const mobileType = navigator.userAgent.toLowerCase();

    if (mobileType.indexOf('android') > -1) {
      return 1;
    } else if (mobileType.indexOf('iphone') > -1 || mobileType.indexOf('ipad') > -1 || mobileType.indexOf('ipod') > -1) {
      return 0;
    } else {
      return -1;
    }
  };
</script>
<script src="/es/assets/js/bingo.js<?= $cacheVer ?>"></script>