/* Greybox Redux
 * Required: http://jquery.com/
 * Written by: John Resig
 * Based on code by: 4mir Salihefendic (http://amix.dk)
 * License: LGPL (read more in LGPL.txt)
 */

var GB_DONE = false;
var GB_HEIGHT = 400;
var GB_WIDTH = 400;

function GB_show(caption, url, height, width) {
  GB_HEIGHT = height || 400;
  GB_WIDTH = width || 400;
  GB_ANIMATION = true;
  if(!GB_DONE) 
  {
    $(document.body)
      .append("<div id='GB_back'><div id='GB_overlay'></div><div id='GB_window'><div id='GB_caption'></div>"
        + "<img src='themes/51ecshop/css/close.gif' alt='Close window'/></div></div>");
    $("#GB_window img").click(GB_hide);
    $("#GB_overlay").click(GB_hide);
    $(window).resize(GB_position);



  $("#GB_window").append("<iframe id='GB_frame' src='"+url+"'></iframe>");
  $("#GB_caption").html(caption);
  $("#GB_overlay").show();
  $("#GB_back").show();
  GB_position();

  if(GB_ANIMATION)
    $("#GB_window").slideDown("slow");
  else
    $("#GB_window").show();
	
  }
}

function GB_hide() {
  $("#GB_window,#GB_overlay,#GB_back,#GB_caption,#GB_frame").remove();

}

function GB_position() {
  var de = document.documentElement;
  var w = self.innerWidth || (de&&de.clientWidth) || document.body.clientWidth;
   $("#GB_back").css({height:document.body.clientHeight});
  $("#GB_window").css({width:GB_WIDTH+"px",height:GB_HEIGHT+"px",
    left: ((w - GB_WIDTH)/2)+"px" ,top:document.documentElement.scrollTop+30});
  $("#GB_frame").css("height",GB_HEIGHT - 32 +"px");
}


