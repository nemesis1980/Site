<?php

// Include bliver brugt til at loade database connection filen.



	include 'dbcon.php';



//Her bliver header.php, som er vores menu, inkluderet på siden



	include 'header.php';

?>

<?php

	include 'profile-header.php'

?>

		<H1 class="indhold_overskrift">Profiler</H1>

		<p class="indhold_text">Her kan du se de forskellige profiler:</p>

		<br>

<?php





// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.

	if (isset($_SESSION['id'])) {



		// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.



		$conn = mysqli_connect($servername, $username, $password, $table);



		$uid = $_SESSION['id'];

	}

	else {

		echo "Du skal være logget ind for at kunne oprette eller ændre i projekter.";

	}

?>

</body>

</html>