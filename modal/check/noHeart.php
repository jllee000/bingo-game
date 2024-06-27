<div class="buy-modal noheart-modal">
  <div class="modal-content-wrap">
    <div class="modal-content">
      <div class="noheart-close" onclick="closeModal('noheart')"><img class="img-width" src="https://cdn.banggooso.com/es/assets/bingo/close .png" /></div>
      <div class="modal-title noheart-title">
        하트가 있어야
        <br />확인할 수 있어요!
      </div>
      <div class="noheart-img"><img src="https://cdn.banggooso.com/es/assets/bingo/modal3.png" class="img-width" /></div>
      <div class="modal-txt noheart-txt">
        로그인 후 ‘감정카드 보내기’ <br />
        혹은 ‘나쁜 감정 팔기’를 하면 <br />
        하트를 충전할 수 있어요!
      </div>
    </div>
  </div>
</div>

<script src="/es/assets/js/bingo.js<?= $cacheVer ?>"></script>
<script>
  function closeModal(_modalName) {

    if (_modalName == 'nonmembers') {
      $('.bingo-nonmember-modal').hide();
    } else if (_modalName == 'noheart') {
      getGtagEmotion('결과_하트 필요 팝업_닫기', '결과_하트 필요 팝업_닫기');
      $('.noheart-modal').hide();
    }
  }
</script>