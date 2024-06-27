<div class="buy-modal check-none-modal">
  <div class="modal-content-wrap">
    <div class="modal-content">
      <div class="check-none-close" onclick="closeCheckNoneModal()"><img class="img-width" src="https://cdn.banggooso.com/es/assets/bingo/close .png" /></div>
      <div class="modal-title check-none-title">
        좋은 감정을 뽑으면
        <br />확인할 수 있어요!
      </div>
      <div class="check-none-img"><img src="https://cdn.banggooso.com/es/assets/bingo/modal3.png" class="img-width" /></div>
      <div class="modal-txt check-none-txt">
        좋은 감정은 얼마든지 있으니까<br />
        다시 한 번 도전해봐요!
      </div>
    </div>
  </div>
</div>

<script src="/es/assets/js/bingo.js<?= $cacheVer ?>"></script>
<script>
  function closeCheckNoneModal() {
    getGtagEmotion('결과_재도전 팝업_닫기', '결과_재도전 팝업_닫기');
    $('.check-none-modal').hide();
  }
</script>