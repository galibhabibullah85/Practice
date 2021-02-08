function login(p){
	if (p==0) {
		document.getElementById("blackish").setAttribute("class","blackish");
		document.getElementById("login").style.display="block";
		document.getElementById("tnd").style.display="none";
		document.getElementById("ftr").style.display="none";
		document.getElementById("blackish").setAttribute("onclick","login(1)");
		document.getElementById("pwd").focus();
	}else{
		var flexbox=document.getElementById("flexbox");
		var pwdInp=document.getElementById("pwd");
		var greeting=document.getElementById("greeting");

		if (!(document.activeElement===pwdInp)&&(!flexbox.classList.contains('focused'))&&(greeting.style.display!="flex")) {
			pwdInp.value="";
			document.getElementById("blackish").setAttribute("class","");
			document.getElementById("login").style.display="none";
			document.getElementById("tnd").style.display="block";
			document.getElementById("ftr").style.display="block";
			document.getElementById("blackish").setAttribute("onclick","login(0)");
		}
	}
}