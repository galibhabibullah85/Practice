function typing(){
	$(document).ready(function(){
		var options = {
		  strings: ['Assalamu alaikum, sir', 'I hope you will like my project','That all what I have done, Thank you','Wait..........','Still here!!!!!'],
		  typeSpeed: 40,
		  onComplete:function(self){
		  	document.getElementById("typingSound").pause();
		  	document.getElementById("typingSound").currentTime = 0.0;;
		  }
		};

		var typed = new Typed('.type', options);

		document.getElementById("typingSound").autoplay="true";
		document.getElementById("typingSound").play();
	});
}