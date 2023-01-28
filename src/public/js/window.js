const studyRecord = document.querySelector('.window1');
const popupBtn = document.getElementById('pop-up-btn');
popupBtn.addEventListener('click', () => {
  studyRecord.style.display = 'block';
});

const responsiveSubmitButton = document.querySelector('.p-footer__nav__record');
responsiveSubmitButton.addEventListener('click', () => {
  studyRecord.style.display = 'block';
});

function twitText() {
  let s = twitterComment.value;
  let url = document.location.href;
  
    if (s.length > 140) {
      //文字数制限
      alert("テキストが140字を超えています");
    } else {
      //投稿画面を開く
      url = "https://twitter.com/intent/tweet?text="+ s;
      window.open(url, "_blank", "width=600,height=300");
    }
}

const loading = document.querySelector('.window2');
const submitRecordBtn = document.getElementById('submit-record');
const success = document.querySelector('.window3');
const twitterShare = document.getElementById('checked');
function submitRecord() {
  if (twitterShare.checked) {
    twitText();
    loading.style.display = 'block';
    studyRecord.style.display = 'none';
  } else {
    loading.style.display = 'block';
    studyRecord.style.display = 'none';
  }

  window.setTimeout(function(){
    loading.style.display = 'none';
    success.style.display = 'block';
  }, 3000);
}

const closeStudyRecord = document.getElementById('close-record-submit');
closeStudyRecord.addEventListener('click', () => {
  studyRecord.style.display = 'none';
})

const closeSuccessPage = document.getElementById('close-success-page');
closeSuccessPage.addEventListener('click', () => {
  success.style.display = 'none';
})

let twitterComment = document.getElementById('twitter');


