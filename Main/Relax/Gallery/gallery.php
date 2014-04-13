
		<br>

		<div id="gallery_main_block" >
		<!--onclick="if (document.getElementById('clicked') != null) {clickSelector('body_click');}"-->
			<p id="gallery_block_title">
				Gallery
			</p>

			<?php
				require 'gallery_code.php';
			?>

			<div id="gallery_block_content">
				<form method="POST" enctype="multipart/form-data">
					<input type="file" name="file" size="50" id="choose_file" class="submits" >
					<input type="submit" name="Import" id="import" value="Import Image" class="submits">
				</form>
				<br>
				<?php
					require 'gallery_print.php';
				?>
				<!--<img src="Fantasy-Night-Sky.jpg" alt="FantasyNightSky"/>-->
			</div>

			<p id="block_footer">
				Created on 24.12.2013, 07:16<br>
					by CharlieScarver
			</p>
		</div>

	</body>

</html>
