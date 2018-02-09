<?php 

 require 'config/connect.php';

if(isset($_POST['email']) && !empty($_POST['email'])){

 	$email = mysqli_real_escape_string($connection,$_POST['email']);

		if(filter_var($email,FILTER_VALIDATE_EMAIL)){

			 $smsg =  "Corecjt";
		 
	}else {



	}



}else {
	
}	


 ?>








<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		html {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

*,
*:before,
*:after {
  -webkit-box-sizing: inherit;
          box-sizing: inherit;
}

html {
  min-width: 100%;
  min-height: 100%;
}

body {
  margin: 0;
  background-color: #282828;
}

h1 {
  font-size: 30px;
  font-weight: 300;
  font-family: sans-serif;
  padding: 10px 30px;
  color: gold;
  -webkit-font-smoothing: antialiased;
  position: absolute;
  z-index: 1;
  left: 0;
  right: 0;
  top:200px;
 /* background: rgba(0, 0, 0, 0.4);*/
  text-align: center;
  

}
video {
  position: fixed;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: -1;
  -webkit-transform: translateX(-50%) translateY(-50%);
          transform: translateX(-50%) translateY(-50%);
}






[id="grayscale"]:checked ~ div video {
  -webkit-filter: grayscale(1);
          filter: grayscale(1);
}

[id="sepia"]:checked ~ div video {
  -webkit-filter: sepia(1);
          filter: sepia(1);
}

[id="contrast"]:checked ~ div video {
  -webkit-filter: contrast(3);
          filter: contrast(3);
}

[id="saturate"]:checked ~ div video {
  -webkit-filter: saturate(4);
          filter: saturate(4);
}

[id="hue-rotate"]:checked ~ div video {
  -webkit-filter: hue-rotate(90deg);
          filter: hue-rotate(90deg);
}

[id="blur"]:checked ~ div video {
  -webkit-filter: blur(5px);
          filter: blur(5px);
}

[id="tint"]:checked ~ div video {
  -webkit-filter: sepia(1) hue-rotate(200deg);
          filter: sepia(1) hue-rotate(200deg);
}

[id="invert"]:checked ~ div video {
  -webkit-filter: invert(0.8);
          filter: invert(0.8);
}

[id="opacity"]:checked ~ div video {
  -webkit-filter: opacity(0.5);
          filter: opacity(0.5);
}

[id="inkwell"]:checked ~ div video {
  -webkit-filter: grayscale(1) brightness(0.45) contrast(1.05);
          filter: grayscale(1) brightness(0.45) contrast(1.05);
}

[id="brightness"]:checked ~ div video {
  -webkit-filter: brightness(0.5);
          filter: brightness(0.5);
}

[id="combo"]:checked ~ div video {
  -webkit-filter: contrast(1.4) saturate(1.8) sepia(0.6);
          filter: contrast(1.4) saturate(1.8) sepia(0.6);
}

[id="pattern"]:checked ~ div:before {
  position: absolute;
  content: "";
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-image: linear-gradient(22.5deg, #000 25%, transparent 25%, transparent 50%, #000 50%, #000 75%, transparent 75%, transparent);
  background-size: 4px 4px;
}

html {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  font-size: 100%;
  font-family: Arial;
}

* {
  -webkit-box-sizing: inherit;
          box-sizing: inherit;
}

.subscribe-1 {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 25.25em;
  height: 5em;
  margin: auto;
  padding: 1em 0.75em;
  border: 3px solid transparent;
  border-radius: 8px;
  overflow: hidden;
  -webkit-transition: width 0.15s ease;
  transition: width 0.15s ease;
  z-index:1004;
}
.subscribe-1__active {
  width: 31.25em;
  border: 3px solid #D4AF37;
  z-index:1001;
}
.subscribe-1__success {
  border: 3px solid #4cce95;
  z-index:1002;
}
.subscribe-1 input[type="email"] {
  color: #D4AF37;
  width: 75%;
  height: 100%;
  margin-right: 2%;
  padding-left: 0.5em;
  padding-right: 0.5em;
  font-size: 1rem;
  border: 0;
  outline: 0;
  z-index:1001;
}
.subscribe-1 button {
  -webkit-box-flex: 1;
      -ms-flex-positive: 1;
          flex-grow: 1;
  border: 0;
  border-radius: 4px;
  background: #D4AF37;
  color: #fff;
  cursor: pointer;
  font-size: 1em;
  -webkit-transition: background 0.2s ease;
  transition: background 0.2s ease;
  z-index:1001;
}
.subscribe-1 button:hover {
  background: #C5B358;
  z-index:1001;
}

.subscribe__wrapper {
  height: 100%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  z-index:1001;
}

.subscribe__toggle {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  /*background: #2a72a4;*/
  background: #D4AF37;
  text-align: center;
  text-decoration: none;
  color: #fff;
  font-size: 1.25em;
  line-height: 70px;
  border-radius: 4px;
  -webkit-transition: opacity 0.15s ease, background 0.2s ease;
  transition: opacity 0.15s ease, background 0.2s ease;
  z-index:1002;
}
.subscribe__toggle__hidden {
  opacity: 0;
  pointer-events: none;
  z-index:1001;
}
.subscribe__toggle:hover {
  background: #C5B358;
  z-index:1002;
}

.subscribe__success {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  line-height: 70px;
  color: #4cce95;
  text-align: center;
  background: #fff;
  opacity: 0;
  pointer-events: none;
  -webkit-transition: opacity 0.25s 0.2s ease;
  transition: opacity 0.25s 0.2s ease;
  z-index:1001;
}
.subscribe__success--active {
  opacity: 1;
  z-index:1001;
}

.more-concepts {
  position: absolute;
  left: 50%;
  bottom: 20px;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  text-decoration: none;
  color: grey;
  z-index:1001;
}
.more-concepts:hover {
  text-decoration: underline;
  z-index:1001;
}


	</style>
</head>
<body>


 <form action="" method="post">
	<div class="subscribe subscribe-1">
	  <a href="#" class="subscribe__toggle" id="toggle">Click Here</a>


	         <span class="subscribe__success">You're all in set, check your email.</span>
	 
	  <div class="subscribe__wrapper">
		 
		    <input type="email" placeholder="Enter your email"  name = "email"/>
		    <button id="submit" name="submit">Join Now!</button>
		 
	  </div>
	</div>
 </form>


<h1 >How To Be A VIP Member?</h1>
<div class="grayscale">
    <video id="wp" autoplay loop playsinline muted poster="//s3-us-west-2.amazonaws.com/s.cdpn.io/68939/wppost.jpg " >
       <source src="atejoybs3.mp4" type="video/mp4">
    </video>
</div>






<script type="text/javascript">
	document.ontouchstart = function(){ document.getElementById('wp').play(); }

var toggle = document.getElementById('toggle'),
  wrapper = document.querySelectorAll('.subscribe'),
  submit = document.getElementById('submit'),
  success = document.querySelectorAll('.subscribe__success'),
  content = document.querySelectorAll('.subscribe__wrapper');

toggle.addEventListener('click', function() {
  this.className += ' subscribe__toggle__hidden';
  wrapper[0].className += ' subscribe-1__active';
});

submit.addEventListener('click', function() {
  success[0].className += ' subscribe__success--active';
  wrapper[0].className += ' subscribe-1__success';
  content[0].style.display = 'none';
});



</script>

<script type="text/javascript">
	
</script>


</body>
</html>