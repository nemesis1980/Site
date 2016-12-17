<?php


// Include bliver brugt til at loade database connection filen.

	include 'dbcon.php';



//Her bliver header.php, som er vores menu, inkluderet på siden

	include 'header.php';

?>



		<H1 class="indhold_overskrift">Billeder</H1>

		<p class="indhold_text">Her kan du se dine forskellige billeder:</p>

		<br>

			<div class="projekt-form">

<?php

// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.

	if (isset($_SESSION['id'])) {



		// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.



		$conn = mysqli_connect($servername, $username, $password, $table);



		$sql = "SELECT * FROM billeder";

		$result = mysqli_query($conn, $sql);



		echo "<a href='create-picture.php' class='create-button'>Opret nyt billede</a><br><br>";

			while ($row = $result->fetch_assoc()) {

				echo "<div class='project-box'>

					<img src='img/" . $row['Billede_Billede'] . "'>

					<p>Billede id:" . " " . $row['idBilleder'] . "</p>

					<p>Billed Navn:" . " " . $row['Billede_Navn'] . "</p>

					<p>Billde Længde:" . " " . $row['Billede_Længde'] . "</p>

					<p>Billede Højde:" . " " . $row['Billede_Højde'] . "</p>

					<p>Billede Pris:" . " " . $row['Billede_Pris'] . "</p>

					
					
					<form class='edit-form' method='POST' action='edit-picture.php'>

						<input type='hidden' name='Bid' value='".$row['idBilleder']."'>

						<input type='hidden' name='BPic' value='".$row['Billede_Billede']."'>

						<input type='hidden' name='iName' value='".$row['Billede_Navn']."'>

						<input type='hidden' name='iLength' value='".$row['Billede_Længde']."'>

						<input type='hidden' name='iHeight' value='".$row['Billede_Højde']."'>

						<input type='hidden' name='iPrice' value='".$row['Billede_Pris']."'>

						<button>Rediger</button>

					</form>

					
					<form class='delete-form' method='POST' action='delete-picture.php'>

						<input type='hidden' name='Bid_1' value='".$row['idBilleder']."'>

						<input type='hidden' name='BPic_1' value='".$row['Billede_Billede']."'>

						<button>Slet</button>

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

