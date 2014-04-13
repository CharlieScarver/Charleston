
		<br>

		<div id="main_block" >
			<p id="block_title">
				Log In
			</p>

			<?php 
				require 'login_code.php';
			?>

			<form method="POST" id="block_content">
				<label for="Username">Username:</label>
				<input id="Username" name="Username" maxlength="20" type="text" class="non_submit_input" required="required"><br>
				<label for="Password">Password:</label>
				<input id="Password" name="Password" maxlength="15" type="password" class="non_submit_input" required="required"><br>
				<br>
				<input type="submit" name="Login" id="submit_login" value="Log in">
			</form>

			<p id="block_footer">
				Created on 23.12.2013, 18:43<br>
					by CharlieScarver
			</p>
		</div>

	</body>

</html>
