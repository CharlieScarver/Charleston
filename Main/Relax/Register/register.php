
		<br>

		<div id="main_block" >
			<p id="block_title">
				Register New User
			</p>

			<?php
			
			require 'reg_code.php';

			echo "
			<form method=\"POST\" id=\"block_content\">
				<label for=\"Username\">*Username:</label>
				<input id=\"Username\" name=\"Username\" maxlength=\"20\" type=\"text\" class=\"non_submit_input\" required=\"required\"><br>
				<label for=\"Password\">*Password:</label>
				<input id=\"Password\" name=\"Password\" maxlength=\"15\" type=\"password\" class=\"non_submit_input\" required=\"required\"><br>
				<label for=\"Email\">*Email:</label>
				<input id=\"Email\" name=\"Email\" maxlength=\"30\" type=\"email\" class=\"non_submit_input\" required=\"required\"><br>
				<br>
				<label for=\"SecQuestion\">Secret Question:</label>
				<input id=\"SecQuestion\" name=\"SecQuestion\" maxlength=\"30\" type=\"text\" class=\"non_submit_input\"><br>
				<label for=\"SecAnswer\">Secret Answer:</label>
				<input id=\"SecAnswer\" name=\"SecAnswer\" maxlength=\"15\" type=\"text\" class=\"non_submit_input\"><br>
				<br>";

				require_once 'recaptchalib.php';
				$publickey = "6Lc-__YSAAAAAAK8fDz0wn2BgHakq16X5sgLXqc4";
				echo recaptcha_get_html($publickey);

			echo"<br>
				<input type=\"submit\" name=\"Register\" id=\"submit_registration\" value=\"Register User\">
			</form>";

			?>

			<p id="block_footer">
				Created on 23.12.2013, 03:50<br>
					by CharlieScarver
			</p>
		</div>

	</body>

</html>
