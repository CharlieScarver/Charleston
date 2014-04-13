
		<br>

		<div id="main_block" >
			<p id="block_title">
				Add New Question
			</p>

			<?php
			
			require 'add_question_code.php';

			echo "
			<form method=\"POST\" id=\"block_content\">
				<br>
				<label for=\"Author\">*Author:</label>
				<input id=\"Author\" name=\"Author\" maxlength=\"30\" type=\"text\" class=\"non_submit_input\"><br>
				<label for=\"Question\">*Question:</label>
				<input id=\"Question\" name=\"Question\" maxlength=\"50\" type=\"textfield\" class=\"non_submit_input\"><br>
				<label for=\"Answer\">*Answer:</label>
				<input id=\"Answer\" name=\"Answer\" maxlength=\"30\" type=\"text\" class=\"non_submit_input\"><br>
				<br>
				<input type=\"submit\" name=\"AddQuestion\" id=\"submit_registration\" value=\"Submit Entry\">
			</form>";

			?>

			<p id="block_footer">
				Created on 15.01.2013, 17:13<br>
					by CharlieScarver
			</p>
		</div>

	</body>

</html>
