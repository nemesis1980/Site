<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



	include 'dbcon.php';



//Her bliver header.php, som er vores menu, inkluderet på siden



	include 'header.php';

?>



<div class="delete-box">

	<?php





	// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.

		if (isset($_SESSION['id'])) {



			// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.



			$conn = mysqli_connect($servername, $username, $password, $table);



			$uid_1 = $_POST['uid_1'];



			$sql = "SELECT * FROM kunder WHERE idKunder='$uid_1'";

			$result = mysqli_query($conn, $sql);



			while ($row = $result->fetch_assoc()) {

				echo "<div class='project-box'><p>Kunde id:" . " " . $row['idKunder'] . "</p>

					<p>Kundens Fornavn:" . " " . $row['Kunde_Fornavn'] . "</p>

					<p>Kundens Efternavn:" . " " . $row['Kunde_Efternavn'] . "</p>

					<p>Kundens Firma:" . " " . $row['Kunde_Firma'] . "</p>

					<p>Kundens Adresse:" . " " . $row['Kunde_Adresse'] . "</p>

					<p>Kundens Postnummer:" . " " . $row['postnummer_postnummer'] . "</p>

					<p>Kundens Email:" . " " . $row['Kunde_Email'] . "</p>

					<p>Kundens Telefonnummer:" . " " . $row['Kunde_Telefon'] . "</p>

					<p>Kundens Brugernavn:" . " " . $row['Kunde_Brugernavn'] . "</p>

					<br><br>

					<p>Er du sikker på at du vil slette denne kunde?</p>

					<form class ='register' action='includes/delete-user.inc.php' method='POST'>

					<input type='hidden' name='uid_1' value='".$_POST['uid_1']."'>

					<button>Ja, Slet ordren</button>

					</form>

					</div>

					<br><br>";

				}

		} 

		else {

			echo "Du skal være logget ind for at kunne oprette eller ændre i projekter.";

		}



	?>



</div>





</body>

</html>