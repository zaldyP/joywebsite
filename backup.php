<?php
session_start();
  require_once('config/connect.php');

  if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('Location:login.php');
  }


 $email = $_SESSION['email'];

//user
$sql = "SELECT * FROM `users` WHERE email = '$email'";
$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($res);
$r = mysqli_fetch_assoc($res);







?>

<?php include 'inc/header.php';  ?>
<?php include 'inc/nav.php';  ?>


<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic,600italic,700italic,800italic);
body {
  background: linear-gradient(rgba(30, 27, 38, 0.9), rgba(30, 27, 38, 0.9)), url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaqi1MvQ7sCqMYAlxfjf5vmiWLdZsr2aT2OjcuAcibaqCtQ2Zeow");
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
   
}


.container {
  width: 100%;
  height: 100%;
}

.cellphone-container {
  width: 100%;
  height: 667px;
  background-color: #1e1b26;
  margin: 90px auto 0 auto;
  box-shadow: 5px 5px 115px -14px black;
}

.movie-img {
  width: 100%;
  height: 380px;
  background: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaqi1MvQ7sCqMYAlxfjf5vmiWLdZsr2aT2OjcuAcibaqCtQ2Zeow");
  /*background-size: contain;*/
  background-size: cover;
  z-index: 111 !important;
  -webkit-mask-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, black), color-stop(0.35, black), color-stop(0.5, black), color-stop(0.65, black), color-stop(0.85, rgba(0, 0, 0, 0.6)), color-stop(1, transparent));
  position: relative;
}

.movie {
  /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffffff+39,1e1b26+53&0+38,1+55 */
  background: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 38%, rgba(255, 255, 255, 0.06) 39%, rgba(30, 27, 38, 0.88) 53%, #1e1b26 55%);
  /* FF3.6-15 */
  background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 38%, rgba(255, 255, 255, 0.06) 39%, rgba(30, 27, 38, 0.88) 53%, #1e1b26 55%);
  /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 38%, rgba(255, 255, 255, 0.06) 39%, rgba(30, 27, 38, 0.88) 53%, #1e1b26 55%);
  /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#1e1b26',GradientType=0 );
  /* IE6-9 */
  /*position: absolute;*/
  background-size: contain;
  background-size: cover;
  z-index: 1 !important;
  width: 100%;
  height: 667px;
  display: block;
}

.text-movie-cont {
  padding: 0px 12px;
  text-align: justify;
}

.action-btn {
  text-align: right;
}
.action-btn i {
  color: #fe4141;
  font-size: 28px;
  text-align: right;
}

.watch-btn {
  display: block;
  border: 1px solid #fe4141;
  border-radius: 5px;
  padding: 4px;
  width: 140px;
}
.watch-btn h3 i {
  font-size: 14px;
  margin-right: 2px;
  position: relative;
  float: left;
  line-height: 130%;
}

.action-row {
  margin-top: 12px;
}

.summary-row {
  margin-top: 6px;
}

/* TYPOGRAPHY STARTS */
/* Fonts */
h1, h2, h3, h4, h5 {
  font-family: "Montserrat", sans-serif;
  color: #e7e7e7;
  margin: 0px;
}

h1 {
  font-size: 36px;
  font-weight: 400;
}

h3 {
  font-size: 14px;
  font-weight: 400;
  color: #fe4141;
}

h5 {
  font-size: 12px;
  font-weight: 400;
}

.movie-gen, .movie-likes {
  margin: 0px;
  padding: 0px;
}
.movie-gen li, .movie-likes li {
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  color: #818181;
  width: auto;
  display: block;
  float: left;
  margin-right: 6px;
  font-weight: 600;
}

.movie-likes {
  float: right;
}
.movie-likes li {
  color: #fe4141;
}
.movie-likes li:last-child {
  margin-right: 0px;
}
.movie-likes li i {
  font-size: 14px;
  margin-right: 4px;
  position: relative;
  float: left;
  line-height: 1;
}

.movie-details {
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  font-weight: 300;
  color: #b4b4b4;
}

.movie-description {
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  font-weight: 400;
  color: #9b9b9b;
}

