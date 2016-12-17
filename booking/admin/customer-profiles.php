<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



	include 'dbcon.php';



//Her bliver header.php, som er vores menu, inkluderet på siden



	include 'header.php';

?>



		<H1 class="indhold_overskrift">Profilside</H1>

		<p class="indhold_text">Her kan du se dine kunders informationer:</p>

		<br>

			<div class="profil-form">

<?php







// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$FirstName = $_POST['firstName'];

$LastName = $_POST['lastName'];

$Company = $_POST['Company'];

$Adress = $_POST['Adress'];

$Zipcode = $_POST['Zipcode'];

$Email = $_POST['Email'];

$Phone = $_POST['Phone'];

$uid = $_POST['uid'];



// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.

	if (isset($_SESSION['id'])) {



		// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.



		$conn = mysqli_connect($servername, $username, $password, $table);



		$uid = $_SESSION['id'];



		$sql = "SELECT * FROM kunder";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {

		    // output data of each row
		    
		    while($row = mysqli_fetch_assoc($result)) {
		    
		        echo "
				    <p>id:" . " " . $row['idKunder'] . "</p>

					<p>Fornavn:" . " " . $row['Kunde_Fornavn'] . "</p>

					<p>Efternavn:" . " " . $row['Kunde_Efternavn'] . "</p>

					<p>Firma:" . " " . $row['Kunde_Firma'] . "</p>

					<p>Adresse:" . " " . $row['Kunde_Adresse'] . "</p>

					<p>Postnummer:" . " " . $row['postnummer_postnummer'] . "</p>

					<p>Email Adresse:" . " " . $row['Kunde_Email'] . "</p>

					<p>Telefon:" . " " . $row['Kunde_Telefon'] . "</p>

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

