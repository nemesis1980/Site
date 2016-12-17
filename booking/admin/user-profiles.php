<?php

// Include bliver brugt til at loade database connection filen.

	include 'dbcon.php';



//Her bliver header.php, som er vores menu, inkluderet på siden

	include 'header.php';

?>

<?php

	include 'profile-header.php'

?>



		<H1 class="indhold_overskrift">Profilside</H1>

		<p class="indhold_text">Her kan du se dine kunders informationer:</p>

		<br>

			<div class="projekt-form">

<?php

// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.

	if (isset($_SESSION['id'])) {



		// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.



		$conn = mysqli_connect($servername, $username, $password, $table);



		$uid = $_SESSION['id'];



		$sql = "SELECT * FROM kunder";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {

		    // output data of each row

		    echo "<a href='create-user.php' class='create-button'>Opret ny kunde</a><br><br>";

			while($row = mysqli_fetch_assoc($result)) {
		    
		        echo "<div class='project-box'>

					<p>id:" . " " . $row['idKunder'] . "</p>

					<p>Fornavn:" . " " . $row['Kunde_Fornavn'] . "</p>

					<p>Efternavn:" . " " . $row['Kunde_Efternavn'] . "</p>

					<p>Firma:" . " " . $row['Kunde_Firma'] . "</p>

					<p>Adresse:" . " " . $row['Kunde_Adresse'] . "</p>

					<p>Postnummer:" . " " . $row['postnummer_postnummer'] . "</p>

					<p>Email Adresse:" . " " . $row['Kunde_Email'] . "</p>

					<p>Telefon:" . " " . $row['Kunde_Telefon'] . "</p>


					<form class='edit-form' method='POST' action='edit-user.php'>

						<input type='hidden' name='uid' value='".$row['idKunder']."'>

						<input type='hidden' name='UFornavn' value='".$row['Kunde_Fornavn']."'>

						<input type='hidden' name='UEfternavn' value='".$row['Kunde_Efternavn']."'>

						<input type='hidden' name='UFirma' value='".$row['Kunde_Firma']."'>

						<input type='hidden' name='UAdresse' value='".$row['Kunde_Adresse']."'>

						<input type='hidden' name='UPostnr' value='".$row['postnummer_postnummer']."'>

						<input type='hidden' name='UEmail' value='".$row['Kunde_Email']."'>

						<input type='hidden' name='UTlf' value='".$row['Kunde_Telefon']."'>

						<button>Rediger</button>

					</form>

					<form class='delete-form' method='POST' action='delete-user.php'>

						<input type='hidden' name='uid_1' value='".$row['idKunder']."'>

						<button>Slet</button>

					</form>

					</div>

					<br><br>
					
					";					
			}
		
		} else {
		
		    echo "0 results";
		
		}

	} else {

		echo "Du skal være logget ind for at se dine profil oplysninger";

	}





?>



			</div>





</body>

</html>

