<?php


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



			$aid_1 = $_POST['aid_1'];



			$sql = "SELECT * FROM admins WHERE id_Admins='$aid_1'";

			$result = mysqli_query($conn, $sql);



			while ($row = $result->fetch_assoc()) {

				echo "<div class='project-box'><p>Ordre id:" . " " . $row['id_Admins'] . "</p>

					<p>Admins Fornavn:" . " " . $row['Admin_Fornavn'] . "</p>

					<p>Admins Efternavn:" . " " . $row['Admin_Efternavn'] . "</p>

					<p>Admins Brugernavn:" . " " . $row['Admin_Brugernavn'] . "</p>

					<p>Admins Email:" . " " . $row['Admin_Email'] . "</p>

					<br><br>

					<p>Er du sikker på at du vil slette denne ordre?</p>

					<form class ='register' action='includes/delete-admin.inc.php' method='POST'>

					<input type='hidden' name='aid_1' value='".$_POST['aid_1']."'>

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