<?php

//Her bliver header.php, som er vores menu, inkluderet på siden

	include 'header.php';
?>

<H1 class="indhold_overskrift">Velkommen til siden</H1>


	<ul class="index-login">

		<?php

		

// Her tjekker vi efter om der er en eksisterende session, altså om brugeren er logget ind, og hvis dette er sandt, så laves en logout knap.

		if (isset($_SESSION['id'])) {

		header("Location: notpaid-orders.php");

		} 

// Hvis brugeren ikke er logget ind, laves en form, hvor brugeren kan logge ind.

		else {

			echo "<form action='includes/login.inc.php' method='POST'>

				<input type='text' name='uid' placeholder='Brugernavn'>

				<input type='password' name='pwd' placeholder='Password'>

				<button type='submit'>Login</button>

			</form>";

		}

		?>

		<li><a href="signup.php">Registrer</a></li>

	</ul>


</body>
</html>