		<?php

		$page = 'http://charleston.onthewifi.com/?page=Gallery';

		// or you could use $page = $_SERVER['PHP_SELF'] ;

		include ( 'Hits/Example_Hitcounter_v1.0/counter.php');
		addinfo($page);


		?>


		<div class="content">
			

			<?php
			
			echo "<h1 class=\"titles\"> Gallery </h1> <br>";

			// --------------------Already Gave?-----------------------------------

			if (!isset($_SESSION["{$GLOBALS['client_ip']}"])) {

				echo "<div id=\"gives_div\">
						<form method=\"POST\" id=\"gives_form\">
							<label id=\"gives_para\">Give us<br> a Heart</label>
							<input type=\"hidden\" name=\"action\" value=\"Submit Form\">
							<input type=\"image\" src=\"Other/heart.png\" name=\"Give\" id=\"gives_img\" alt=\"heart\">				
						</form>
					</div>";

			} else {

				echo "<div id=\"gives_div\">
						<pre id=\"gives_para\">Thanks for<br>your support!</pre>
						<img src=\"Other/heart.png\" id=\"gives_img\" alt=\"heart\">				
					</div>";

			}

			// ----------------------Give Form--------------------------------

			if (isset($_POST['action'])) {
				$_SESSION["{$GLOBALS['client_ip']}"] = 37;

				if (!mysql_connect("localhost","root","rootpass")) //Check if connection was successful
					echo "Failed to connect!";

				if (!mysql_select_db("charleston")) //Check if DB selection was successful
					echo "Failed to select DB!";

				$results = mysql_query("UPDATE gives SET `Count` = `Count` + '1'");
					if (!$results)  // Succession check
						echo "Failed to update! :c<br>";

				header("Location: http://charleston.onthewifi.com/?page=Thanks");
				exit;
			}

			// ------------------Gives Count--------------------------------------

			if (!mysql_connect("localhost","root","rootpass")) //Check if connection was successful
				echo "Failed to connect!";

			if (!mysql_select_db("charleston")) //Check if DB selection was successful
				echo "Failed to select DB!";

			$results = mysql_query("SELECT Count FROM gives");
				if (!$results)  // Succession check
					echo "Failed to update! :c<br>";

			$row = mysql_fetch_array($results);
			$gives_count = $row['Count'];

			echo "
			<div id=\"gives_count_div\">
				<pre id=\"gives_count_para\">{$gives_count}</pre>
				<img src=\"Other/heart.png\" alt=\"heart\" id=\"gives_count_img\">
			</div>";

			// -----------------Normal View Button: Clicked--------------------------------------

			if (isset($_POST['NormalView'])) {
				$amiadmin = in_array($GLOBALS['client_ip'], $GLOBALS['admins']);
				if ($amiadmin) {
					foreach ($GLOBALS['admins'] as $key => $value) {
						if ($value == $_SERVER['REMOTE_ADDR'])
							unset($GLOBALS['admins'][$key]);
					}
				} else {
					echo "You are not an admin. <br>";
				}

			}

			// ------------------Admin Import Form-----------------------------------

			if (in_array($GLOBALS['client_ip'], $GLOBALS['admins'])) {
				echo "
				<form method=\"POST\" enctype=\"multipart/form-data\" id=\"import_form\">
					<input type=\"file\" name=\"file\" size=\"50\" >
					<input type=\"submit\" name=\"Import\" value=\"Import Image\">
				</form>";	
			} 

			// ------------------Gallery Views------------------------------------

			if (strcmp($GLOBALS['client_ip'], "192.168.1.1") && strcmp($GLOBALS['client_ip'],"46.238.53.111")) {

				if (!mysql_connect("localhost","root","rootpass")) //Check if connection was successful
					echo "Failed to connect!";

				if (!mysql_select_db("charleston")) //Check if DB selection was successful
					echo "Failed to select DB!";

				$results = mysql_query("UPDATE views_gallery SET `Count` = `Count` + '1'");
					if (!$results)  // Succession check
						echo "Failed to update! :c<br>";
			
			}

			// ---------------------------------------------------

				echo "<div id=\"separator\"></div>";

				require_once 'gallery_code.php';
				require_once 'gallery_delete.php';
				require_once 'gallery_print.php';
			?>


		</div>

		<?php
			if (in_array($GLOBALS['client_ip'], $GLOBALS['admins'])) {
				echo "
					<form method=\"POST\" id=\"normal_view_form\">
						<input type=\"submit\" name=\"NormalView\" value=\"Normal View\">				
					</form>";
			}
		?>
		

		<div id="gallery_footer">
			<button id="top_anchor" onclick="$('html, body').animate({scrollTop: $('#header').offset().top}, 2000);">
			UP
			</button>
		</div>

		<div id="focus_big">
			<div id="focus_small">

			</div>
		</div>
			

		<script type="text/javascript">

		// -------Focus Image--------

		$("#focus_big").hide();
		$("#focus_small").hide();

		/*var admins = ["192.168.1.1","46.238.53.111","78.90.224.21"];
    	var ip;
    	$.get("http://ipinfo.io", function(response) {
			ip = response.ip;
			alert(ip);
		}, "jsonp");

    	var admin = false;
		if (jQuery.inArray(ip,admins) != -1) {
			admin = true;
		}*/

		$(document).ready(function() {
			$(".gal_images").click(function(event) {

	        	var fimg = $('<img id="fimg">'); 
				fimg.attr('src', 'Gallery/Pictures/Thumbnails/' + event.target.alt + '_big.jpg');
	        	fimg.attr('alt', event.target.alt);

	        	$('#focus_small').append(fimg);

	        	/*
	        	if ($('#fimg').attr('height') > $('#fimg').attr('width')) {
	        		var nh = $('#fimg').attr('height') + 100;
	        		$('#focus_small').attr('width',nh);
	        		alert(nh);
	        	} else { alert($('#fimg').attr('width'), $('#fimg').attr('height'));}
	        	*/

	        	/*if (admin) {

		        	var form = $("<form method=\"POST\" id=\"image_deletion_form\"></form>");
		        	form.append('<input type="hidden" name="image_id" value="' + event.target.alt + '.jpg" >');
		        	form.append('<input type="submit" name="DeleteImage" value="Delete Image" >');

		        	$('#focus_small').append(form);

		        }*/

	        	$("#focus_big").fadeToggle();
	        	$("#focus_small").fadeToggle(1000);

	   		});

			$("#focus_big").click(function(event) {

				$("#focus_small").fadeToggle();
	        	$("#focus_big").fadeToggle();

	        	$('#fimg').remove();
	        	//if (admin) $('#focus_small').remove('#image_deletion_form');
	   		});
	   	});


		</script>

	</body>
</html>