

  
  
  <div id='microphone' class='actve'>
    <div class="recoder">
      <div class="close">
        <span></span>
      </div>
        <label for="lang">
        
        <select name="lang" id="lang">
          <option value="en-US" id="en-US "selected="selected">English - US</option>
          <option value="bn-BD" id="bn-BD" >বাংলা</option>
          <option value="hi-IN" id="hi-IN" >हिंदी</option>
          <option value="ur-PK" id="ur-pk">اردو</option>

          <option value="fr-FR" id="fr-FR">French - FR</option>
          <option value="pt-PT" id="pt-PT">Português - PT</option>
    
        </select>
      </label>
      <p id="recoredText">
        
      </p>
    
          <div id="bars" class=''>
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
      </div>
        <button id="speakBtn">speak</button>
    </div>
    
  </div>
  
  <style>

#microphone{
  position: fixed;
  width:100%;
  height:100%;
  background:rgba(0,0,0,0.3) ;
  display: none;
  align-items: center;
  justify-content: center;;
  z-index: 45;
  top:0;
  
}

#microphone.active{
  display: flex;
}
#microphone .recoder{
  position: relative;
  width:600px;
  aspect-ratio: auto 16/9;
  background: var(--search-bg);
  border-radius: 12px;
  padding: 40px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  backdrop-filter:blur(50px)
}
#microphone .close{
  position: absolute;
  width:35px;
  height:35px;
  top:-4px;
  right:5px;
  display: flex;
  align-items: center;
  justify-content: center;;
  padding:8px;
  cursor: pointer;
}
#microphone .close span{
  position: relative;
}
#microphone .close span:after,#microphone .close span::before{
  position: absolute;
  content:'';
  width:3px;
  height: 24px;
  border-radius:4px;
  background:var(--theme-color);
}
#microphone .close span:after{
  transform: rotate(45deg);
}
  
 #microphone .close span::before{
   transform: rotate(-45deg);
   
 }
#microphone select {
  background: var(--theme-bg-color);
  margin-top: 8px;
  color:var(--theme-color);
  width: 120px;
  font-size: 14px;
  padding:2px;
  border: 2px solid var(--inactive-color);
  border-radius: 0.25em;
  outline: none;
  margin-left: 8px;;
  
}
#microphone label{
  display: flex;
  align-items: center;
  margin-top:12px;
  position: absolute;
  top:0;
  left:10px;
}
#microphone label span{
  font-size: 16px;
  color: rgba(0,0,0,0.9);
  white-space: nowrap;
}
#microphone #bars {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top:0px;
  height: 100px;
  /*     background: black; */
}

#microphone #bars .bar {
  background: #52467b;
  bottom: 1px;
  height: 3px;
  width: 10px;
  margin: 0px 4px;
  border-radius: 5px;
  
}
#microphone #bars.active .bar{
  animation: sound 0ms -600ms linear infinite alternate;
  
}
@keyframes sound {
  0% {
    opacity: 0.35;
    height: 3px;
  }
  100% {
    opacity: 1;
    height: 70px;
  }
}

#microphone #bars .bar:nth-child(1) {
  left: 1px;
  animation-duration: 474ms;
}
#microphone #bars .bar:nth-child(2) {
  left: 15px;
  animation-duration: 433ms;
}
#microphone #bars .bar:nth-child(3) {
  left: 29px;
  animation-duration: 407ms;
}
#microphone #bars .bar:nth-child(4) {
  left: 43px;
  animation-duration: 458ms;
}
#microphone #bars .bar:nth-child(5) {
  left: 57px;
  animation-duration: 400ms;
}
#microphone #bars .bar:nth-child(6) {
  left: 71px;
  animation-duration: 427ms;
}
#microphone #bars .bar:nth-child(7) {
  left: 85px;
  animation-duration: 441ms;
}
#microphone #bars .bar:nth-child(8) {
  left: 99px;
  animation-duration: 419ms;
}
#microphone #bars .bar:nth-child(9) {
  left: 113px;
  animation-duration: 487ms;
}
#microphone #bars .bar:nth-child(10) {
  left: 127px;
  animation-duration: 442ms;
}
#recoredText{
  font-size:16px;
  font-weight: 700;
  color: rgba(0,0,0,0.9);
  margin:8px 0;
 margin-top:20px;
  text-align: center;
}

