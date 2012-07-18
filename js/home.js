var picCount=1;
var idxCount=0;
var BTCount=10;
function autoChangePic(){
	picCount++;
	if(picCount>3) picCount=1;
	$( "#blImg" ).attr({src:"/themes/car/images/idxbannerL"+picCount+".jpg"});
	$( "#brImg" ).attr({src:"/themes/car/images/idxbannerR"+picCount+".png"});
	$(".idx").not("#"+picCount).css({backgroundPosition:"bottom"});
	$("#"+picCount).css({backgroundPosition:"top"});
};
function clickChangePic(){
	$( "#blImg" ).attr({src:"/themes/car/images/idxbannerL"+picCount+".jpg"});
	$( "#brImg" ).attr({src:"/themes/car/images/idxbannerR"+picCount+".png"});
};

function runEffect(type,obj) {
	if(type=="click"){
		setTimeout("clickChangePic()",300);
		clearInterval(t1);
		picCount=obj.id;
		t1=setInterval("runEffect()",5000);		
				
	}
	else{
		
		setTimeout("autoChangePic()",1000);
	}
	$( "#blImg" ).animate({left:"-=250px",opacity:0},800);
	$( "#brImg" ).animate({left:"+=250px",opacity:0},800);
	$( "#blImg" ).animate({left:"+=250px",opacity:0.8},800);			
	$( "#brImg" ).animate({left:"-=250px",opacity:0.8},800);
	
};	

function BTChange(){
	if(BTCount>12) BTCount=10;
	else BTCount++;
	changeBlock();
	return;
}
function changeBlock(){
	$(".supportBT").css({color:"#666"});
	$("#"+BTCount).css({color:"#09f"});
	$(".support").css({display:"none"});
	$("#support"+BTCount).fadeIn(500);
}

$(document).ready(function(){
	
	$("#1").css({backgroundPosition:"top"});

	t1=setInterval("runEffect()",3500);	
	t2=setInterval("BTChange()",3500);			 
	$( ".idx" ).click(function(){							
		$(".idx").not(this).css({backgroundPosition:"bottom"});
		$(this).css({backgroundPosition:"top"});
		runEffect("click",this);
	});
	
	$(".supportBT:first").css({color:"#09f"});
	$(".supportBT").click(function(){
		BTCount=this.id;
		clearInterval(t2);
		t2=setInterval("BTChange()",3500);	
		changeBlock();
	});

	$(".support").live("mouseover mouseout",function(event){
		if(event.type=="mouseover") clearInterval(t2);
		if(event.type=="mouseout") t2=setInterval("BTChange()",3500);
	})

	$("a").bind("focus",function(){	
		this.blur();
	});	

	var Sys={}; 
    var ua = navigator.userAgent.toLowerCase(); 
    if (window.ActiveXObject) Sys.ie = ua.match(/msie ([\d.]+)/)[1];
	var version=parseInt(Sys.ie);
	$(".alertXX").click(function(){
		$(this).parentsUntil("#alert").slideUp(500);
	});
});