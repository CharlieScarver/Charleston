/////////////Ctrl disable code///////////////////
/*
	var isCtrl = false;
    document.onkeyup = function(e) {
	    if(e.which == 17)
	    isCtrl=false;
	}
  */
	/*
    document.onkeydown=function(e) {
    	if(e.which == 17)
    		isCtrl=true;
    	if((e.which == 85) || (e.which == 67) && isCtrl == true)
    	{
    		// alert(‘Keyboard shortcuts are cool!’);
    		return false;
   		}

   		^ In F12 disable code
    } 
  //

*/
/////////////F12 disable code///////////////////
/*
    document.onkeypress = function (event) {
        event = (event || window.event);
        if (event.keyCode == 123) {
           //alert('No F-12');
			return false;
        }
    }

	document.onkeydown = function (event) {
		var e = event
		event = (event || window.event);
        if (event.keyCode == 123) {
           //alert('No F-12');
			return false;
        }
      /*
      else if (e.which == 17) {
    		isCtrl=true;
    	}
    	else if((e.which == 85) || (e.which == 67) && isCtrl == true)
    	{
    		// No Ctrl+U and Ctrl+C
    		return false;
   		} 
      //
    }

    function disableF12 (event) {
    	event = (event || window.event);
        if (event.keyCode == 123) {
            //alert('No F-keys');
            return false;
        }
    }
*/
/////////////////////Right Click disable code///////////////////////
/*
document.oncontextmenu = function (event) {
    return false;
    // No Right click
   }
*/
/////////////////////end///////////////////////
 
function showTip () {
  if ($('#tip_button_show').attr("id") == "tip_button_show") {
    $('#tip_button_show').attr("id", "tip_button_hide");  
    $('#tip_text').hide();
    $('#tip').show(2500);
    $('#tip_text').delay(2600).show(500);
  } else {
    $('#tip_button_hide').attr("id", "tip_button_show");  
    $('#tip_text').hide(500);
    $('#tip').hide(2500).delay(1000);
  }

  /*
  $('#tip_text').hide();

  $('#tip').show(2500).delay(3000);
  setTimeout($('#tip_text').delay(2500).show(500).delay(2000).hide(500), 2500);
  $('#tip').hide(2500).delay(1000);
  */
}

function togglePlayer () {
  if ($('#music_button_show').attr("id") == "music_button_show") {
    $('#music_button_show').attr("id", "music_button_hide");  
    $('#player').show(2500).delay(1000);
  } else {
    $('#music_button_hide').attr("id", "music_button_show");  
    $('#player').hide(2500).delay(1000);
  }
}

// ---------------------------------

function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
       (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
} 

function F11 () { //HTML 5
  var docElm = document.documentElement;
  if (docElm.requestFullscreen) {
      docElm.requestFullscreen();
  }
  else if (docElm.mozRequestFullScreen) {
      docElm.mozRequestFullScreen();
  }
  else if (docElm.webkitRequestFullScreen) {
      docElm.webkitRequestFullScreen();
  }
}