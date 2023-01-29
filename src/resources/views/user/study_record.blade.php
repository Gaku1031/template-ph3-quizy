<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr" defer></script>
  <script src="./js/Chart.min.js" defer></script>
  <script src="https://unpkg.com/apexcharts/dist/apexcharts.min.js" defer></script>
  <script src="./js/chartjs-plugin-labels.js" defer></script>
  <script src="{{ asset('js/myChart1.js') }}" defer></script>
  <script src="{{ asset('js/myChart2.js') }}" defer></script>
  <script src="{{ asset('js/myChart3.js') }}" defer></script>
  <script src="{{ asset('js/window.js') }}" defer></script>
  <script src="{{ asset('js/calender.js') }}" defer></script>
  <title>ph1-original</title>
</head>
<body>
    {{-- <header class="p-header">
      <div class="p-header__logo">
        <img src="./img/logo.svg" alt="POSSE">
        <nav class="subtitle">4th week</nav>
      </div>
      <nav class="p-header__nav">
        <label for="pop-up-btn" class="p-header__nav__record">記録・投稿</label>
        <input type="checkbox" id="pop-up-btn">
      </nav>
    </header> --}}

<main class="p-main">
  <div class="p-body-chart">
    <div class="p-body-left">
      <div class="p-body-hour-flex">
        <div class="p-body-hour">
          <p class="hour-title">Today</p>
          <span class="hour-number">0</span>
          <span class="hour-text">hour</span>
        </div>
        <div class="p-body-hour">
          <p class="hour-title">Month</p>
          <span class="hour-number">17</span>
          <span class="hour-text">hour</span>
        </div>
        <div class="p-body-hour">
          <p class="hour-title">Total</p>
          <span class="hour-number">19</span>
          <span class="hour-text">hour</span>
        </div>
      </div>
      <hr class="boundary">
      <div class="myChart1" id="myChart1" style="min-height: initial">
      </div>
    </div>
    <div class="p-body-right">
      <div class="circle-left">
        <div class="myChart2" id="myChart2">
        </div>
      </div>
      <div class="circle-right">
        <div  class="myChart3" id="myChart3">
        </div>
      </div>
    </div>
  </div>
  <div class="date">
    <input type="submit" class="back" name="calender[2020-09]" value="&lang;">
    <p id="this-ym">2020年10月</p>
    <input type="submit" class="next" name="calender[2020-11]" value="&rang;">
  </div>
  <label for="pop-up-1" class="p-footer__nav__record">記録・投稿</label>
  <input type="checkbox" id="pop-up-1">

  <!-- pop-up -->
  <!-- window1 -->
  <div class="window1">
    <div class="overlay"></div>
    <form id="mainForm" action="{{ route('study_record') }}" method="post">
      @csrf
      <input type="hidden" value="1" name="post_id">
      <div class="submit-study-record">
        <input type="button" class="close" id="close-record-submit" value="×" onclick="window.history.back();" >
        <div class="pop__left">
          <label for="" class="title">学習日</label>
          <input type="text" name="datepicker" id="sample" class="day">
          <label class="title">学習コンテンツ (複数選択可)</label><br>
          <div class="contents">
            <label class="label">
              <input type="checkbox" class="input__checkbox" value="N予備校" name="contents[]">
              <span class="checkbox"></span>N予備校
            </label>
            <label class="label">
              <input type="checkbox" class="input__checkbox" value="ドットインストール" name="contents[]"><span
                class="checkbox"></span>ドットインストール
            </label>
            <!-- 空のブロック要素を追加 -->
            <div class="space-1"></div>
            <label class="label">
              <input type="checkbox" class="input__checkbox" value="POSSE課題" name=contents[]><span class="checkbox"></span>POSSE課題
            </label>
          </div>
          <label class="title">学習言語 (複数選択可)</label><br>
          <div class="languages">
            <label class="label">
              <input type="checkbox" class="input__checkbox" name="languages[]" value="HTML"><span
                class="checkbox"></span>HTML
            </label>
            <label class="label">
              <input type="checkbox" class="input__checkbox" name="languages[]" value="CSS"><span class="checkbox"></span>CSS
            </label>
            <label class="label">
              <input type="checkbox" class="input__checkbox" name="languages[]" value="JavaScript"><span
                class="checkbox"></span>JavaScript
            </label>
            <div class="space-1"></div>
            <label class="label">
              <input type="checkbox" class="input__checkbox" name="languages[]" value="PHP"><span class="checkbox"></span>PHP
            </label>
            <label class="label">
              <input type="checkbox" class="input__checkbox" name="languages[]" value="Laravel"><span
                class="checkbox"></span>Laravel
            </label>
            <label class="label">
              <input type="checkbox" class="input__checkbox" name="languages[]" value="SQL"><span class="checkbox"></span>SQL
            </label>
            <label class="label">
              <input type="checkbox" class="input__checkbox" name="languages[]" value="SHELL"><span
                class="checkbox"></span>SHELL
            </label>
            <div class="space-1"></div>
            <label class="label">
              <input type="checkbox" class="input__checkbox" name="languages[]" value="情報システム基礎知識(その他)"><span
                class="checkbox"></span>情報システム基礎知識(その他)
            </label>
          </div>
        </div>
    
        <div class="pop__right">
          <label id="study-time" class="title">学習時間<br>
            <input type="text" class="hour" id="hours" name="hours">
          </label>
          <label id="twitter-comment" class="title">Twitter用コメント<br>
            <textarea name="twitter" id="twitter" cols="30" rows="10"></textarea>
          </label>
          <label class="label__twitter">
            <input type="checkbox" class="t__checkbox" name="share" value="twitter" id="checked"><span
              class="twitter__checkbox"></span>Twitterにシェアする
          </label>
        </div>
        {{-- <button type="submit" class="window__footer" id="submit-record" onclick="submitRecord()">記録・投稿</button> --}}
        <button type="submit" class="window__footer" id="submit-record">記録・投稿</button>
      </div>
    </form>
  </div>
  <!-- window1 -->

  <!-- window-2 -->
  <div class="window2">
    <div class="overlay"></div>
    <div class="loading" id="loading">
        <div class="loader-wrap" id="loading">
          <div class="loader" id="loader"></div>
        </div>
    </div>
  </div>
  <!-- window-2 -->

  <!-- window3 -->
  <div class="window3">
    <div class="overlay"></div>
    <div class="completion" id="completion">
      <input type="button" class="close" id="close-success-page" value="×" onclick="window.history.back();">
      <span class="awesome">AWESOME!</span>
      <div class="checkmark"></div>
      <span class="completion__text">記録・投稿<br>完了しました</span>
    </div>
  </div>
  <!-- window3 -->

</main>
</body>
</html>
