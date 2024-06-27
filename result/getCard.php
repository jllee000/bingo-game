<div class="bingo-get-card-content-wrapper">
  <div class="content-wrapper">
    <div class="get-card-content">

      <div class="bingo-result-card-area" onClick="openBingoCard()">
        <div class="bingo-result-card-cover"><img src="https://cdn.banggooso.com/es/assets/bingo/cardcover.png" /></div>
      </div>
    </div>
    <div class="bingo-get-card-content-btn-wrapper" id="button-wrapper">
    </div>
    <div class="get-card-sub-title">
      <div>매일 새로운 선물을 드릴게요.<br />
        내일도 좋은 감정 받아가세요!</div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    getCategoryCardList('joy');
    let bingoCardCate = '';
    let bingoCardIdx = 0;
  })
  let clickedCard = 0;
  let cardClickState = 0;
  $('.send .back-btn').attr('onclick', 'window.history.back();')

  function openBingoCard() {
    cardClickState = 1;
    $('.bingo-result-card-cover').css('display', 'none');
    $('.useBingoCard-a').attr('href', `/es/send/detail.php?category=${bingoCardCate}&cidx=${bingoCardIdx}`);
    $('.useBingoCard').attr('style', 'background-color:#8379EC !important');
  }

  function goToUseBingoCard(cCat, cId) {

    location.href = `/es/send/detail.php?category=${bingoCardCate}&cidx=${bingoCardIdx}`;
  }

  function goBackResult() {
    location.href = '/es/buy/result';
  }

  function gtagUseCard() {
    if (cardClickState == 1) {
      getGtagEmotion('결과_사용해보기', '결과_사용해보기');
    }
  }

  function getCategoryCardList(_category) {
    const data = {
      proc: 'get-send-card-list',
      category: _category,
      csrf_token: JS_CSRF,
    };

    $.ajax({
      type: 'get',
      url: '/es/modules/api.php',
      dataType: 'json',
      data: data,
      success: (_json) => {
        const {
          result
        } = _json.response;

        const cWrapper = $('.bingo-result-card-area');
        const resultCard = result[Math.floor(Math.random() * result.length)];
        bingoCardCate = resultCard.category;
        bingoCardIdx = resultCard.idx;
        $('.bingo-result-card-area').append(`<div id="${resultCard.idx}" class="bingo-card swiper-slide ">
        
        <img src="https://cdn.banggooso.com/es/assets/images/object_guard.png" class="item-object object-guard" oncontextmenu="return false;">     
        <img class="bingo-card-img" src="https://cdn.banggooso.com/es/card/thumbnails/${resultCard.thumbnail}">
            </div>`)

        $('.bingo-get-card-content-btn-wrapper').append(`<a onclick="gtagUseCard();" class="useBingoCard-a styled-button useBingoCard">받은 선물 사용해보기</a>`);
        $('.send .back-btn').attr('onclick', `goBackResult()`)

      },
      error: function(request, status, error) {
        console.log(error)
      }
    })
  }
</script>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/layout/footer.php'; ?>