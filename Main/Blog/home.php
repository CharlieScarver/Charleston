		<div id="new_post_div">	
			<form id="new_post_form" method="POST">

				<label for="Author"> Author: </label><br>
				<input type="text" name="Author" id="Author" maxlength="50" required placeholder="Author">
				<br>
				<br>
				<label for="Content"> Content: </label><br>
				<textarea name="Content" id="Content" rows="7" cols="25" maxlength="1024" required placeholder="Post"></textarea>
				<br>
				<br>
				<?php
					$GLOBALS['admins'] = array("192.168.1.1","46.238.53.111");
					$ip = $_SERVER['REMOTE_ADDR'];

					if (in_array($ip, $GLOBALS['admins'])) {
						$GLOBALS['newpost'] = array("Cook", "Bake", "Create", "Assemble", "Produce", "Organize", "Set Up", "Forge", "Form", "Design", "Construct", "Establish", "Fabricate", "Author", "Invent");
				
						$word = array_rand($GLOBALS['newpost']);
						echo "<input type=\"submit\" id=\"new_post_submit\" name=\"NewPost\" value=\"{$GLOBALS['newpost'][$word]} a New Post!\">";
					}
				?>

			</form>
		</div>

		<?php
			$GLOBALS['admins'] = array("192.168.1.1","46.238.53.111");
			$ip = $_SERVER['REMOTE_ADDR'];

			if (in_array($ip, $GLOBALS['admins'])) {
				$word = array_rand($GLOBALS['newpost']);
				echo "<button id=\"new_post_button\"> {$GLOBALS['newpost'][$word]} a New Post! </button>";
			}

		?>

		<div id="main_div">

			<?php
				require_once 'load_posts.php';
				require_once 'new_post.php';
			?>

		</div>

		<div></div>
		
		<script type="text/JavaScript" src="blog_script.js"></script>
	</body>
</html>

