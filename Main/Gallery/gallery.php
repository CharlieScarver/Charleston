
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
			
			<a href="#top">
				<div id="top_anchor">
				 UP 
				</div>
			</a>

		</div>

		<div id="focus_big">
			<div id="focus_small">

				<?php
				/*
				

				$id = 31;

				if (isset($_GET['n']))	{
					require_once 'data_getter.php';	

					$id = $_GET['n'];

					$pics = getImgData();
					$i = count($pics) - 1;
					while ($i > -1) {
						if ($pics[$i]['ID'] == $id) 
							break;
			
						$i--;
					}

					echo "<img src=\"{$pics[$i]['ImgSource']}\" alt=\"{$pics[$i]['Alt']}\" id=\"{$pics[$i]['ID']}\" onclick=\"f({$pics[$i]['ID']})\"/>";
				}

				
				*/
				?>

			</div>
		</div>
			

		<script type="text/javascript">
		$("#focus_big").hide();
		$("#focus_small").hide();

		$(document).ready(function() {
			$(".gal_images").click(function(event) {

	        	var fimg = document.createElement('img');
	        	fimg.src = 'Gallery/Pictures/photography_gallery/' + event.target.alt + '.jpg';
	        	fimg.setAttribute('alt', event.target.alt);
	        	fimg.setAttribute('id', 'fimg');

	        	document.getElementById('focus_small').appendChild(fimg);

	        	$("#focus_big").fadeToggle();
	        	$("#focus_small").fadeToggle(1000);

	   		});

			$("#focus_big").click(function(event) {
				$("#focus_small").fadeToggle();
	        	$("#focus_big").fadeToggle();

	        	var fimg = document.getElementById('fimg')
	        	document.getElementById('focus_small').removeChild(fimg);
	   		});
	   	});

		</script>

	</body>
</html>