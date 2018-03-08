<html>
<head>
	<title>CSCC - Clock - APP</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src="https://statics.teams.microsoft.com/sdk/v1.0/js/MicrosoftTeams.min.js"></script>
</head>
<body>
	<div id="settings">
		<form action="clock.php" method="get">
		<input type='text' id="customClockString" size="150" name="clock">
		<input type="submit">
		</form>
		<form  method="get">
			<div>
				Render Clock: <input checked="true" type="checkbox" name="showClock"  onChange="clockSetupOptions()"/><br>
				Render Time:<input checked="true" type="checkbox" name="showDateTime"   onChange="timeSetupOptions()"/><br>
				BG Color: <input type="color" name="bgC"  value="#ffffff" onChange="bgSetup('c',this.value)"/><span id="bgCValue">#ffffff</span><br>
				BG Opacity:<input type="range" min='0' max='100' value='0' name="bgO"  onChange="bgSetup('o',this.value)" onInput="bgSetup('o',this.value)"/><span id="bgOValue">0</span><br>
				
			</div>

				<div id="clockSetup">
				Render Shadow:<input checked="true"  type="checkbox" name="shadow" onChange="clockRenderOptions(0,this.checked)"/><br>
				Shadow Opacity:<input type="range" min='0' max='100' value='13' name="shadowO"  onChange="clockRenderOptions(2,this.value)"  onInput="clockRenderOptions(2,this.value)"/><span id="shadowOValue">0</span><br>
				Shadow Color: <input type="color" value="#333333" name="shadowC"  onChange="clockRenderOptions(1,this.value)"/><span id="shadowCValue">#333333</span><br>
				
				Render Border:<input checked="true"  type="checkbox" name="border"  onChange="clockRenderOptions(3,this.checked)"/><br>
				Border Color:<input type="color" value="#ffffff"  name="borderC"  onChange="clockRenderOptions(4,this.value)"/><span id="borderCValue">#ffffff</span><br>
				Border Opacity:<input type="range" min='0' max='100' value='100' name="borderO"  onChange="clockRenderOptions(9,this.value)"  onInput="clockRenderOptions(9,this.value)"/><span id="borderOValue">100</span><br>
				
				Render Face:<input checked="true"  type="checkbox" name="face"  onChange="clockRenderOptions(5,this.checked)"/><br>
				Face Color:<input type="color" value="#5D99B1"  name="faceC"  onChange="clockRenderOptions(6,this.value)"/><span id="faceCValue">#5D99B1</span><br>
				Face Opacity:<input type="range" min='0' max='100' value='100' name="faceO"  onChange="clockRenderOptions(10,this.value)"  onInput="clockRenderOptions(10,this.value)"/><span id="faceOValue">100</span><br>
				
				Render Center Circle:<input checked="true"  type="checkbox" name="center"  onChange="clockRenderOptions(7,this.checked)"/><br>
				Center Color:<input type="color" value="#ffffff" name="centerC"  onChange="clockRenderOptions(8,this.value)"/><span id="fCenterCValue">#ffffff</span><br>
				Center Opacity:<input type="range" min='0' max='100' value='100' name="centerO"  onChange="clockRenderOptions(11,this.value)"  onInput="clockRenderOptions(11,this.value)"/><span id="fCenterOValue">100</span><br>
				</div>
				<div id="clockSetup2">
				Render Numbers:<input checked="true"  type="checkbox" name="numbers"  onChange="clockRenderOptions(12,this.checked)"/><br>
				Number Color:<input type="color" value="#ffffff" name="numbersC"  onChange="clockRenderOptions(13,this.value)"/><span id="numbersCValue">#ffffff</span><br>
				Number Opacity:<input type="range" min='0' max='100' value='100' name="numbersO"  onChange="clockRenderOptions(14,this.value)" onInput="clockRenderOptions(14,this.value)"/><span id="numbersOValue">100</span><br>
				
				Render Hour Hand:<input checked="true"  type="checkbox" name="hour"onChange="clockRenderOptions(15,this.checked)"/><br>
				Hour Hand Color:<input type="color" name="hourC" value="#ffffff" onChange="clockRenderOptions(16,this.value)"/><span id="hourHandCValue">#ffffff</span><br>
				Hour Hand Opacity:<input type="range" min='0' max='100' value='100' name="hourO"  onChange="clockRenderOptions(17,this.value)" onInput="clockRenderOptions(17,this.value)"/><span id="hourHandOValue">100</span><br>
				
				Render Minute Hand:<input checked="true"  type="checkbox" name="minute"onChange="clockRenderOptions(18,this.checked)"/><br>
				Minute Hand Color:<input type="color" name="minuteC" value="#dddddd" onChange="clockRenderOptions(19,this.value)"/><span id="minuteHandCValue">#dddddd</span><br>
				Minute Hand Opacity:<input type="range" min='0' max='100' value='100' name="minuteO"  onChange="clockRenderOptions(20,this.value)"  onInput="clockRenderOptions(20,this.value)"/><span id="minuteHandOValue">100</span><br>
				
				Render Second Hand:<input checked="true"  type="checkbox" name="second"onChange="clockRenderOptions(21,this.checked)"/><br>
				Second Hand Color:<input type="color" name="secondC" value="#333333" onChange="clockRenderOptions(22,this.value)"/><span id="secondHandCValue">#333333</span><br>
				Second Hand Opacity:<input type="range" min='0' max='100' value='100' name="secondO"  onChange="clockRenderOptions(23,this.value)" onInput="clockRenderOptions(23,this.value)"/><span id="secondHandOValue">100</span><br>
				</div>
				
				<div id="timeSetup">
				Font Color:<input type="color" name="timeC" value="#333333" onChange="clockRenderOptions(24,this.value)"/><span id="timeCValue">#333333</span><br>
				Font Opacity:<input type="range" min='0' max='100' value='100' name="timeO"  onChange="clockRenderOptions(25,this.value)" onInput="clockRenderOptions(25,this.value)"/><span id="timeOValue">100</span><br>
				Time and Display Setup:<br>
					<input type="text" name="time" value="H:m xbM d, Y" onChange="timeSetupFormat(this.value)"  onInput="timeSetupFormat(this.value)"/><br>
					<code>
					----Possible Variables----<br>
					h - Hour in 24 hour format<br>
					H - Hour in 12 hour format<br>
					m - Minutes<br>
					s - Seconds<br>
					d - Numeric day<br>
					D - Day name<br>
					M - Month full name<br>
					N - Numeric month<br>
					O - 3 Character month<br>
					Y - Full year<br>
					y - 2 digit year<br>
					b - New line<br>
					x - AM/PM
					</code>
					
				</div>
				
		</form>
	</div>
	<div id="preview">
	<div id="clockHolder">
		<canvas id="canvas" width="600" height="600" style="background-color:#00000000">
	</div>
	</canvas>
	<div id="dateAndTime" class=""></div>
	</div>
	<script>
		var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
			//Preview Variables
		var showClock = 1;
		var showTime =1;
		var timeMsg="H:m xbM d, Y";
		//possible variables
		// h 24 hour format hour.
		// H 12 hour format hour.
		// m minutes
		// s seconds
		// d Day number value
		// D Day name
		// M month full name
		// Y full year
		// N 3char month
		// y 2 digit year
		// O numeric month
		// b is new line
		// x is am pm
		var timeDisplay=timeMsg.split('');
		var tDisp;
		var bgO="00";
		var bgC="#ffffff";
		var bgCf= bgC+bgO;
		
		
		var shadow=1;
		var shadowC= "#333333";
		var shadowO= "33";
		var shadowCO= shadowC+shadowO;
		
		var border=1;
		var borderC= "#ffffff";
		var borderO= "ff";
		var borderCO= borderC+borderO;
		
		var face=1;
		var faceC= "#5D99B1";
		var faceO= "ff";
		var faceCO= faceC+faceO;
		
		var fCenter=1;
		var fCenterC= "#ffffff";
		var fCenterO= "ff";
		var fCenterCO= fCenterC+fCenterO;
		
		var numbers=1;
		var numbersC="#ffffff";
		var numbersO="ff";
		var numbersCO=numbersC+numbersO;
		
		var hourHand=1;
		var hourHandC="#ffffff";
		var hourHandO="ff";
		var hourHandCO=hourHandC+hourHandO;
		
		var minuteHand=1;
		var minuteHandC="#dddddd";
		var minuteHandO="ff";
		var minuteHandCO=minuteHandC+minuteHandO;
		
		var secondHand=1;
		var secondHandC="#333333";
		var secondHandO="ff";
		var secondHandCO=secondHandC+secondHandO;
		
		var timeC="#333333";
		var timeO="ff";
		var timeCO=timeC+timeO;
		updateCustomString();
		
		function updateCustomString(){
			var el=document.getElementById('customClockString');
			el.value='b='+bgCf+'&c='+showClock+'&t='+showTime;
			if(showClock){
				if(shadow)el.value+='&sc='+shadowCO;
				if(border)el.value+='&bc='+borderCO;
				if(face)el.value+='&fc='+faceCO;
				if(fCenter)el.value+='&cc='+fCenterCO;
				if(numbers)el.value+='&nc='+numbersCO;
				if(hourHand)el.value+='&hc='+hourHandCO;
				if(minuteHand)el.value+='&mc='+minuteHandCO;
				if(secondHand)el.value+='&xc='+secondHandCO;
			}
			if(showTime){
				el.value+='&tc='+timeCO+'&tm='+timeMsg;
			}
			
		}
		function clockRenderOptions(arg1,arg2){
			if(arg1 == 0){
				 shadow=arg2;
			}
			else if(arg1 == 1){
				document.getElementById('shadowCValue').innerHTML=arg2;
				shadowC=arg2;
				shadowCO=shadowC+shadowO;
			}
			else if(arg1 == 2){
				document.getElementById('shadowOValue').innerHTML=arg2;
				arg2 = Math.round(parseInt(arg2,10)*2.55);
				if(arg2< 16){
					shadowO = '0'+arg2.toString(16);
				}
				else{
					shadowO =arg2.toString(16);
				}
				shadowCO=shadowC+shadowO;
			}
			else if(arg1 == 3){
				border=arg2;
			}
			else if(arg1 == 4){
				document.getElementById('borderCValue').innerHTML=arg2;
				borderC=arg2;
				borderCO=borderC+borderO;
			}
			else if(arg1 == 5){
				face=arg2;
			}
			else if(arg1 == 6){
				document.getElementById('faceCValue').innerHTML=arg2;
				faceC=arg2;
				faceCO=faceC+faceO;
			}
			else if(arg1 == 7){
				fCenter=arg2;
			}
			else if(arg1 == 8){
				document.getElementById('fCenterCValue').innerHTML=arg2;
				fCenterC=arg2;
				fCenterCO=fCenterC+fCenterO;
			}
			else if(arg1 == 9){
				document.getElementById('borderOValue').innerHTML=arg2;
				arg2 = Math.round(parseInt(arg2,10)*2.55);
				if(arg2< 16){
					borderO = '0'+arg2.toString(16);
				}
				else{
					borderO =arg2.toString(16);
				}
				borderCO=borderC+borderO;
			}
			else if(arg1 == 10){
				document.getElementById('faceOValue').innerHTML=arg2;
				arg2 = Math.round(parseInt(arg2,10)*2.55);
				if(arg2< 16){
					faceO = '0'+arg2.toString(16);
				}
				else{
					faceO =arg2.toString(16);
				}
				faceCO=faceC+faceO;
			}
			else if(arg1 == 11){
				document.getElementById('fCenterOValue').innerHTML=arg2;
				arg2 = Math.round(parseInt(arg2,10)*2.55);
				if(arg2< 16){
					fCenterO = '0'+arg2.toString(16);
				}
				else{
					fCenterO =arg2.toString(16);
				}
				fCenterCO=fCenterC+fCenterO;
			}
			else if(arg1 == 12){
				numbers=arg2;
			}
			else if(arg1 == 13){
				document.getElementById('numbersCValue').innerHTML=arg2;
				numbersC=arg2;
				numbersCO=numbersC+numbersO;
			}
			else if(arg1 == 14){
				document.getElementById('numbersOValue').innerHTML=arg2;
				arg2 = Math.round(parseInt(arg2,10)*2.55);
				if(arg2< 16){
					numbersO = '0'+arg2.toString(16);
				}
				else{
					numbersO =arg2.toString(16);
				}
				numbersCO=numbersC+numbersO;
			}
			else if(arg1 == 15){
				hourHand=arg2;
			}
			else if(arg1 == 16){
				document.getElementById('hourHandCValue').innerHTML=arg2;
				hourHandC=arg2;
				hourHandCO=hourHandC+hourHandO;
			}
			else if(arg1 == 17){
				document.getElementById('hourHandOValue').innerHTML=arg2;
				arg2 = Math.round(parseInt(arg2,10)*2.55);
				if(arg2< 16){
					hourHandO = '0'+arg2.toString(16);
				}
				else{
					hourHandO =arg2.toString(16);
				}
				hourHandCO=hourHandC+hourHandO;
			}
			else if(arg1 == 18){
				minuteHand=arg2;
			}
			else if(arg1 == 19){
				document.getElementById('minuteHandCValue').innerHTML=arg2;
				minuteHandC=arg2;
				minuteHandCO=minuteHandC+minuteHandO;
			}
			else if(arg1 == 20){
				document.getElementById('minuteHandOValue').innerHTML=arg2;
				arg2 = Math.round(parseInt(arg2,10)*2.55);
				if(arg2< 16){
					minuteHandO = '0'+arg2.toString(16);
				}
				else{
					minuteHandO =arg2.toString(16);
				}
				minuteHandCO=minuteHandC+minuteHandO;
			}
			else if(arg1 == 21){
				secondHand=arg2;
			}
			else if(arg1 == 22){
				document.getElementById('secondHandCValue').innerHTML=arg2;
				secondHandC=arg2;
				secondHandCO=secondHandC+secondHandO;
			}
			else if(arg1 == 23){
				document.getElementById('secondHandOValue').innerHTML=arg2;
				arg2 = Math.round(parseInt(arg2,10)*2.55);
				if(arg2< 16){
					secondHandO = '0'+arg2.toString(16);
				}
				else{
					secondHandO =arg2.toString(16);
				}
				secondHandCO=secondHandC+secondHandO;
			}
			else if(arg1 == 24){
				document.getElementById('timeCValue').innerHTML=arg2;
				timeC=arg2;
				timeCO=timeC+timeO;
				clockUpdate()
			}
			else if(arg1 == 25){
				document.getElementById('timeOValue').innerHTML=arg2;
				arg2 = Math.round(parseInt(arg2,10)*2.55);
				if(arg2< 16){
					timeO = '0'+arg2.toString(16);
				}
				else{
					timeO =arg2.toString(16);
				}
				timeCO=timeC+timeO;
				clockUpdate();
			}
			
			
			drawClock() ;
			updateCustomString();
			
		}
		
		
		
		function bgSetup(arg1,arg2){		
			if(arg1 == 'o'){
				document.getElementById('bgOValue').innerHTML=arg2;
				arg2 = Math.round(parseInt(arg2,10)*2.55);
				if(arg2< 16){
					bgO = '0'+arg2.toString(16);
				}
				else{
					bgO =arg2.toString(16);
				}
				
				
			}
			else{
				document.getElementById('bgCValue').innerHTML=arg2;
				bgC=arg2;
			}
			bgCf= bgC+bgO;
			document.getElementById('preview').style.backgroundColor=bgCf;
			if(!isChrome){	
				var tmpO=bgCf.substr(7,2);
				tmpO=parseInt(tmpO, 16);
				tmpO=tmpO/255;	
				var tmpr = bgCf.substr(1,2);
				tmpr = parseInt(tmpr, 16);
				var tmpg = bgCf.substr(3,2);
				tmpg = parseInt(tmpg, 16);
				var tmpb = bgCf.substr(5,2);
				tmpb = parseInt(tmpb, 16);
				document.getElementById('preview').style.backgroundColor = "rgba("+tmpr+","+tmpg+","+tmpb+","+tmpO+")";
			}
			updateCustomString();
		}
		
		function clockSetupOptions(){
			var elm = document.getElementById('clockSetup');
			var elm2 = document.getElementById('clockSetup2');
			if (elm.style.display =="none"){
				elm.style.display="block";
				elm2.style.display="block";
				showClock = 1;
				canvas.style.display="block";
				var clockinterval = setInterval(drawClock, 1000);//update every second
				
			}
			else{
				elm.style.display="none";
				elm2.style.display="none";
				showClock=0;
				clearInterval(clockinterval);
				canvas.style.display="none";
				console.log("Clock Stopped");
			}
			updateCustomString();
		}
		function timeSetupOptions(){
			var elm = document.getElementById('timeSetup');
			if (elm.style.display =="none"){
				elm.style.display="block";
				showTime= 1;
				var e=document.getElementById('dateAndTime');
				e.style.display="block";
			}
			else{
				elm.style.display="none";
				showTime=0;
				var e=document.getElementById('dateAndTime');
				e.style.display="none";
			}
			updateCustomString();
		}
		function timeSetupFormat(arg1){
			timeMsg=arg1;
			var tmp = arg1.split('');
			timeDisplay = tmp;
			updateCustomString();
		}
	
	
	
		//Date and time below clock.
		var e=document.getElementById('dateAndTime');
		var i = 0;
		var timerX=1000;//Update twice a second.
		var month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
		var day = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
		$(document).ready(function() {  
		  clockUpdate(); //Get the initial Time and Day
		  setInterval(clockUpdate, timerX);
		});
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
				var tmpO=timeCO.substr(7,2);
				tmpO=parseInt(tmpO, 16);
				tmpO=tmpO/255;	
				var tmpr = timeCO.substr(1,2);
				tmpr = parseInt(tmpr, 16);
				var tmpg = timeCO.substr(3,2);
				tmpg = parseInt(tmpg, 16);
				var tmpb = timeCO.substr(5,2);
				tmpb = parseInt(tmpb, 16);
				document.getElementById('dateAndTime').style.color = "rgba("+tmpr+","+tmpg+","+tmpb+","+tmpO+")";
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
			var canvas = document.getElementById("canvas");//Select the canvas you want to draw on
			var ctx = canvas.getContext("2d");//Canvas context.  HTML5 Standards
			var radius = canvas.height / 2;//Making circles here based on canvas height
			ctx.translate(radius, radius);//center that circle
			radius = radius * 0.90;//shrink it a bit for better fit in the canvas
			//Draw the clock
			var clockinterval = setInterval(drawClock, 1000);//update every second
			function drawClock() {
				ctx.clearRect(0-(radius*1.1), 0-(radius*1.1), canvas.width, canvas.height);
				drawFace(ctx, radius);
				if(numbers){
					drawNumbers(ctx, radius);
				}
				drawTime(ctx, radius);
				if(!showClock){
					clearInterval(clockinterval);
					canvas.style.display="none";
				}
			}
			function drawFace(ctx, radius) {
				ctx.globalAlpha =1;
				ctx.clearRect(0-(radius*1.1), 0-(radius*1.1), canvas.width, canvas.height);
				//shadow
				if(shadow){
				ctx.beginPath();
				//Need to clear the transparent shadow to avoid having a solid shadow.
				ctx.arc(0, 5, radius+5, 0, 2*Math.PI);
				ctx.fillStyle = shadowCO;//clock dhadow color
				if(!isChrome){
					ctx.globalAlpha=parseInt(shadowO, 16)/255;
					ctx.fillStyle = shadowC;
				}
				ctx.fill();
				ctx.globalAlpha =1;
				}
				
				//background
				if(face){
				ctx.beginPath();
				ctx.arc(0, 0, radius, 0, 2*Math.PI);
				ctx.fillStyle = faceCO;//clock face color
				if(!isChrome){
					ctx.globalAlpha=parseInt(faceO, 16)/255;
					ctx.fillStyle = faceC;
				}
				ctx.fill();
				ctx.globalAlpha =1;
				}
				//border
				if(border){
				
				ctx.strokeStyle = borderCO;//clock border color
				if(!isChrome){
					ctx.globalAlpha=parseInt(borderO, 16)/255;
					ctx.strokeStyle =borderC;
				}
				ctx.lineWidth = radius*0.02;
				ctx.stroke();
				ctx.globalAlpha =1;
				}
				//center
				if(fCenter){
				ctx.beginPath();
				ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
				ctx.fillStyle = fCenterCO;//clock center color
				if(!isChrome){
					ctx.globalAlpha=parseInt(fCenterO, 16)/255;
					ctx.fillStyle =fCenterC;
				}
				ctx.fill();
				ctx.globalAlpha =1;
				}
				ctx.globalAlpha  = 1;
			}
			function drawNumbers(ctx, radius) {
				var ang;
				var num;
				ctx.font = radius*0.2 + "px arial";//clock number font and size
				ctx.textBaseline="middle";
				ctx.textAlign="center";
				ctx.fillStyle = numbersCO;//number color
				if(!isChrome){
						ctx.globalAlpha=parseInt(numbersO, 16)/255;
						ctx.fillStyle =numbersC;
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
				ctx.globalAlpha=1;
				if(hourHand)drawHand(ctx, hour, radius*0.5, radius*0.07,hourHandCO);//hour hand
				if(minuteHand)drawHand(ctx, minute, radius*0.7, radius*0.07,minuteHandCO);//minute hand
				if(secondHand)drawHand(ctx, second, radius*0.8, radius*0.02,secondHandCO);//second hand
			}
			function drawHand(ctx, pos, length, width,handColor) {
				ctx.strokeStyle = handColor;
				if(!isChrome){
						ctx.globalAlpha=parseInt( handColor.substr(7,2), 16)/255;
						ctx.strokeStyle = handColor.substr(0,7);
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