.movie-actors {
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  font-weight: 300;
  color: #e7e7e7;
  font-style: italic;
}

/* TYPOGRAPHY ENDS */
/** GRID STARTS **/
.thegrid {
  margin: 0 auto;
}

.elements-distance, .movie-details, .movie-description, .movie-actors {
  margin: 0px;
}

.mr-grid {
  width: 100%;
}

.mr-grid:before, .mr-grid:after {
  content: "";
  display: table;
}

.mr-grid:after {
  clear: both;
}

.mr-grid {
  *zoom: 1;
}

.col1, .col2, .col3, .col3rest, .col4, .col4rest, .col5, .col5rest, .col6, .col6rest {
  margin: 0% 0.5% 0.5% 0.5%;
  padding: 1%;
  float: left;
  display: block;
}

/* Columns match, minus margin sum. E.G. margin-left+margin-right=1%, col2=50%-1% - added padding:1%*/
.col1 {
  width: 98%;
}

.col2 {
  width: 47%;
}

.col3 {
  width: 30.3333333333%;
}

.col4 {
  width: 22%;
}

.col5 {
  width: 17%;
}

.col6 {
  width: 13.6666666667%;
}

/* Columns match with their individual number. E.G. col3+col3rest=full width row */
.col3rest {
  width: 63.6666666667%;
}

.col4rest {
  width: 72%;
}

.col5rest {
  width: 77%;
}

.col6rest {
  width: 80.3333333333%;
}


.light-blue.lighten-1 {
  background-color: transparent!important;
}

.light-blue.lighten-1 {
  box-shadow: none;
}





</style>

   <div class="container" style="margin-top: 30px;">
      <div class="row">
          <div class="col s12 m4"> 
             <div class="cellphone-container" style="margin-top:0px">
                <div class="movie">
                    <img class="movie-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaqi1MvQ7sCqMYAlxfjf5vmiWLdZsr2aT2OjcuAcibaqCtQ2Zeow">
                    <div class="text-movie-cont">
                        <div class="mr-grid">
                          <div class="col1">
                            <h1>No Other Love</h1>
                            <ul class="movie-gen">
                              <li>General Fiction</li>
                            </ul>
                          </div>
                        </div>
                        <div class="mr-grid summary-row">
                          <div class="col2">
                            <h5>SUMMARY</h5>
                          </div>
                          <div class="col2">
                             <ul class="movie-likes">
                              <li><i class="material-icons">&#xE813;</i>124</li>
                              <li><i class="material-icons">&#xE813;</i>3</li>
                            </ul>
                          </div>
                        </div>
                         <div class="mr-grid">
                          <div class="col1">
                            <p class="movie-description">A group of elderly people are giving interviews about having lived in a climate of crop blight and constant dust reminiscent of The Great 
                            Depression of the 1930's. The first one seen is an elderly woman stating her father was a farmer, but did not start out that way. </p>
                          </div>
                        </div>
                        <div class="mr-grid action-row">
                          <div class="col2"><div class="watch-btn"><h3><i class="material-icons">&#xE037;</i>WATCH TRAILER</h3></div>
                          </div>
                          <div class="col6 action-btn"><i class="material-icons">&#xE161;</i>
                          </div>
                          <div class="col6 action-btn"><i class="material-icons">&#xE866;</i>
                          </div>
                          <div class="col6 action-btn"><i class="material-icons">&#xE80D;</i>
                          </div>
                        </div>
                     </div><!--text-movie-cont--> 
                </div><!--movie-->


             </div>

          </div><!--col s12 m6-->

          <div class="col s12 m8" style="color: #fff; text-align: justify;
    text-justify: inter-word; font-family: Open Sans, sans-serif;
    font-size: 14px;
    font-weight: 400;
    color: #fff; "> 
              <p>Believing, Trying, Lying</p>

             <p> Mindy's Point of View</p>

              <p>Napatingin ako sa pinasang coordinates ni Corvez sa gps phone ko. Its been straight five days that I haven't heard from Michael maliban sa sinundo nito at ng mga tauhan ng Governor si Elaine Dela Riva.</p>

              <p>I have done my own research. The part on that coordinates is somewhere around the Tagaytay-Nasugbu highway which connects to different areas in Batangas. I searched the map and frown when I saw some open fields and residential houses. This could not be it. There must be some vacant warehouses on this place para gawing kuta ng mga operasyon na ilegal ng Dark Serpents.</p>

              <p>I sighed when there is nothing that I can do but to wait for Michael to scan the area. Corvez warned me not to try drastic move kahit pa nakakalapit ako sa Governor.</p>

              <p>Hayaan ko na lamang daw si Michael sa trabaho nito. Pinagsabihan din niya ako na huwag subukan masyado ang Governor baka maghinala ito lalo pa at nagbanggit na ng ibang pangalan ang Gobernador na maaring nagkaroon ng kaugnayan sa akin. Kung nagawa nitong malaman ang mga bagay habang malayo ako sa kanya, ano pa nga daw ba kung malapit lamang ako. I did not object from his observation. Maging ang plano na habang nasa Manila si Michael ay magagampanan nito ang trabaho sa The Order. He will have some time to do the job within three days kagaya ng usapan. Ang plano ay tatakasan nito ang First Lady at magdadahilan para hanapin ang posibleng ginagalawan nila.</p>

              <p>Natigilan ako ng biglang bumukas ang pintuan na nagdudugtong sa terasa ng condo at sa kwarto ko. Inilabas noon ang tila hapong si Michael.
              Believing, Trying, Lying</p>


