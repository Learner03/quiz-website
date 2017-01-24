window.onload= start;

function hide(){
	var b, i;
	var a= document.getElementsByClassName("aexp");
	b= a.length;
	for(i=0; i<b; i++){
    a[i].slideUp();
	}    
} 

function quesDisp(val){ 
    var a= "e" + val;
	var a1= document.getElementById(a);
	var b= "b" + val;
	var b1= document.getElementById(b);
	$(b1).click(function(){
		$(a1).slideToggle();
	});	
}
 
function redirect() {
    $("#submit").click();
}

function start(){
    window.setTimeout(function() { redirect(); }, 61000); 
	var a, i, e;
 	var b= document.getElementsByClassName("bexp");
	b[0].addEventListener("click", function(){ quesDisp(1); });
	b[1].addEventListener("click", function(){ quesDisp(2); });
	b[2].addEventListener("click", function(){ quesDisp(3); });
	b[3].addEventListener("click", function(){ quesDisp(4); });
	b[4].addEventListener("click", function(){ quesDisp(5); });
	b[5].addEventListener("click", function(){ quesDisp(6); });
	b[6].addEventListener("click", function(){ quesDisp(7); });
	b[7].addEventListener("click", function(){ quesDisp(8); });
	b[8].addEventListener("click", function(){ quesDisp(9); });
	b[9].addEventListener("click", function(){ quesDisp(10); });
	hide();
}

/*
function quesDisp(val){ 
    var a= "e" + val;
	var a1= document.getElementById(a);
	var b= "b" + val;
	var b1= document.getElementById(b);
	b1.addEventListener("click", function(){
		if(a1.style.display==none){
			a1.slideDown();
		}
		else{
			a1.slideUp();
		}
	});
}  */