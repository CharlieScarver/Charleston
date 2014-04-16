
function showText(el) {	
//	$('.show').addClass('hide');
//	$('.show').removeClass('show');
//	$(el).addClass('show');

	if ( document.getElementById(el).className == "show" ) {
		document.getElementById(el).className = "hide";
	}
	else {
		document.getElementById(el).className = "show";

	}
}

//document.getElementById('main_content').jScrollPaneTrack { display: none; }

function getClientFullResolution() {
	var cW = window.screen.width;
 	var cH = window.screen.height;
	document.write("Full Resolution: ", cW, "x", cH, "; ");
}

function getBodySize() {
	var bw = window.innerWidth 
|| document.documentElement.clientWidth
|| document.body.clientWidth;

	var bh = window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;

	document.write("Body size: " + bw + "x" + bh + "; <br>");
}

function setBodySize() {
		var w = window.innerWidth 
|| document.documentElement.clientWidth
|| document.body.clientWidth;

	var h = window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;

	document.body.style.width = w;//'100px';//w;
	document.body.style.height = h;//'100px';//h;
}

function getInnerWindowSize() {
	var w = window.innerWidth 
|| document.documentElement.clientWidth
|| document.body.clientWidth;

	var h = window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;

	document.write("Inner Window: ", w, "x", h, "; ");
	return [w, h]
}

function getLocationInfo() {
	document.write("Hostname: " + location.hostname + "<br>");
	document.write("Port: " + location.port + "<br>");
	document.write("Protocol: " + location.protocol + "<br>");
}

function getClientIP(json) {
	//$.getJSON("http://smart-ip.net/geoip-json?callback=?", function(data){
   		document.write("IP: " + json.ip + "; <br>");
	//});
}

function getInfo() {
	$(document).ready( function() { 
		$.getJSON( "http://smart-ip.net/geoip-json?callback=?", function(data) { 
			console.log(data.host);
			console.log(data.countryName);
			console.log(data.region);
			console.log(data.lang);
		});
	});
}
