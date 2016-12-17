<?php

// Include bliver brugt til at loade database connection filen.



	include 'dbcon.php';



//Her bliver header.php, som er vores menu, inkluderet på siden



	include 'header.php';

?>



		<H1 class="indhold_overskrift">Profilside</H1>

		<p class="indhold_text">Her kan du se dine informationer:</p>

		<br>

			<div class="profil-form">

<?php

// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.

	if (isset($_SESSION['id'])) {



		// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.



		$conn = mysqli_connect($servername, $username, $password, $table);



		$uid = $_SESSION['id'];



		$sql = "SELECT * FROM kunder WHERE idKunder='$uid'";

		$result = mysqli_query($conn, $sql);





		// Indsætter den hentede række i en array fra det id der er hentet fra databasen. 

		$row = mysqli_fetch_assoc($result);





		echo "<div class='project-box'>

			<p>id:" . " " . $row['idKunder'] . "</p>

			<p>Fornavn:" . " " . $row['Kunde_Fornavn'] . "</p>

			<p>Efternavn:" . " " . $row['Kunde_Efternavn'] . "</p>

			<p>Firma:" . " " . $row['Kunde_Firma'] . "</p>

			<p>Adresse:" . " " . $row['Kunde_Adresse'] . "</p>

			<p>Postnummer:" . " " . $row['postnummer_postnummer'] . "</p>

			<p>Email Adresse:" . " " . $row['Kunde_Email'] . "</p>

			<p>Telefon:" . " " . $row['Kunde_Telefon'] . "</p>


			<form class='edit-form' method='POST' action='edit-profile.php'>

				<input type='hidden' name='uid' value='".$row['idKunder']."'>

				<input type='hidden' name='KFornavn' value='".$row['Kunde_Fornavn']."'>

				<input type='hidden' name='KEfternavn' value='".$row['Kunde_Efternavn']."'>

				<input type='hidden' name='KFirma' value='".$row['Kunde_Firma']."'>

				<input type='hidden' name='KAdresse' value='".$row['Kunde_Adresse']."'>

				<input type='hidden' name='KPostnr' value='".$row['postnummer_postnummer']."'>

				<input type='hidden' name='KEmail' value='".$row['Kunde_Email']."'>

				<input type='hidden' name='KTlf' value='".$row['Kunde_Telefon']."'>

				<button>Rediger</button>

			</form>

			</div>





			<br><br>







		";	





	} else {

		echo "Du skal være logget ind for at se dine profil oplysninger";

	}



?>



			</div>





</body>

</html>

