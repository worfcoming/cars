/*
 * Image preview script 
 * powered by jQuery (http://www.jquery.com)
 * 
 * written by Alen Grakalic (http://cssglobe.com)
 * 
 * for more info visit http://cssglobe.com/post/1695/easiest-tooltip-and-image-preview-using-jquery
 
 *
 */
 
this.imagePreview = function(){	
	/* CONFIG */
		xOffset = 150;
		yOffset = 30;
		classname = "previewr";
		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result
		
	/* END CONFIG */
	$("a.preview").hover(function(e){
								  
		if(e.screenX+330>document.body.clientWidth)
		{
			yOffset = -330;
			classname = "previewl";
		}
		else
		{
			yOffset = 30;
			classname = "previewr";
		}
		
		
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		
		var bimg = "";
		var boxtitle="";
		var zooms = this.getElementsByTagName("IMG");
		for(var i=0;i<zooms.length;i++)
		{
			if(zooms[i].className=="zoom")
			{
				bimg  = zooms[i].src; 
				htmltext = zooms[i].title;		
				htmlarray = htmltext.split("|");
			
				boxtitle = "<br /><br /><font style='font-size:12px; font-weight:bold; line-height:24px; padding-top:20px;'>"+htmlarray[0]+"</font><br />";
				boxtitle += "<font style='line-height:22px;'>"+htmlarray[1]+"</font><br />";
				boxtitle += "市场价：<font class='f_market'>"+htmlarray[3]+"元</font> &nbsp;&nbsp;&nbsp;&nbsp; 商城价：<font class='f_shop'>"+htmlarray[4]+"元</font><br />";				
				boxtitle+=  "<img src='themes/zuanshi/images/stars"+htmlarray[2]+".gif' style='width:78px;height:15px; padding-top:5px;' />";
				break;
			}
		}
		
		$("body").append("<p id='preview'><img src='"+ bimg +"' alt='' />"+ boxtitle +"</p>");	
		//$("#preview").removeClass();
		$("#preview").addClass(classname);
		$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("fast");
		
    },
	function(){
		this.title = this.t;	
		$("#preview").remove();
    });	
	$("a.preview").mousemove(function(e){
		if(e.screenX+330>document.body.clientWidth)
		{
			yOffset = -330;
			classname = "previewl";
		}
		else
		{
			yOffset = 30;
			classname = "previewr";
		}
		
		//$("#preview").removeClass();
		$("#preview").addClass(classname);
		$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
		
	});			
};




