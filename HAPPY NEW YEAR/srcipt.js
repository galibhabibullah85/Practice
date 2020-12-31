let hour = document.querySelector("#hHand");
let minute = document.querySelector("#mHand");
let second = document.querySelector("#sHand");
let clock_sound = document.querySelector("#tikTok");
let alarm = document.querySelector("#alarm");
let reminder = document.querySelector("#timeLeft");
clock_sound.setAttribute('autoplay','');
var clock = document.querySelector("#clock");
var clockDiv = document.querySelector("#clockDiv");
var clockShdw = document.querySelector("#clcockShadow");
var handPos = document.querySelector(".hand_pos");
var mainFrame = document.querySelector("#mainFrame");
var countDown = document.querySelector("#countDown");
var hpyNwYer = document.querySelector("#hpyNwYer");
var gif = document.querySelector("#gif");

let dateObj;
let hourTime;
let minTime;
let secTime;
var count = 0;
var deg=0;


setInterval(()=>{
	//This is an "Aroow function"

	dateObj  = new Date();
	hourTime = dateObj.getHours();
	minTime = dateObj.getMinutes();
	secTime = dateObj.getSeconds();

	if(hourTime>12){
		hourTime-=12;
	}
	else if(hourTime==0){
		hourTime=12;
	}

	second.style.transform=`rotate(${secCount()}deg)`;

	function secCount(){
		deg=(secTime*6);
		if(deg==360){
			deg=0;
		}

		return deg;
	}


	minute.style.transform=`rotate(${minCount()}deg)`;

	var countForMin=6;
	function minCount(){
		deg=(minTime*6);
		if(deg==360){
			deg=0;
		}

		return deg;
	}

	hour.style.transform=`rotate(${hourCount()}deg)`;

	function hourCount(){
		
		deg=(hourTime*30);
		if(deg==360){
			deg=0;
		}

		return deg;
	}

	reminder.innerText=`${60-minTime} : ${60-secTime}`;

	if (secTime==0){
		if (minTime==0)
			reminder.innerText=`00 : 00`;
		else
			reminder.innerText=`${60-minTime} : 00`;
	}
	if (60-secTime < 10)
		reminder.innerText=`${60-minTime} : 0${60-secTime}`;

	if (60-secTime==0 && 60-minTime==0)
		happyNewYear()
},1000);

function happyNewYear(){
	clearInterval()
	clock.style = `height:400px`;
	clockShdw.style = `display:none`;
	clockDiv.style = `animation:shake 0.001s infinite alternate-reverse`;
	handPos.style=`position: absolute;top: -27px;`;
	clock_sound.remove()
	alarm.setAttribute('autoplay','');
	setTimeout(happyNewYear2,3000);
}

function happyNewYear2(){
	alarm.remove();
	countDown.remove()
	mainFrame.appendChild(hpyNwYer);
	hpyNwYer.style=`display:block`;
	gif.style=`margin: auto auto;width:100%;height:100%;`;
	gif.setAttribute('autoplay','');
	var gif2 = gif.cloneNode(true); //---------very very very important line
	gif2.remove();
}
happyNewYear();
hpyNwYer.appendChild(gif);