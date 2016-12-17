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

		<p class="indhold_text">Her kan du se dine informationer:</p>

		<br>

			<div class="profil-form">

<?php

// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.

	if (isset($_SESSION['id'])) {



		// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.



		$conn = mysqli_connect($servername, $username, $password, $table);



		$uid = $_SESSION['id'];



		$sql = "SELECT * FROM admins WHERE id_Admins='$uid'";

		$result = mysqli_query($conn, $sql);



		// Indsætter den hentede række i en array fra det id der er hentet fra databasen. 

		$row = mysqli_fetch_assoc($result);





		echo "<div class='project-box'>

			<p>id:" . " " . $row['id_Admins'] . "</p>

			<p>Fornavn:" . " " . $row['Admin_Fornavn'] . "</p>

			<p>Efternavn:" . " " . $row['Admin_Efternavn'] . "</p>

			<p>Email Adresse:" . " " . $row['Admin_Email'] . "</p>


			<form class='edit-form' method='POST' action='edit-profile.php'>

				<input type='hidden' name='pid' value='".$row['id_Admins']."'>

				<input type='hidden' name='PFornavn' value='".$row['Admin_Fornavn']."'>

				<input type='hidden' name='PEfternavn' value='".$row['Admin_Efternavn']."'>

				<input type='hidden' name='PEmail' value='".$row['Admin_Email']."'>

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

