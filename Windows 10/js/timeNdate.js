setInterval(timeNdate,1000);
function timeNdate(){
	const timeNdate=new Date();
	let hour=timeNdate.getHours();
	let minute=timeNdate.getMinutes();
	let format;

	// __________________Formet checking_______________
	if(hour>11)
		format="PM";
	else
		format="AM";

	// _____________Optimizing 24hrs formet__________________
	if(hour>12)
		hour-=12;
	else if(hour==0)
		hour=12;

	document.getElementById("hour").innerHTML=hour;
	
	if(minute>=0 && minute<=9)
		document.getElementById("minute").innerHTML=`0${minute}`;
	else
		document.getElementById("minute").innerHTML=minute;

	document.getElementById("format").innerHTML=format;


	// _______________________Managing Date________________________
	const optionsForLocalDateString={weekday:"long",month:"long",day:"numeric"};
	document.getElementById("date").innerHTML=timeNdate.toLocaleDateString(undefined,optionsForLocalDateString);
}