<p>Napatingin ako sa pinasang coordinates ni Corvez sa gps phone ko. Its been straight five days that I haven't heard from Michael maliban sa sinundo nito at ng mga tauhan ng Governor si Elaine Dela Riva.
</p>
 <p>I have done my own research. The part on that coordinates is somewhere around the Tagaytay-Nasugbu highway which connects to different areas in Batangas. I searched the map and frown when I saw some open fields and residential houses. This could not be it. There must be some vacant warehouses on this place para gawing kuta ng mga operasyon na ilegal ng Dark Serpents.</p>

<p>I sighed when there is nothing that I can do but to wait for Michael to scan the area. Corvez warned me not to try drastic move kahit pa nakakalapit ako sa Governor.</p>

<p>Hayaan ko na lamang daw si Michael sa trabaho nito. Pinagsabihan din niya ako na huwag subukan masyado ang Governor baka maghinala ito lalo pa at nagbanggit na ng ibang pangalan ang Gobernador na maaring nagkaroon ng kaugnayan sa akin. Kung nagawa nitong malaman ang mga bagay habang malayo ako sa kanya, ano pa nga daw ba kung malapit lamang ako. I did not object from his observation. Maging ang plano na habang nasa Manila si Michael ay magagampanan nito ang trabaho sa The Order. He will have some time to do the job within three days kagaya ng usapan. Ang plano ay tatakasan nito ang First Lady at magdadahilan para hanapin ang posibleng ginagalawan nila.</p>

<p>Napatingin ako sa pinasang coordinates ni Corvez sa gps phone ko. Its been straight five days that I haven't heard from Michael maliban sa sinundo nito at ng mga tauhan ng Governor si Elaine Dela Riva.</p>

              <p>I have done my own research. The part on that coordinates is somewhere around the Tagaytay-Nasugbu highway which connects to different areas in Batangas. I searched the map and frown when I saw some open fields and residential houses. This could not be it. There must be some vacant warehouses on this place para gawing kuta ng mga operasyon na ilegal ng Dark Serpents.</p>

              <p>I sighed when there is nothing that I can do but to wait for Michael to scan the area. Corvez warned me not to try drastic move kahit pa nakakalapit ako sa Governor.</p>

              <p>Hayaan ko na lamang daw si Michael sa trabaho nito. Pinagsabihan din niya ako na huwag subukan masyado ang Governor baka maghinala ito lalo pa at nagbanggit na ng ibang pangalan ang Gobernador na maaring nagkaroon ng kaugnayan sa akin. Kung nagawa nitong malaman ang mga bagay habang malayo ako sa kanya, ano pa nga daw ba kung malapit lamang ako. I did not object from his observation. Maging ang plano na habang nasa Manila si Michael ay magagampanan nito ang trabaho sa The Order. He will have some time to do the job within three days kagaya ng usapan. Ang plano ay tatakasan nito ang First Lady at magdadahilan para hanapin ang posibleng ginagalawan nila.</p>

              <p>Natigilan ako ng biglang bumukas ang pintuan na nagdudugtong sa terasa ng condo at sa kwarto ko. Inilabas noon ang tila hapong si Michael.
              Believing, Trying, Lying</p>


