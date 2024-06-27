<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/include/common.php'; ?>
<?php
$goodTxt =  array("난 천재야", "잘 될 거야", "못 할게 뭐 있어", "끝장난다", "난 너가 좋아", "난 짱이야", "잘 될 수 있어", "어쩔티비", "끝장티비", "난 짱티비", "천재티비", "잘 될 수 있어", "못 할게 뭐가 있어", "끝장내버린다", "난 네가 좋아", "넌 천재야");
?>
<div class="content bingo-start-content">

  <div class="intro-vector"><img class="intro-vector-img" src="https://cdn.banggooso.com/es/assets/bingo/intro.png" /></div>
  <div class="bingo-wrap">
    <div class="bingo-notice-ment-box">
      <img src="https://cdn.banggooso.com/es/assets/bingo/introment2.png" />
    </div>
    <div class="start-container"><img src="https://cdn.banggooso.com/es/assets/bingo/start2.png" /></div>
  </div>
  <div class="bingo-btn-wrap">
    <div class="styled-button bingo-start-btn" onclick="startBingo();">
      <div class="start-btn-txt-margin">게임 시작하기</div>
      <div class="start-btn-bgm"><img src="https://cdn.banggooso.com/es/assets/bingo/sound/btn.png" class="img-width" /></div>
    </div>
  </div>
  <div class="participate-area">
    <div class="participate-text">참여자수</div>
    <div class="participate-num">0</div>
  </div>
  <div class="intro-share-area">
    <div class="bingo-share-wrap">
      <div class="content" id="share">
        <div class="share-wrapper">
          <div class="intro-share-num-area">
            <div class="intro-share-title">공유하기 </div>
            <div><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <mask id="mask0_13167_2437" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="22" height="22">
                  <rect width="22" height="22" fill="#D9D9D9" />
                </mask>
                <g mask="url(#mask0_13167_2437)">
                  <path d="M16.5023 19.9375C15.8024 19.9375 15.2071 19.6924 14.7164 19.2022C14.2258 18.7121 13.9805 18.1169 13.9805 17.4166C13.9805 17.3022 13.9896 17.1837 14.0078 17.0611C14.026 16.9385 14.0533 16.8255 14.0898 16.7221L7.30993 12.7522C7.06784 12.9931 6.79225 13.1815 6.48317 13.3172C6.17408 13.4529 5.84679 13.5208 5.50128 13.5208C4.80105 13.5208 4.20586 13.2758 3.7157 12.7858C3.22555 12.2959 2.98047 11.7009 2.98047 11.001C2.98047 10.3011 3.22555 9.70578 3.7157 9.21514C4.20586 8.72449 4.80105 8.47917 5.50128 8.47917C5.84679 8.47917 6.17408 8.54703 6.48317 8.68276C6.79225 8.8185 7.06784 9.00683 7.30993 9.24775L14.0898 5.27787C14.0533 5.17445 14.026 5.06144 14.0078 4.93884C13.9896 4.81625 13.9805 4.69774 13.9805 4.58331C13.9805 3.88308 14.2254 3.28789 14.7154 2.79774C15.2054 2.30758 15.8003 2.0625 16.5002 2.0625C17.2002 2.0625 17.7955 2.30748 18.2861 2.79744C18.7768 3.2874 19.0221 3.88234 19.0221 4.58228C19.0221 5.28222 18.777 5.87751 18.2869 6.36815C17.7967 6.8588 17.2015 7.10412 16.5013 7.10412C16.1558 7.10412 15.8285 7.03626 15.5194 6.90053C15.2103 6.76479 14.9347 6.57646 14.6926 6.33554L7.9128 10.3054C7.94924 10.4088 7.97656 10.5216 7.99477 10.6438C8.01298 10.766 8.02209 10.8841 8.02209 10.9981C8.02209 11.1122 8.01298 11.2309 7.99477 11.3543C7.97656 11.4777 7.94924 11.5911 7.9128 11.6945L14.6926 15.6644C14.9347 15.4235 15.2103 15.2352 15.5194 15.0994C15.8285 14.9637 16.1558 14.8958 16.5013 14.8958C17.2015 14.8958 17.7967 15.1408 18.2869 15.6308C18.777 16.1207 19.0221 16.7157 19.0221 17.4156C19.0221 18.1155 18.7771 18.7108 18.2872 19.2015C17.7972 19.6921 17.2022 19.9375 16.5023 19.9375ZM16.5013 5.72914C16.8198 5.72914 17.0904 5.61779 17.3131 5.39509C17.5358 5.17237 17.6471 4.90177 17.6471 4.58329C17.6471 4.26481 17.5358 3.99421 17.3131 3.77149C17.0904 3.5488 16.8198 3.43746 16.5013 3.43746C16.1828 3.43746 15.9122 3.54881 15.6895 3.77151C15.4668 3.99423 15.3554 4.26483 15.3554 4.58331C15.3554 4.90179 15.4668 5.17239 15.6895 5.39511C15.9122 5.61782 16.1828 5.72914 16.5013 5.72914ZM5.50128 12.1458C5.81976 12.1458 6.09036 12.0345 6.31308 11.8118C6.53578 11.589 6.64714 11.3184 6.64714 11C6.64714 10.6815 6.53578 10.4109 6.31308 10.1882C6.09036 9.96547 5.81976 9.85412 5.50128 9.85412C5.1828 9.85412 4.9122 9.96547 4.68948 10.1882C4.46678 10.4109 4.35542 10.6815 4.35542 11C4.35542 11.3185 4.46678 11.5891 4.68948 11.8118C4.9122 12.0345 5.1828 12.1458 5.50128 12.1458ZM16.5013 18.5625C16.8198 18.5625 17.0904 18.4511 17.3131 18.2284C17.5358 18.0057 17.6471 17.7351 17.6471 17.4166C17.6471 17.0981 17.5358 16.8275 17.3131 16.6048C17.0904 16.3821 16.8198 16.2708 16.5013 16.2708C16.1828 16.2708 15.9122 16.3821 15.6895 16.6048C15.4668 16.8276 15.3554 17.0982 15.3554 17.4166C15.3554 17.7351 15.4668 18.0057 15.6895 18.2284C15.9122 18.4511 16.1828 18.5625 16.5013 18.5625Z" fill="#333333" />
                </g>
              </svg>
            </div>
            <div class="intro-share-count"></div>
          </div>


          <div class="share-sns-list">
            <div onclick=" gtagBingoSns('kakao'); shareKakaotalk(`buy/`, false); updateBingoShareCount();"><img src="https://cdn.banggooso.com/es/assets/bingo/intro-kako.png"></div>
            <div onclick=" gtagBingoSns('insta'); shareInstagram('buy/', false); updateBingoShareCount();"><img src="https://cdn.banggooso.com/es/assets/bingo/intro-insta.png"></div>
            <div onclick=" gtagBingoSns('twt'); shareTwitter('buy/', false); updateBingoShareCount();"><img src="https://cdn.banggooso.com/es/assets/bingo/intro-twt.png"></div>
            <div onclick=" gtagBingoSns('fb'); shareFacebook('buy/', false); updateBingoShareCount();"><img src="https://cdn.banggooso.com/es/assets/bingo/intro-fb.png"></div>
            <div onclick=" gtagBingoSns('link'); shareLink('buy/', false); updateBingoShareCount();"><img src="https://cdn.banggooso.com/es/assets/bingo/intro-link.png"></div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
