<style>
  body {}

  ::-webkit-scrollbar {
    display: none !important;
  }

  #buy article.main {
    overflow: auto !important;
    background: white !important;
  }
</style>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/bingo-text.php'; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/include/common.php'; ?>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/es/modules/es_dao.php';
$dao = new ES_DAO(); // dao 생성
$dao->setMoneyLogging($esUserInfo['idx'], $userId, 1);

?>
<div class="bingo-result">
  <div class="content bingo-result-content">
    <div class="result-title"><span class="result-title-lv"></span> 등극</div>
    <div class="bingo-result-stastistic">
      <div class="stastistic-title">나의 기록</div>
      <div class="stastistic-my-txt stastistic-my-txt-1">
        <div class="stastistic-img"><img class="img-width" src="https://cdn.banggooso.com/es/assets/bingo/box1.png" /></div>
        <div>내가 뽑은 좋은 감정 : <span class="my-cnt-txt">5</span>개</div>

      </div>
      <div class="stastistic-my-txt">
        <div class="stastistic-img"><img class="img-width" src="https://cdn.banggooso.com/es/assets/bingo/box2.png" /></div>
        <div>내가 달성한 긍정 빙고 : <span class="bingo-cnt-txt">3</span>줄</div>
      </div>
    </div>
    <div class="bingo-wrap">
      <div class="bingo-container">
        <div class="bingo-click-cover"></div>
        <?php
        // goodTxt 배열에서 각 텍스트를 가져와서 사각형으로 배치합니다.
        foreach ($goodTxt as $key => $text) {
          echo '<div onclick ="toggleBingo(' . ($key + 1) . ');" class="result-bingo-box" id="result-bingo-box-' . ($key + 1) . '">' . '<div class="result-select-box" id="result-select-box-' . ($key + 1) . '"></div>' . '<div class="result-success-box" id="result-success-box-' . ($key + 1) . '"></div>' . '<div class="result-hide-box" id="result-hide-box-' . ($key + 1) . '"></div>' .   str_replace('[]', '<br>', $text) . '</div>';
        }
        ?>
      </div>

      <div class="bingo-btn-wrap">
        <div class="styled-button showEmotion-button" onclick=" showMyEmotion();">
          <div class="showemotion-txt">내가 뽑은 감정 확인하기</div>
          <div class="showemotion-icon"><img class="img-width" src="https://cdn.banggooso.com/es/assets/bingo/heart1.png" /></div>
        </div>
        <div class="styled-button restart-button" onclick="restartBingo();">
          다시 도전하기
        </div>
      </div>

    </div>
    <div class="result-share-txt-area">
      <div class="result-share-txt-img"><img src="https://cdn.banggooso.com/es/assets/bingo/sharetxt.png" class="img-width" /></div>
      <div class="share-about-txt"><img src="https://cdn.banggooso.com/es/assets/bingo/sharehere.png" class="img-width" /></div>
    </div>
    <div class="bingo-result-about">
      <div class="click-about-zone" onclick="openAbout()"></div>
      <div><img src="https://cdn.banggooso.com/es/assets/bingo/about.png" class="img-width" /></div>
      <div><?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/buy/result/getCard.php'; ?>
      </div>
    </div>
  </div>