<p>Napatingin ako sa pinasang coordinates ni Corvez sa gps phone ko. Its been straight five days that I haven't heard from Michael maliban sa sinundo nito at ng mga tauhan ng Governor si Elaine Dela Riva.
</p>
 <p>I have done my own research. The part on that coordinates is somewhere around the Tagaytay-Nasugbu highway which connects to different areas in Batangas. I searched the map and frown when I saw some open fields and residential houses. This could not be it. There must be some vacant warehouses on this place para gawing kuta ng mga operasyon na ilegal ng Dark Serpents.</p>

<p>I sighed when there is nothing that I can do but to wait for Michael to scan the area. Corvez warned me not to try drastic move kahit pa nakakalapit ako sa Governor.</p>

<p>Hayaan ko na lamang daw si Michael sa trabaho nito. Pinagsabihan din niya ako na huwag subukan masyado ang Governor baka maghinala ito lalo pa at nagbanggit na ng ibang pangalan ang Gobernador na maaring nagkaroon ng kaugnayan sa akin. Kung nagawa nitong malaman ang mga bagay habang malayo ako sa kanya, ano pa nga daw ba kung malapit lamang ako. I did not object from his observation. Maging ang plano na habang nasa Manila si Michael ay magagampanan nito ang trabaho sa The Order. He will have some time to do the job within three days kagaya ng usapan. Ang plano ay tatakasan nito ang First Lady at magdadahilan para hanapin ang posibleng ginagalawan nila.</p>


          </div><!--col s12 m6-->
          
      </div><!--row-->
       
   </div><!--container-->
 
 
  
      

      




















"Hey, It's Me"

Adam's Point of View

I closed my eyes when the sunlight touched my face. Iritableng dumapa ako at ibinaon ang mukha sa unan. Its another morning.

Another morning without her.

I groaned in frustration as I tried to put back myself to sleep pero tila malabo na makuha ko uli iyon. It's been a week.

A whole damned week.

Sinasabi ko na nga ba at mangyayari ito pero hindi ko pa rin matanggap. Maybe some guy has to stop her from coming back to Manila. Saan na nga ba ang probinsya nito? I groaned when I realized how stupid I was that I did not ask her kung saan ito uuwi. 

So freaking stupid, Adam.

Baka nagkabalikan na ng boyfriend nito?

Inis na tumayo ako. I hate thinking about the idea. That someone is touching her while I was so far away from her. Agad na kinapa ko ang daan patungo sa banyo. Mula ng umalis ito ay hindi na ako umalis sa mansion. Hindi rin naman ako papayagan ng Mama. Ang usapan nila ay susunduin ako dito ni Samantha oras na bumalik na ito mula sa probinsya.

Ngayon pa lamang hindi ko alam kung paano ako tatagal sa mansion nang hindi kami nagkakabanggaan ng Papa. Noong mga unang araw pinilit namin na maging polite sa isat isa. Pero marahil mahirap nga talagang pagsamahin kami sa iisang bubong. Kaya para makaiwas madalas lamang akong nakakulong sa silid ko. 

David visited me last night and we had some beer. He asked about my plan. I just shrugged my shoulder and told him I'm finished with the racing thing. He gave me advice to seek help to restore my vision.

No way.

Tanggap ko na ganito na lamang ako. 

I opened the shower and put myself underneath it. This is a routine already for a week. Waking up, taking a bath then sleep, eat, sleep, eat. And hell yes, I want to do something different. I groaned in frustration as an image came to my mind. I know what I want.

But I do not want my hand to do it.

I want her. I need her. 

Shit, Sam. Where the hell are you? Wala sa loob na napahampas ako sa malamig na tiles ng banyo habang bumubuhos sa akin ang malamig na tubig mula sa shower head. I closed my eyes.

