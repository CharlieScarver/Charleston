function clickSelector (old_id) {
	console.log("Parameter - ", old_id);
	var img = document.getElementById(old_id);
	if (img == null || old_id == "body_click" ) {
		img = document.getElementById("clicked");
	}
	console.log(document.getElementById("clicked"));
	console.log("ID Before change - ", img.getAttribute("id"));
	if (img.getAttribute("id") != "clicked") {
		if (document.getElementById("clicked") == null) {
			img.setAttribute("id", "clicked");
			//alert("Clicked On");
		} else {
			console.log("There is a zoomed image already!");
		}
	} else {
		if (old_id == "body_click") {
			img.setAttribute("id", makeId());
		} else {
			img.setAttribute("id", old_id);
		}
		//alert("Clicked Off");
	}
	console.log("ID After change - ", img.getAttribute("id"));
	console.log("--------------------------------\n");
}

function makeId()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

// ------------------------------

function zoomInImage () {
	var styleSheet = document.styleSheets[0];
	//console.log(styleSheet.cssRules[document.styleSheets[0].cssRules.length - 1].cssText);
	
	styleSheet.insertRule("#clicked {max-width: 1200px; max-height: 950px; margin-top: 75px; margin-bottom: 75px;}", styleSheet.cssRules.length - 1);
}

function zoomOutImage () {
	var styleSheet = document.styleSheets[0];
	//console.log(styleSheet.cssRules[document.styleSheets[0].cssRules.length - 1].cssText);

	styleSheet.deleteRule(styleSheet.cssRules.length - 1);
}


function deleteImage(id) {
    var elem = document.getElementById(id);
    elem.parentNode.removeChild(elem);
} 