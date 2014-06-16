
		<div class="content">

			<?php
			require_once 'gallery_code.php';
			
			$GLOBALS['admins'] = array("192.168.1.1","46.238.53.111");
			$ip = $_SERVER['REMOTE_ADDR'];

			if (isset($_POST['NormalView'])) {
				$amiadmin = in_array($ip, $GLOBALS['admins']);
				if ($amiadmin) {
					foreach ($GLOBALS['admins'] as $key => $value) {
						if ($value == $_SERVER['REMOTE_ADDR'])
							unset($GLOBALS['admins'][$key]);
					}
				} else {
					echo "You are not an admin. <br>";
				}

			}

			if (in_array($ip, $GLOBALS['admins'])) {
				echo "
				<form method=\"POST\" enctype=\"multipart/form-data\" id=\"import_form\">
					<input type=\"file\" name=\"file\" size=\"50\" >
					<input type=\"submit\" name=\"Import\" value=\"Import Image\">
				</form>";	
			}

			echo "<h3 class=\"titles\"> Gallery </h3> <br>";
				
				require_once 'gallery_delete.php';
				require_once 'gallery_print.php';
			?>

		</div>

		<?php
			if (in_array($ip, $GLOBALS['admins'])) {
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