Mabilis na tinapos ko ang paliligo. I need to talk to my mother. I am sure she knows where Sam is. I fought hard not to ask my mother but this time, I have to know. 

I put clean clothes and was about to pick my cane when I heard my mother's voice on the door.

"Adam? Are you awake, iho?" Anito na kumatok ng dalawang beses.

"Yes, Ma. Come in." 

Narinig ko ang pagbukas ng pintuan. "You have to come down, you won't believe who's here." Anito.

Agad ang pagdatal ng kakaibang antisipasyon nang marinig ko ang sinabi ng Mama. I don't usually go downstairs mula ng umalis si Sam. This is my first time to come down the long stairs. My mother guided me but I can surely do it myself habang mamaybay sa may gilid ng pader.

"Adam! Oh, I am so glad to see you!" A woman's voice squealed the moment I reach the ground. Napakunot ang noo ko at bago pa ako nakakibo ay lumapat na ang katawan nito sa akin. Hugging me tightly. Her perfume smells so...

Feminine. Like a mixture of jasmine.

Narinig ko ang pagtawa ng Mama. "How's your flight, Bianca? I am so glad naisipan mo na dumalaw dito."

Napakurap ako nang sa wakas mag rehistro sa akin ang pangalan. Bianca?

"Vee?" I asked na kunot ang noo.

Kumalas ito sa pagkakayakap sa akin at natawa ng mahina. "None other than, Adam. I've heard what happened to you. I'm glad you are okay. And---I'm sorry about Naomi." Bahagyang humina ang tinig nito sa pagkakabanggit ng pangalan ng namatay ko na fiancee. Narinig ko na nagpaalam ang Mama na aasikasuhin muna ang gamot ng Papa.

Naiwan kaming dalawa sa sala.

I felt the same pain.

Pero hindi na kagaya ng dati. Hinawakan nito ang braso ko. I tried to smile. "I am fine, Vee. How are you?" Sabi ko na inaya ito na makaupo.

She laughed. "I'm good. My Mom is nagging me about staying here. Sabi niya its about time that I should settle then."

I smiled. Bianca Roselyn Yllana or Vee as what I was fond of calling her, is my god sister. She is younger than me by 5 years. When we were little our parents used to entertain the idea of us getting married. Vee is a very pretty girl even then, but my feeling for her is just a brotherly affection. She was 20 when she decided to pursue her career abroad. She was even beautiful then.

"Then why don't you settle down? No boyfriend yet?" Biro ko dito. "You are not going to disappoint your parents."

She laughed. "I wish I could find my Mr Right. Or my mother will never have a chance to have a grandchildren! But--hey. Let's talk about you. Tita said ayaw mo magpagamot?" Naguguluhang sabi nito. "You are not punishing yourself because of what happened to Naomi?"

Nawala ang ngiti ko sa labi pagkuwa'y marahang napailing. "I---."

She hold my hand. "Adam. Hindi mo kasalanan iyon. Whatever it was, whether may kasalanan ka o wala its not right you are doing this to yourself. Consider it, Adam." She softly said. 

Tipid na ngumiti ako dito. "We'll see. Mabuti pa kumain na muna tayo. Dito ka na rin mag lunch, I am sure my mother will be delighted to hear your stories." Pag iiba ko ng usapan. 

Tila naman bigla itong na excite kaya hindi na nagpilit pa sa seryosong pinag uusapan namin. During the breakfast, they are all enthusiastic asking about what happened to her abroad. Ever since naman ay malapit na sa mga magulang ko si Vee. Even with my sister. Vee is like our little sis.

"At bakit naman wala ka pang boyfriend Bianca? Sa ganda mo na yan, bulag ang mga lalaki sa Amerika." Ani Mama.

Natawa si Vee. "Tita, maybe they are not blind but stupid." 

"Its better to be stupid than blind." I said wryly. 

Natigil ang pagtawa nila. Parang doon lamang nila napansin na may bulag silang kasama. I tried to laugh. "Oh ignore me. I am just speaking my mind."

Napatikhim ang Mama. "It's been a week Adam. May balak pa bang bumalik ang nurse mo?" Anito sa seryosong tinig.

