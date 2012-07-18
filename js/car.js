$(document).ready(function(){
  $("#cbname").click(function(){
  $("#cx").removeClass("selected").addClass("select");
  $("#csys").html("请选择车系");
  $("#box2").empty();
  $("#ck").removeClass("selected").addClass("select");
  $("#box3").empty();
  $("#box").slideToggle(400);
  $("#box2").slideUp(400);
  $("#box3").slideUp(400);
  });
  
  $("#brsrc").click(function(){
	$("#box").slideToggle(400);
	});
  
   $("#csys").click(function(){
	$("#box2").slideToggle(400);
	$("#box3").slideUp(400);
	$("#ck").removeClass("selected").addClass("select");
    $("#box3").empty(); 
	});
	
	$("#box a").click(function(){
	 var cbname = $(this).text();
	 $("#cbname").html(cbname);
	});
//分类树点击事件	
	$(".ccat").click(function(){
	  $(this).addClass("selc");
	  $(".gcat").removeClass("selc");
	  $("#goodscat").hide(500);
	  $("#specat").show(500);
	});
	
	$(".gcat").click(function(){
	  $(this).addClass("selc");
	  $(".ccat").removeClass("selc");
	  $("#specat").hide(500);
	  $("#goodscat").show(500);
	});
	
	
	
	$(".catittle").click(function(){
	  $(this).parent().find("ul").slideToggle(600);
	});
	
$(".catittle").toggle(function () { 
	$(this).removeClass("catittle").addClass("selcat"); }, function () { $(this).removeClass("selcat").addClass("catittle"); 
	});
});

function callcsys(cbid){
  $("#cx").addClass("selected").removeClass("select");
  $("#box").slideUp(400);
  Ajax.call('car.php?act=isysy','cbname='+cbid, cbrandResponse, 'POST', 'JSON');
}

function cbrandResponse(result){
	$("#box2").slideDown(400);
	for(i in result)
	{
	$("#box2").append("<ul><div class='comn'>"+i+"</div>");
			for(a = 0; a <result[i].length; a ++)
			{
			$("#box2").append("<a  href='javascript:void(0);' onclick='javascript:callctype("+result[i][a].id+")'>"+result[i][a].csys_name+"</a>");
			}
	}
}
function callctype(csid){
	 Ajax.call('car.php?act=sname','csysid='+csid, cnResponse, 'POST', 'JSON');
	 Ajax.call('car.php?act=isys','sid='+csid, ctResponse, 'POST', 'JSON');
}
function cnResponse(result){
	$("#box2").slideUp(400);
	$("#ck").addClass("selected").removeClass("select");
	$("#csys").html(result);
}
function ctResponse(result){
	for(i = 0; i <result.length; i ++)
	{
	$("#box3").append("<a href='index.php?cid="+result[i].id+"'>"+result[i].ctype_name+"</a><br>");
	}
	$("#box3").slideDown(400);
}