#speakBtn{
  font-size: 22px;
  font-weight:700;
  background: none;
  border:none;
  outline: none;
  text-transform: capitalize;
  margin-top: 25px;
  pointer:cursor;
  pointer-events: auto;
  background-color: hsl(90, 50%, 30%);
  
  color: hsl(90, 50%, 95%);
  border-radius:3px;
  box-shadow: 0 0 5px rgba(0,0,0,0.5);
  padding:5px 10px;
}
#speakBtn.active{
   
  background: #52467b;
  color: hsl(0, 50%, 95%);
}

  </style>
  
  
  <script>

    $('#voice_search').click(function(){
      if (navigator.onLine) {
        $('#microphone').addClass('active');
      } 
      else {
        alert("Your are currently offline...");
      }
  })
  
  $('#microphone .close').click(function(){
    $('#microphone').removeClass('active');
    
  })

var speech;
let r = 0;
let voices = [];
let synth;
window.addEventListener("load",(event) => {
 synth = window.speechSynthesis;
 voices = synth.getVoices();
 if(synth.onvoiceschanged !== undefined){
    synth.onvoiceschanged = voices;
  }
    })
function checkhSpeach(){
  $('#speakBtn').removeClass('active');
  $('#speakBtn').html('Speak');
  $('#microphone #bars').removeClass('active');
  if(r==0){
    new Audio('assets/audio/end.mp3').play();
    setTimeout(function() {
    speechText();
    },1500)
  }
  r++;
  setTimeout(function() {
    r =0;
  },3000)
  
    
  let text = $('#recoredText').text().trim();
  if(text.length>1){
    $('.header input').val(text);
    $('#recoredText').val('');
    $(".header input").trigger("keydown");
    $('#microphone').removeClass('active');
  }
}
$('#speakBtn').click(function(){
  if($('#speakBtn').hasClass('active')){
  checkhSpeach()
  speech.recognition.stop();
  
  }
  else{
    $('#speakBtn').addClass('active');
    $('#speakBtn').html('Listening...');
    $('#microphone #bars').addClass('active');
    
    new Audio('assets/audio/start.mp3').play();
      setTimeout(function() {
      speak(language);
      speech.recognition.start();
    }, 1200);
    let language = $('#microphone select').val().trim();
    
    setTimeout(function() {
     $('#speakBtn').removeClass('active');
    $('#speakBtn').html('Speak');
    $('#microphone #bars').removeClass('active');
    

  
     
    }, 7000);
    
         
  }
  })
  function speak(language){
    window.SpeechRecognition =
    window.SpeechRecognition || window.webkitSpeechRecognition;
  if ("SpeechRecognition" in window || "webkitSpeechRecognition" in window) {
     speech = {
      enabled: true,
      listening: false,
      recognition: new window.SpeechRecognition(),
      text: ""
    };
    speech.recognition.continuous = true;
    speech.recognition.interimResults = true;
    speech.recognition.lang = language;
    speech.recognition.addEventListener("result", (event) => {
      const audio = event.results[event.results.length - 1];
      speech.text = audio[0].transcript;
      const tag = document.activeElement.nodeName;
      if (tag === "INPUT" || tag === "TEXTAREA") {
        if (audio.isFinal) {
          document.activeElement.value += speech.text;
        }
      }
      $('#recoredText').text(speech.text);
      checkhSpeach();
      
    });

  }}
  function speechText(){
  let say =  $('#recoredText').text();
  let vox = 'English United Kingdom';
  let l = $('#microphone select').val().trim();
    if(l == 'en-US'){
       say = 'showing result ' +say;
     }
      else if(l == 'bn-BD'){
       vox = 'Bangla Bangladesh';
       say = 'ফলাফল দেখানো হচ্ছে ' +say;
      }
      else if(l == 'hi-IN'){
         vox = "Hindi India";
         say = 'परिणाम दिखा रहा है ' +say;
      }
      else if(l == 'ur-PK'){
       vox = "Urdu Pakistan";
       say = 'نتیجہ دکھا رہا ہے ' +say;
      }
 
      else if(l == 'fr-FR'){
       vox = "French France";
       say = 'montrant le résultat ' +say;
      }
      else if(l == 'pt-PT'){
       vox = "Portuguese Portugal";
       say = 'mostrando resultado ' +say;
      }
      else{
        say = 'no result';
      }
   
    let sayThis = new SpeechSynthesisUtterance(say);
    
   
   
    
    for(voice of voices){
      if(voice.name === vox) {
        sayThis.voice = voice;
        break;
      }
    }
    synth.speak(sayThis);
}
  
  
  </script>