Napatiim ang labi ko. "She's fired. I told her if she doesn't come back in a week, she will lose her job. Find another." 

"What? Hindi ganoon kadaling maghanap ng nurse. But come to think of it----."

I shook my head derisively nang maisip ko kung saan pupunta ang sasabihin ng Mama. "Wala akong balak na mamalagi dito, Ma. End of discussion. Find another." 

"Let him be," tanging sinabi ng Papa. I didn't expect him to be meek. I did not speak again. The mere fact that we are having this discussion because of Sam not coming back from her work is enough to piss me off. And the more it was being discussed in front of my family, it adds more to the irritation I am already feeling right now.

"Ah--, hey Adam. If--If you want, I'll find some recommendation from my cousin working in a hospital. What do you think?" Vee asked hurriedly after a long awkward silence.

I tried to smile. "Thanks, Vee."

Breakfast sucks.

****

After Vee's visit, she regularly came to the house. Its been another three days and three days na nag i interview si Mama ng mga aplikante. Vee usually stayed until late afternoon and she is a very good companion. We catch up about her acting career. And she enrolled few units in Fine Arts to pursue her chosen career na sa malas ay hindi ganoon ka suportado ng kanyang mga magulang.

She graduated a pre-med with flying colors and her parents wanted her to pursue the medical education. It was when she decided to try working abroad. Vee's parents are both doctors in their respective field. Her father is a surgeon and her mother is an ortho. Natural lamang na gugustuhin nila na ang nag iisang anak nilang babae ay sundan ang yapak nila sa medisina.

"Hey, I prepare you a lemonade."

Napamulat ako ng mga mata ng marinig ko ang tinig ni Vee. Kasalukuyang nasa salas ako at saglit na napapikit nang umalis ito. Umayos ako ng pagkakaupo. "You shouldn't bother." Inabot nito sa akin ang baso.

"I wanted to. Besides, this is the least thing that I can do. Hey, how about tomorrow? Let me bring you somewhere?" She asked in a hype voice. 

"Ha?" 

She giggles. "Supposedly, you should take me out to see the city but since you can't then I will. I will tour you around!" Excited na sabi nito.

"I---." Actually, I don't know what to say to it. I think I am not fit to go out since I was pre-occupied with a lot of things. 

Sam.

I closed my eyes and shut the idea of thinking about where the hell is she. She is not coming back, I should let it go. I'll find another.

She's fired, anyway.

I opened my eyes and smiled at her. "Yes, why not?"

"Oh, good! Well, I will be very careful behind the wheel I promise!"

I laughed. If I had known better, I am sure she is raising her right hand like a Girl's Scout Promise.

"What are you doing here, Sam?!"

Nawala ang ngiti ko kasabay ng pagsirko ng sikmura ko nang marinig ko ang matinis na tinig ng Mama.

Sam?
























<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script type = "text/javascript">
  $(document).ready(function(){ 
    $(document).on('click', '.like', function(){
      var id=$(this).attr("id");
      var $this = $(this);
      $this.toggleClass('unlike');
      if($this.hasClass('fa fa-heart')){
        //$this.text('Like'); 
      } else {
        //$this.text('Unlike');
        $this.addClass("fa fa-heart-o"); 
      }
        $.ajax({
          type: "POST",
          url: "like.php",
          data: {
            id: id,
            like: 1,
          },
          success: function(){
            showLike(id);
          }
        });
    });
 
    $(document).on('click', '.unlike', function(){
      var id=$(this).attr("id");
      var $this = $(this);
      $this.toggleClass('fa fa-heart-o');
      if($this.hasClass('fa fa-heart-o')){
        //$this.text('Unlike'); 
      } else {
        //$this.text('Like');
        $this.addClass("fa fa-heart"); 
      }
        $.ajax({
          type: "POST",
          url: "like.php",
          data: {
            id: id,
            like: 1,
          },
          success: function(){
            showLike(id);
          }
        });
    });
 
  });
 
  function showLike(id){
    $.ajax({
      url: 'show_like.php',
      type: 'POST',
      async: false,
      data:{
        id: id,
        showlike: 1
      },
      success: function(response){
        $('#show_like'+id).html(response);
 
      }
    });
  } 


</script>