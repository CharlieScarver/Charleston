
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
				//require_once 'back-up.php';
				require_once 'gallery_print.php';
			?>

		</div>

		<div id="null_field">
			<div id="null_l-eye"></div>
			<div id="null_r-eye"></div>
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

	</body>
</html>