//Date and time below clock.
var e=document.getElementById('dateAndTime');
var i = 0;
var timerX=500;//Update twice a second.
var month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
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
	var m = today.getMinutes();
	var s = today.getSeconds();
	var d = today.getDate();
	var M = month[today.getMonth()];
	var Y = today.getFullYear();
	m = addZero(m);//Add zero in front of numbers < 10
	s = addZero(s);//Add zero in front of numbers < 10
	
	document.getElementById('dateAndTime').innerHTML =hh + ":" + m + " " + xx+"<br>"+M+" "+d+", "+Y;//Display time and date in element with given ID.
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
setInterval(drawClock, 1000);//update every second
function drawClock() {
	drawFace(ctx, radius);
	drawNumbers(ctx, radius);
	drawTime(ctx, radius);
}
function drawFace(ctx, radius) {
	//shadow
	ctx.beginPath();
	ctx.clearRect(0-(radius*1.1), 0-(radius*1.1), canvas.width, canvas.height);//Need to clear the transparent shadow to avoid having a solid shadow.
	ctx.arc(0, 5, radius+5, 0, 2*Math.PI);
	ctx.fillStyle = '#33333333';//clock dhadow color
	ctx.fill();
	//background
	ctx.beginPath();
	ctx.arc(0, 0, radius, 0, 2*Math.PI);
	ctx.fillStyle = '#5D99B1';//clock face color
	ctx.fill();
	//border
	ctx.strokeStyle = '#ffffff';//clock border color
	ctx.lineWidth = radius*0.02;
	ctx.stroke();
	//center
	ctx.beginPath();
	ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
	ctx.fillStyle = '#ffffffdd';//clock center color with slight transparency.
	ctx.fill();
}
function drawNumbers(ctx, radius) {
	var ang;
	var num;
	ctx.font = radius*0.2 + "px arial";//clock number font and size
	ctx.textBaseline="middle";
	ctx.textAlign="center";
	ctx.fillStyle = '#ffffff';//number color
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
	drawHand(ctx, hour, radius*0.5, radius*0.07,'#ffffff');//hour hand
	drawHand(ctx, minute, radius*0.7, radius*0.07,'#eeeeee');//minute hand
	drawHand(ctx, second, radius*0.8, radius*0.02,'#333333');//second hand
}
function drawHand(ctx, pos, length, width,handColor) {
	ctx.strokeStyle = handColor;
	ctx.beginPath();
	ctx.lineWidth = width;
	ctx.lineCap = "round";
	ctx.moveTo(0,0);
	ctx.rotate(pos);
	ctx.lineTo(0, -length);
	ctx.stroke();
	ctx.rotate(-pos);
}