<div class="search-container ">
      <i class="arrow-left material-icons">arrow_back</i>
      <input type="text" id='search' placeholder = 'Search Here...'>
      <div id="voice_search" class='visible'>
        <i class="material-icons">mic</i>
      </div>
      <div id="filter_btn">
        <i class="material-icons">more_vert</i>
      </div>
  </div>

  <div class="pop-up">
         <div class="pop-up__title">Search Filters
          <div class="close">
            <i class="material-icons">close</i>
          </div>
         </div>
         <div class="popup-body">
            <div class="column">
              <div class="column-header">
                Upload Date
              </div>
              <div class="column-body">
                <div class="popup-input">
                  <input type="radio" name="time" id="last_hour" value="last_hour">
                  <label for="last_hour">Last hour</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="time" id="today" value="today">
                  <label for="today">Today</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="time" id="this_week" value="this_week">
                  <label for="this_week">This week</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="time" id="this_month" value="this_month">
                  <label for="this_month">This month</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="time" id="this_year" value="this_year">
                  <label for="this_year">This year</label>
                </div>
               
             
              </div>
            </div>
            <div class="column">
              <div class="column-header">
                Duration
              </div>
              <div class="column-body">
                <div class="popup-input">
                  <input type="radio" name="duration" id="under4" value="under4">
                  <label for="under4">Under 4 minutes</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="duration" id="between420" value="between420">
                  <label for="between420">4 - 20 minutes</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="duration" id="over20" value="over20">
                  <label for="over20">Over 20 minutes</label>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="column-header">
                  short by
              </div>
              <div class="column-body">
                <div class="popup-input">
                  <input type="radio" name="shortby" id="created_at" value="created_at">
                  <label for="created_at">Upload date</label>
                </div>
                <div class="popup-input">
                  <input type="radio" name="shortby" id="views" value="views">
                  <label for="views">View count</label>
                </div>
              </div>
            </div>
         </div>
         <div class="content-button-wrapper">
          <button class="content-button status-button">Reset</button>
         </div>
      </div>
      <div class="overlay-app"></div>

  <header class="header">
    <div class='menu-circle'> </div>
    <div style="dispay:flex;align-items:center">
      <i id='search-icon' class="material-icons">search</i>
      <?php if(isset($_SESSION['loggedOren'])) : ?>
            <img class="profile-img" src="<?= $url."upload/image/user/profile_photo/".$user['photo'] ?>" alt="">
            <div class="account-menu">
                <div class="sd_menu">
                    <ul class="mm_menu">
                        <li>
                            <span>
                                <i class="material-icons"></i>
                            </span>
                            <a href="<?= base_url('my-channel')?>" title="">My Channel</a>
                        </li>
                        <li>
                            <span>
                                <i class="material-icons"></i>
                            </span>
                            <a href="#" title="">Paid subscriptions</a>
                        </li>
                        <li>
                            <span>
                                <i class="material-icons"></i>
                            </span>
                            <a href="#" title="">Settings</a>
                        </li>
                        <li>
                            <span>
                                <i class="material-icons"></i>
                            </span>
                            <a style='cursor:pointer' id='signout-btn' title="">Sign out</a>
                        </li>
                    </ul>
                </div><!--sd_menu end-->
                <div class="sd_menu scnd">
                    <ul class="mm_menu">
                        <li>
                            <span>
                                <i class="material-icons"></i>
                            </span>
                            <label class="dark-light" for="dark-light">Dark Theme</label>
                            <label class="switch">
                                <input type="checkbox" id="dark-light">
                                <b class="slider round"></b>
                            </label>
                        </li>
                        <li>
                            <span>
                                <i class="material-icons"></i>
                            </span>
                            <a href="#" title="">Send feedback</a>
                        </li>
                  
                    </ul>
                </div><!--sd_menu end-->
                <div class="restricted-mode">
                    <h4>Restricted Mode</h4>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                    <div class="clearfix"></div>
                </div><!--restricted-more end-->
            </div>
            <?php else :?>
            <a class="signin-btn" href="<?= $url.'signin' ?>">
                <i class="material-icons">account_circle</i>
            </a>
        <?php endif; ?>
    </div>
  </header>
  


  
  
  <div id='microphone' class='acive'>
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
    <script>
      
    </script>
    
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

  </style>
  
  <script>
    $(document).ready(function(){
      $('#search').on('keyup', function(){
        if($(this).val() !== ''){
          $('#voice_search').removeClass('visible');
          $('#filter_btn').addClass('visible');
        }
        else{
          $('#voice_search').addClass('visible');
          $('#filter_btn').removeClass('visible');
        }
      })
    })
    $(function () {
       $('#filter_btn').click(function(){
        $('.pop-up').addClass('visible');
        $('.overlay-app').addClass('visible');
       })
       $('.pop-up .close').click(function(){
        $('.pop-up').removeClass('visible');
        $('.overlay-app').removeClass('visible');
       })
    })
  </script>
  <script>
    $('#search-icon').click(function(){
  $('.search-container').addClass('active');
})
$('.search-container i.arrow-left').click(function(){
  $('.search-container').removeClass('active');
})
$('#microphone-icon').click(function(){
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
    $('#search').val(text);
    $('#recoredText').val('');
    $("#search").trigger("keyup");
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
      
      //setTimeout(checkhSpeach, 1000);
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