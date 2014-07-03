		<?php

		$page = 'http://charleston.onthewifi.com';

		// or you could use $page = $_SERVER['PHP_SELF'] ;

		include ( 'Hits/Example_Hitcounter_v1.0/counter.php');
		addinfo($page);


		?>

		<div class="content">

			<p class="content_para">
				<b>Welcome</b> <br>
				<br>
				Hello and welcome to Charleston! <br>
				Here you will find some of the pictures We, two non-professional photographers, take. <br>
				We love photography and would like to share our passion with you. <br>
				Enjoy your visit. <br>
				<br>
					- Us
			</p>

			<img src="Other/charleston_logo_big.png" alt="charleston_logo" id="img_logo">

			
			<div id="sections_div">
				<b>You can also check our:</b><br>
				<br>
				<a href="http://charleston.onthewifi.com/Blog">
					<button id="blog_section_button" class="section_button">Blog</button>
				</a>

				<a href="http://charleston.onthewifi.com/Relax">
					<button id="relax_section_button" class="section_button">Relax section</button>
				</a>
			</div>
			

			<div id="gives_containter">
				<?php

				// --------------------Already Gave?-----------------------------------

				if (!isset($_SESSION["{$GLOBALS['client_ip']}"])) {

					echo "<div id=\"gives_div\">
							<form method=\"POST\" id=\"gives_form\">
								<label for=\"gives_img\" id=\"gives_para\">Give us<br> a Heart</label>
								<input type=\"hidden\" name=\"action\" value=\"Submit Form\">
								<input type=\"image\" src=\"Other/heart.png\" name=\"Give\" id=\"gives_img\" alt=\"heart\">				
							</form>
						</div>";

				} else {

					echo "<div id=\"gives_div\">
							<pre id=\"gives_para\">Thanks for<br>your support!</pre>
							<img src=\"Other/heart.png\" id=\"gives_img\" alt=\"heart\">				
						</div>";

				}

				// ----------------------Give Form--------------------------------

				if (isset($_POST['action'])) {
					$_SESSION["{$GLOBALS['client_ip']}"] = 37;

					if (!mysql_connect("localhost","root","rootpass")) //Check if connection was successful
						echo "Failed to connect!";

					if (!mysql_select_db("charleston")) //Check if DB selection was successful
						echo "Failed to select DB!";

					$results = mysql_query("UPDATE gives SET `Count` = `Count` + '1'");
						if (!$results)  // Succession check
							echo "Failed to update! :c<br>";

					header("Location: http://charleston.onthewifi.com/?page=Thanks");
					exit;
				}

				// ------------Gives Count-------------------

				if (!mysql_connect("localhost","root","rootpass")) //Check if connection was successful
					echo "Failed to connect!";

				if (!mysql_select_db("charleston")) //Check if DB selection was successful
					echo "Failed to select DB!";

				$results = mysql_query("SELECT Count FROM gives");
					if (!$results)  // Succession check
						echo "Failed to update! :c<br>";

				$row = mysql_fetch_array($results);
				$gives_count = $row['Count'];

				echo "
				<div id=\"gives_count_div\">
					<pre id=\"gives_count_para\">{$gives_count}</pre>
					<img src=\"Other/heart.png\" alt=\"heart\" id=\"gives_count_img\">
				</div>";

				?>
			</div>

		</div>

		<div class="content">

			<p class="content_para"> 
			If the universe of discourse permits the possibility of time travel 
			and of changing the past, then no time machine will be invented in that universe. <br>
			- Niven's Law
			</p>

		</div>

		<!-- <img src="myimg.php"> -->
		
	</body>
</html>

