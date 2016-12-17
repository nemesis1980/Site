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



			$Bid_1 = $_POST['Bid_1'];

			$BPic_1 = $_POST['BPic_1'];



			$sql = "SELECT * FROM billeder WHERE idBilleder='$Bid_1'";

			$result = mysqli_query($conn, $sql);



			while ($row = $result->fetch_assoc()) {

				echo "<div class='project-box'>

					<img src='img/" . $row['Billede_Billede'] . "'>

					<p>Billede id:" . " " . $row['idBilleder'] . "</p>

					<p>Billed Navn:" . " " . $row['Billede_Navn'] . "</p>

					<p>Billde Længde:" . " " . $row['Billede_Længde'] . "</p>

					<p>Billede Højde:" . " " . $row['Billede_Højde'] . "</p>

					<p>Billede Pris:" . " " . $row['Billede_Pris'] . "</p>

					<br><br>

					<p>Er du sikker på at du vil slette denne ordre?</p>

					<form class ='register' action='includes/delete-picture.inc.php' method='POST'>

					<input type='hidden' name='Bid_1' value='".$_POST['Bid_1']."'>

					<input type='hidden' name='BPic_1' value='".$_POST['BPic_1']."'>

					<button>Ja, Slet billedet</button>

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