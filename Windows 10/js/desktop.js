window.onload=()=>{
	document.getElementById("wlcomeTune").autoplay="true";
	document.getElementById("wlcomeTune").play();

    setTimeout(type,5000);

    function type(){
        document.getElementById("cmd").style.width="715px";
        document.getElementById("cmd").style.height="375px";
        setTimeout(typing,400);
    }
}