</div>
<script>
  // 결과페이지
  $('.top-bar .top-bar-wrapper .back-btn img').attr('src', 'https://cdn.banggooso.com/es/assets/images/icon/prev.png');
  $('.top-bar .top-bar-wrapper .back-btn').attr('onclick', 'goBackGame()');
  var mySelectJson = localStorage.getItem('mySelect2');
  var mySelectArray = JSON.parse(mySelectJson);
  let mySelect = [...new Set(mySelectArray)];
  let $myCost = getCost();
  let $minusCost = 0;
  var bingo_set = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9, 10, 11, 12],
    [13, 14, 15, 16],
    [1, 6, 11, 16],
    [4, 7, 10, 13],
    [1, 5, 9, 13],
    [2, 6, 10, 14],
    [3, 7, 11, 15],
    [4, 8, 12, 16],
  ];
  var bingo_success = []; // 빙고에 성공한 세트를 저장할 배열
  var bingo_cnt = 0; // 빙고에 성공한 횟수를 저장할 변수


  async function useHeart() {
    const data = {
      proc: 'use-heart',
      csrf_token: JS_CSRF,
      price: 1,
      card_idx: 0,
      purpose: 'open_bingo'
    };

    $.ajax({
      type: 'post',
      url: '/es/modules/api.php',
      dataType: 'json',
      data: data,
      async: false,

      success: (_json) => {
        $minusCost = _json.code.result;
      },
      error: function(request, status, error) {
        console.log(error)
      }
    })
  }

  function getCost() {
    let cost = null;

    const data = {
      proc: 'page-init',
      csrf_token: JS_CSRF,
    };

    $.ajax({
      type: 'get',
      url: '/es/modules/api.php',
      dataType: 'json',
      data: data,
      async: false,
      success: (_json) => {
        const isLogin = checkLogin();

        if (isLogin) {
          cost = _json.response.result.money;
        } else {

          return false;
        }
      },
      error: function(request, status, error) {
        console.log(error)
      }
    })
    return cost;
  }

  function goBackGame() {
    location.href = "/es/buy/start"
  }


  // mySelect의 요소들을 가지고 만들 수 있는 모든 가능한 세트 생성
  var possibleSets = [];
  for (var i = 0; i < mySelect.length; i++) {
    for (var j = i + 1; j < mySelect.length; j++) {
      for (var k = j + 1; k < mySelect.length; k++) {
        for (var l = k + 1; l < mySelect.length; l++) {
          possibleSets.push([mySelect[i], mySelect[j], mySelect[k], mySelect[l]]);
        }
      }
    }
  }
  // 가능한 세트 중에 bingo_set에 포함된 세트가 있는지 확인
  for (var m = 0; m < possibleSets.length; m++) {
    var currentSet = possibleSets[m];
    for (var n = 0; n < bingo_set.length; n++) {
      if (bingo_set[n].every((elem) => currentSet.includes(elem))) {
        bingo_success.push(currentSet); // 빙고에 성공한 세트를 bingo_success에 추가
        bingo_cnt++; // 빙고에 성공한 횟수 증가
        break;
      }
    }
  }

  // bingo_success 배열을 하나의 배열로 펼쳐서 저장
  bingo_success = [...new Set(bingo_success)];
  bingo_success = bingo_success.flat();

  resultLevel();
  if (mySelect.length == 0) {
    $('.result-notice .notice-txt').empty();
    $('.result-notice .notice-txt').append(`좋은 감정은 얼마든지 있으니까!<br/>다시 한 번 도전해봐요!`);
  }
  $('.my-cnt-txt').text(mySelect.length);
  $('.bingo-cnt-txt').text(bingo_cnt);
  mySelect.forEach((element) => {
    $(`#result-hide-box-${element}`).hide();
    $(`#result-select-box-${element}`).show();
    $(`#result-select-box-${element}`).attr('style', 'background-image:none !important')
    $(`#result-select-box-${element}`).css('background-image', `url('https://cdn.banggooso.com/es/assets/bingo/box1.png')`);
  });
  bingo_success.forEach((element) => {
    $(`#result-success-box-${element}`).show();
    $(`#result-success-box-${element}`).css('display', 'flex');
    $(`#result-select-box-${element}`).css('background-image', `none`);
    $(`#result-success-box-${element}`).css('background-image', `url('https://cdn.banggooso.com/es/assets/bingo/box2.png')`);
  });
  var selectedBoxes = []; // 선택된 상자의 인덱스를 추적하는 배열
  let toggleState = 0;



  function toggleBingo(_index) {
    const isLogin = checkLogin();
    if (isLogin && toggleState == 0) {
      toggleState = 0;
    } else if (toggleState == 1) {
      var selectBox = $(`#result-select-box-${_index}`);
      var successBox = $(`#result-success-box-${_index}`);

      // 선택된 상자의 인덱스를 selectedBoxes 배열에서 탐색
      var selectedIndex = selectedBoxes.indexOf(_index);
      var mySelectIndex = mySelect.indexOf(_index);
      var successIndex = bingo_success.indexOf(_index);
      // 선택된 상자가 아니라면 배열에 추가하고 selectBox
      if (selectedIndex === -1 && mySelectIndex >= 0) {
        selectedBoxes.push(_index);

        selectBox.hide();
        if (successIndex !== -1) {

          successBox.hide();
        }
      } else if (mySelectIndex >= 0) {
        // 이미 선택된 상자라면 배열에서 제거하고 selectBox를 숨김
        selectedBoxes.splice(selectedIndex, 1);
        selectBox.show();
        if (successIndex !== -1) {
          successBox.show();
        }
      }
    }

  }
  if ($myCost >= 0) {
    $('.bingo-click-cover ').hide();
  } else if (!isLogin || $myCost <= 0) {
    $('.bingo-click-cover ').show();
  }
  $('.minus-close').click(function() {
    getGtagEmotion('결과_감정 확인 팝업_닫기', '결과_감정 확인 팝업_닫기');
    $('.minus-modal').hide();
  });
  $('.minus-btn').click(async function() {
    getGtagEmotion('결과_감정 확인 팝업_확인', '결과_감정 확인 팝업_확인');
    toggleState = 1;
    await useHeart();
    $('.minus-modal').hide();
  });

  function showMyEmotion() {
    const isLogin = checkLogin();
    if (mySelect.length == 0) {
      // 아예 맞춘게 없음
      getGtagEmotion('결과_재도전 팝업_뜸', '결과_재도전 팝업_뜸');
      $('.check-none-modal').css('display', 'flex');
    } else {
      if (isLogin) {
        if ($myCost == 0) {
          // 회원 중 하트없음
          getGtagEmotion('결과_하트 필요 팝업_뜸', '결과_하트 필요 팝업_뜸');
          $('.noheart-modal').css('display', 'flex');
        } else {
          // 회원 중 하트있음
          if (toggleState == 0) {
            getGtagEmotion('결과_감정 확인 팝업_뜸', '결과_감정 확인 팝업_뜸')
            $('.minus-modal').css('display', 'flex');
          }
        }
      } else {
        // 비회원
        getGtagEmotion('결과_하트 필요 팝업_뜸', '결과_하트 필요 팝업_뜸');
        $('.noheart-modal').css('display', 'flex');
      }
    }
  }

  function restartBingo() {
    getGtagEmotion('결과_다시 도전하기', '결과_다시 도전하기');
    window.location.href = '/es/buy/';
  }

  function resultLevel() {
    if (mySelect.length == 0) {
      $('.result-title-lv').text('순혈 독수리 외길 타법');
    } else if (mySelect.length >= 1 && mySelect.length <= 4) {
      $('.result-title-lv').text('초고속 닭발 타법');
    } else if (mySelect.length >= 5 && mySelect.length <= 8) {
      $('.result-title-lv').text('서마터폰 중독 초기');
    } else if (mySelect.length >= 9 && mySelect.length <= 11) {
      $('.result-title-lv').text('속기사 유망주');
    } else if (mySelect.length >= 12 && mySelect.length <= 15) {
      $('.result-title-lv').text('타자계의 피아니스트');
    } else {
      $('.result-title-lv').text('상위 1% 타자의 신');
    }
  }

  function openAbout() {
    getGtagEmotion('결과_물음표 팝업_뜸', '결과_물음표 팝업_뜸');
    $('.about-modal').attr('style', 'display:flex !important');
  }

  // 공유 결과 로직 개발
  function createBingoBoard(userMatches) {
    const size = 4;
    let board = '';

    for (let i = 0; i < size; i++) {
      for (let j = 0; j < size; j++) {
        const index = i * size + j + 1;
        const emoji = userMatches.includes(index) ? '❤' : '🖤';
        board += emoji;
      }
      if (i < size - 1) {
        board += '\n';
      }

    }
    return board;
  }


  const shareBingoTxt = createBingoBoard(mySelect);

  const currentDate = new Date();
  const year = currentDate.getFullYear();
  // 월과 일이 한 자리 숫자인 경우 앞에 0을 붙여 두 자리로 만들어줌
  const month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
  const day = ('0' + currentDate.getDate()).slice(-2);
  const formattedDate = year + month + day;
  const shareButton = document.querySelector('.result-share-txt-img');
  var agentResult = "win16|win32|win64|macintel|mac";

  function updateBingoShareCount(_cb) {
    $.ajax({
      type: 'post',
      data: {
        proc: 'bingo-action-logging',
        actions: 'share',
        csrf_token: JS_CSRF,
      },
      url: '/es/modules/api.php',
      success: _cb || function() {},
      error: function() {
        console.log('share logging error.');
      },
    });
  }

  // 공유할 텍스트

  // 텍스트 클립보드에 복사

  document.addEventListener('DOMContentLoaded', function() {
    updateBingoShareCount(function() {
      shareButton.addEventListener('click', async function() {
        getGtagEmotion('결과_공유하기', '결과_공유하기');
        try {
          const shareTxt = `좋은감정자판기 ${formattedDate}\nhttps://www.banggooso.com/es/buy/\n\n오늘 내가 뽑은 감정은! \n${shareBingoTxt}`;
          if (agentResult.indexOf(navigator.platform.toLowerCase()) < 0) {
            // 모바일 : Web Share API를 사용하여 네이티브 공유 창 열기
            await navigator.clipboard.writeText(shareTxt);
            // Web Share API를 사용하여 네이티브 공유 창 열기
            if (navigator.share) {
              await navigator.share({
                text: shareTxt, // 공유할 텍스트
              });
              console.log('네이티브 공유 창이 열렸습니다.');
            } else {
              // 지원안하면 텍스트 복사로
              alert('결과가 복사되었습니다. 친구에게 공유해보세요!')
              await navigator.clipboard.writeText(shareTxt);
              console.log('Web Share API를 지원하지 않는 브라우저입니다.');
            }
          } else {
            // PC: 텍스트 클립보드에 복사
            alert('결과가 복사되었습니다. 친구에게 공유해보세요!')
            await navigator.clipboard.writeText(shareTxt);
          }


        } catch (error) {
          console.error('공유 도중 오류가 발생했습니다:', error);
        }
      });
    });
  });
</script>
<script src="/es/assets/js/bingo.js<?= $cacheVer ?>"></script>