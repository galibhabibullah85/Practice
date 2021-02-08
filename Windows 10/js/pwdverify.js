var pwdInp=document.getElementById("pwd");

pwdInp.addEventListener("keyup",function(event){
	if (event.keyCode===13) {
		if (pwdInp.value=="") {
			alert("No password inserted!");
		}else if(pwdInp.value=="786@089"){
			document.getElementById("login").style.display="none";
			document.getElementById("greeting").style.display="flex";
			setTimeout(function(){
				window.location.assign("desktop.html");
			},3000);
		}else if(pwdInp.value!="786@089"){
			alert("Password did not matched!");
			pwdInp.value="";
		}
	}
});

var visualEye=document.getElementById("visual");

visualEye.addEventListener("mousedown",function(){
	pwdInp.type="text";
	visualEye.src="img/opened-eye.png";
});

visualEye.addEventListener("mouseup",function(){
	pwdInp.type="password";
	visualEye.src="img/closed-eye.png";
	pwdInp.focus();
});