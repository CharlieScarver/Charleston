
		<br>

		<div id="main_block" >
			<p id="block_title">
				All Questions
			</p>

			<div id="block_content">

				<?php
				
				require 'questions_code.php';

				echo "<form method=\"GET\" id=\"menu_form\">
							<input type=\"submit\" name=\"page\" id=\"add_question\" value=\"Add Question\" class=\"submits\">
					<form>";

				?>

			</div>

			<p id="block_footer">
				Created on 15.01.2013, 17:13<br>
					by CharlieScarver
			</p>
		</div>

	</body>

</html>
