<html>
<head>
	<title>CSCC - Clock - APP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	
	
	
</head>
<body id="bodyBG">
	<?php
		$customClock = $_REQUEST['clock'];
		parse_str($_REQUEST['clock'],$clockArray);
		/*
		$b - background color
		$c - show clock
		$t - show time
		$sc - Shadow Color
		$bc - Border Color 
		$fc - Face Color 
		$cc - Center Color 
		$nc - Number Color 
		$hc - hour hand color 
		$mc - minute hand color 
		$xc - second hand color 		
		$tc - text color 		
		$tm - text format 		
		*/
		
	?>
	<div id="clockHolder">
		<canvas id="canvas" width="800" height="800" style="background-color:#00000000"></canvas>
	</div>
	
	<div id="dateAndTime" class=""></div>
	<script>
		var shadow=0;
		var border=0;
		var face=0;
		var fCenter=0;
		var numbers=0;
		var hourHand=0;
		var minuteHand=0;
		var secondHand=0;
		
		var shadowO=0;
		var borderO=0;
		var faceO=0;
		var fCenterO=0;
		var numbersO=0;
		var hourHandO=0;
		var minuteHandO=0;
		var secondHandO=0;
		
		var timeO=0;
<?php
		parse_str($_REQUEST['clock']);
		echo'var bgC="'.$b.'";';
		echo'var showClock='.$c.';';
		echo'var showTime='.$t.';';
		if(isset($c)){
			if(isset($sc)){
				echo'shadow=1;';
				echo'var shadowCO="'.$sc.'";';
			}
			if(isset($bc)){
				echo'border=1;';
				echo'var borderCO="'.$bc.'";';
			}
			if(isset($fc)){
				echo'face=1;';
				echo'var faceCO="'.$fc.'";';
			}
			if(isset($cc)){
				echo'fCenter=1;';
				echo'var fCenterCO="'.$cc.'";';
			}
			if(isset($nc)){
				echo'numbers=1;';
				echo'var numbersCO="'.$nc.'";';
			}
			if(isset($hc)){
				echo'hourHand=1;';
				echo'var hourHandCO="'.$hc.'";';
			}
			if(isset($mc)){
				echo'minuteHand=1;';
				echo'var minuteHandCO="'.$mc.'";';
			}
			if(isset($xc)){
				echo'secondHand=1;';
				echo'var secondHandCO="'.$xc.'";';
			}
		}
		if(isset($t)){
			echo'var timeCO="'.$tc.'";';
			echo'var timeFormat="'.$tm.'";';
		}
		
