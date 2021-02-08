
function resizeWndw(){
	if(window.innerWidth<1300){
		alert("Sorry! Not compitable with your device.");
		document.write(" ");//removes or *overwrites the entire html
	}
}

if(window.innerWidth<1300){
		alert("Sorry! Not compitable with your device.");
		window.stop();//stops html from loading
	}