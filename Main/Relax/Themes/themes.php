			


		<div id="main_block" >

			<p id="block_title">
				Themes Available:
			</p>

			<?php

			if (isset($_POST['theme'])) {

				$_SESSION['theme'] = $_POST['theme'];
				echo "Theme changed to {$_POST['theme']}<br>";
				header("Location: http://charleston.zapto.org/Relax");
				exit;
			}

			?>


			<form method="POST" id="block_content">
				<input type="submit" name="theme" id="blue_theme_submit" value="Blue" class="submits">
				<input type="submit" name="theme" id="red_theme_submit" value="Red" class="submits">
			</form>

			<p id="block_footer">
				Created on 14.02.2014, 03:45<br>
					by CharlieScarver
			</p>

		</div>

	</body>

</html>