?>	
		var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
		if(!showClock){
			var tempE=document.getElementById('clockHolder');
			tempE.style.display='none';
		}	
		var timeDisplay = timeFormat.split('');
		var tDisp;
	//Date and time below clock.
		if(showTime){
		var e=document.getElementById('dateAndTime');
		var i = 0;
		var timerX=500;//Update twice a second.
		var month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
		var day = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
		$(document).ready(function() {  
		  clockUpdate(); //Get the initial Time and Day
		  setInterval(clockUpdate, timerX);
		});
		}
		else{
			var e=document.getElementById('canvas');
			e.style.height='90vmin';
		}
		function clockUpdate(){
			var today = new Date();
			var h = today.getHours();
			var hh = h;//12 hour time display.
			var xx = "AM";
			if(h >12){
				hh = h-12;
			}
			if(h>=12 && h<24){
				xx='PM';
			}
			tDisp='';
			var m = today.getMinutes();
			var s = today.getSeconds();
			var d = today.getDate();
			var D = day[today.getDay()];
			var Dd = day[today.getDay()].substr(0,3);
			var M = month[today.getMonth()];
			var Mm = today.getMonth();
			var MM = month[today.getMonth()].substr(0,3);
			var Y = today.getFullYear();
			var Yy = today.getYear().toString().substr(-2);
			m = addZero(m);//Add zero in front of numbers < 10
			s = addZero(s);//Add zero in front of numbers < 1
			for (i = 0; i < timeDisplay.length; i++) {
				if(timeDisplay[i] == "h"){
				 tDisp += h;
				}
				else if(timeDisplay[i] == "H"){
				 tDisp += hh;
				}
				else if(timeDisplay[i] == "m"){
				 tDisp += m;
				}
				else if(timeDisplay[i] == "s"){
				 tDisp += s;
				}
				else if(timeDisplay[i] == "d"){
				 tDisp += d;
				}
				else if(timeDisplay[i] == "D"){
				 tDisp += D;
				}
				else if(timeDisplay[i] == "e"){
				 tDisp += Dd;
				}
				else if(timeDisplay[i] == "M"){
				 tDisp += M;
				}
				else if(timeDisplay[i] == "Y"){
				  tDisp += Y;
				}
				else if(timeDisplay[i] == "N"){
				 tDisp += Mm;
				}
				else if(timeDisplay[i] == "y"){
				  tDisp += Yy;
				}
				else if(timeDisplay[i] == "O"){
				 tDisp += MM;
				}
				else if(timeDisplay[i] == "b"){
				  tDisp += '<br>';
				}
				else if(timeDisplay[i] == "x"){
				 tDisp += xx;
				}
				else{
				 tDisp += timeDisplay[i];
				}
			}
			document.getElementById('dateAndTime').innerHTML =tDisp;//Display time and date in element with given ID.
			document.getElementById('dateAndTime').style.color=timeCO;
			if(!isChrome){		
					var tmpO = timeCO.substr(7,2);
					tmpO=parseInt(tmpO, 16);
					tmpO=tmpO/255;	
					var tmpr = timeCO.substr(1,2);
					tmpr = parseInt(tmpr, 16);
					var tmpg = timeCO.substr(3,2);
					tmpg = parseInt(tmpg, 16);
					var tmpb = timeCO.substr(5,2);
					tmpb = parseInt(tmpb, 16);
					document.getElementById('dateAndTime').style.color= "rgba("+tmpr+","+tmpg+","+tmpb+","+tmpO+")";
			}
			//Hour:Minutes AM/PM
			//Month Day, Year
		}
	
		//Add zero in front of numbers < 10
		function addZero(i) {
			if (i < 10) {i = "0" + i};
			return i;
		}

		//Draw Clock - Prep Canvas
		var bgO=0;
		document.getElementById("bodyBG").style.background=bgC;
		if(!isChrome){			
			bgO=bgC.substr(7,2);
			bgO=parseInt(bgO, 16);
			bgO=bgO/255;	
			var tmpr = bgC.substr(1,2);
			tmpr = parseInt(tmpr, 16);
			var tmpg = bgC.substr(3,2);
			tmpg = parseInt(tmpg, 16);
			var tmpb = bgC.substr(5,2);
			tmpb = parseInt(tmpb, 16);
			document.getElementById("bodyBG").style.background= "rgba("+tmpr+","+tmpg+","+tmpb+","+bgO+")";
		}
		var canvas = document.getElementById("canvas");//Select the canvas you want to draw on
		var ctx = canvas.getContext("2d");//Canvas context.  HTML5 Standards
		var radius = canvas.height / 2;//Making circles here based on canvas height
		ctx.translate(radius, radius);//center that circle
		radius = radius * 0.90;//shrink it a bit for better fit in the canvas

		//Draw the clock
		var clockinterval = setInterval(drawClock, 1000);//update every second
		function drawClock() {
			if(showClock){
				ctx.clearRect(0-(radius*1.1), 0-(radius*1.1), canvas.width, canvas.height);
				drawFace(ctx, radius);
				if(numbers){
					drawNumbers(ctx, radius);
				}
				drawTime(ctx, radius);
			}
			
			if(!showClock){
				clearInterval(clockinterval);
				canvas.style.display="none";
			}
		}
		function drawFace(ctx, radius) {
			ctx.clearRect(0-(radius*1.1), 0-(radius*1.1), canvas.width, canvas.height);//Need to clear the transparent shadow to avoid having a solid shadow.
			//shadow
			if(shadow){
			ctx.beginPath();
			ctx.arc(0, 5, radius+5, 0, 2*Math.PI);
			ctx.fillStyle = shadowCO;//clock dhadow color
			if(!isChrome){
				ctx.globalAlpha=(parseInt(shadowCO.substr(7,2), 16))/255;
				ctx.fillStyle =shadowCO.substr(0,7)
			}
			ctx.fill();
			}

			//background
			if(face){
			ctx.beginPath();
			ctx.arc(0, 0, radius, 0, 2*Math.PI);
			ctx.fillStyle = faceCO;//clock face color
			if(!isChrome){
				ctx.globalAlpha=(parseInt(faceCO.substr(7,2), 16))/255;
				ctx.fillStyle =faceCO.substr(0,7)
			}
			ctx.fill();
			}
			//border
			if(border){
			ctx.lineWidth = radius*0.02;
			ctx.strokeStyle = borderCO;//clock border color
			if(!isChrome){
				ctx.globalAlpha=(parseInt(borderCO.substr(7,2), 16))/255;
				ctx.strokeStyle =borderCO.substr(0,7)
			}
			ctx.stroke();
			}
			//center
			if(fCenter){
			ctx.beginPath();
			ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
			ctx.fillStyle = fCenterCO;//clock center color with slight transparency.
			if(!isChrome){
				ctx.globalAlpha=(parseInt(fCenterCO.substr(7,2), 16))/255;
				ctx.fillStyle =fCenterCO.substr(0,7)
			}
			ctx.fill();
			}
			ctx.globalAlpha=1;
		}
		function drawNumbers(ctx, radius) {
			var ang;
			var num;
			ctx.font = radius*0.2 + "px arial";//clock number font and size
			ctx.textBaseline="middle";
			ctx.textAlign="center";
			ctx.fillStyle = numbersCO;//number color
			if(!isChrome){
				ctx.globalAlpha=(parseInt(numbersCO.substr(7,2), 16))/255;
				ctx.fillStyle =numbersCO.substr(0,7)
			}
			for(num = 1; num < 13; num++){//calculations for drawing the numbers in a circle
				ang = num * Math.PI / 6;
				ctx.rotate(ang);
				ctx.translate(0, -radius*0.85);//the 0.85 moves the numbers in slightly from the edge of the circle.
				ctx.rotate(-ang);
				ctx.fillText(num.toString(), 0, 0);
				ctx.rotate(ang);
				ctx.translate(0, radius*0.85);
				ctx.rotate(-ang);
			}
			ctx.globalAlpha=1;
		}
		function drawTime(ctx, radius){
			var now = new Date();
			var hour = now.getHours();
			var minute = now.getMinutes();
			var second = now.getSeconds();
			// second
			second=(second*Math.PI/30);
			//minute
			minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
			//hour
			hour=hour%12;
			hour=(hour*Math.PI/6)+
			(minute*Math.PI/(6*60))+
			(second*Math.PI/(360*60));
			//hand draw order
			
			if(hourHand)drawHand(ctx, hour, radius*0.5, radius*0.07,hourHandCO);//hour hand
			if(minuteHand)drawHand(ctx, minute, radius*0.7, radius*0.07,minuteHandCO);//minute hand
			if(secondHand)drawHand(ctx, second, radius*0.8, radius*0.02,secondHandCO);//second hand
			ctx.globalAlpha=1;
		}
		function drawHand(ctx, pos, length, width,handColor) {
			ctx.strokeStyle = handColor;
			if(!isChrome){
				ctx.globalAlpha=(parseInt(handColor.substr(7,2), 16))/255;
				ctx.strokeStyle =handColor.substr(0,7);
			}
			ctx.beginPath();
			ctx.lineWidth = width;
			ctx.lineCap = "round";
			ctx.moveTo(0,0);
			ctx.rotate(pos);
			ctx.lineTo(0, -length);
			ctx.stroke();
			ctx.rotate(-pos);
		}
		</script>
	</body>
</html>