</div>

<script>
  function gtagBingoSns(_sns) {
    if (_sns == 'kakao') {
      getGtagEmotion('인트로_공유_카카오톡', '인트로_공유_카카오톡');
    } else if (_sns == 'insta') {
      getGtagEmotion('인트로_공유_인스타그램', '인트로_공유_인스타그램');
    } else if (_sns == 'twt') {
      getGtagEmotion('인트로_공유_트위터', '인트로_공유_트위터');
    } else if (_sns == 'fb') {
      getGtagEmotion('인트로_공유_페이스북', '인트로_공유_페이스북');
    } else if (_sns == 'link') {
      getGtagEmotion('인트로_공유_링크복사', '인트로_공유_링크복사');
    } else {
      console.log('gtag error');
    }
  }

  function closeBingoNonmember() {
    getGtagEmotion('인트로_팝업_로그인 없이 이용', '인트로_팝업_로그인 없이 이용');
    $('#buy .bingo-nonmember-modal').hide();
    updateBingoResultCount(function() {
      location.href = "/es/buy/bingo";
    });
  }

  function updateBingoViewCount(_callback) {
    $.ajax({
      type: 'post',
      data: {
        proc: 'bingo-action-logging',
        actions: 'view',
        csrf_token: JS_CSRF,
      },
      url: '/es/modules/api.php',
      success: function() {
        typeof _callback === 'function' && _callback();
      },
      error: function() {
        console.log('view logging error.');
      },
    });
  }

  function updateBingoResultCount(_callback) {
    $.ajax({
      type: 'post',
      data: {
        proc: 'bingo-action-logging',
        actions: 'result',
        csrf_token: JS_CSRF,
      },
      url: '/es/modules/api.php',
      success: function() {
        typeof _callback === 'function' && _callback();
      },
      error: function() {
        window.alert('Error. 잠시 후 다시 시도해주세요.');
      },
    });

  }

  function getBingoResultCount() {
    $.ajax({
      type: 'post',
      data: {
        proc: 'get-bingo-action-count',
        csrf_token: JS_CSRF,
      },
      url: '/es/modules/api.php',
      success: function(res) {
        const {
          response
        } = JSON.parse(res);
        const resultCnt = parseInt(response.result.resultcnt) || 0;
        const formattedResultCnt = resultCnt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        $(".participate-num").text(formattedResultCnt);
      },
      error: function() {
        console.log('Get bingo action count error.');
      },
    });
  }

  function updateBingoShareCount(_callback) {
    $.ajax({
      type: 'post',
      data: {
        proc: 'bingo-action-logging',
        actions: 'share',
        csrf_token: JS_CSRF,
      },
      url: '/es/modules/api.php',
      success: function() {
        typeof _callback === 'function' && _callback();
      },
      error: function() {
        console.log('view logging error.');
      },
    });
  }

  function getBingoShareCount() {
    $.ajax({
      type: 'post',
      data: {
        proc: 'get-bingo-action-count',
        csrf_token: JS_CSRF,
      },
      url: '/es/modules/api.php',
      success: function(res) {
        const {
          response
        } = JSON.parse(res);
        const shareCnt = parseInt(response.result.sharecnt) || 0;
        const formattedShareCnt = (1139 + shareCnt).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','); // 1139: 6/10~6/25기준
        $(".intro-share-count").text(formattedShareCnt);
      },
      error: function() {
        console.log('Get bingo action count error.');
      },
    });
  }

  function startBingo() {
    getGtagEmotion('인트로_시작하기', '인트로_시작하기');
    if (_isLogin.userCheck == 1) {
      updateBingoResultCount(function() {
        location.href = "/es/buy/bingo";
      });
    } else {
      getGtagEmotion('인트로_팝업_뜸', '인트로_팝업_뜸');
      $('#buy .bingo-nonmember-modal').attr('style', 'display:flex !important');
      $('#buy .bingo-nonmember-modal .no-login-btn').attr('onclick', 'closeBingoNonmember()')
    }
  }

  $(function() {
    getBingoResultCount();
    getBingoShareCount();

    // 유입수
    updateBingoViewCount();
  });
</script>