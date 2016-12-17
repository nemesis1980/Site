<?php


// Include bliver brugt til at loade database connection filen.



	include 'dbcon.php';

	
	include 'header.php';

	//Her bliver header.php, som er vores menu, inkluderet på siden

?>



<?php



// Her bliver der tjekket, om der er en fejl på siden, og efterfølgende fortalt brugeren at de enten skal udfylde alle felter eller at brugernavnet allerede eksisterer.



	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	if(strpos($url, 'error=empty') !==false) {

		echo "Udfyld alle felter <br><br><br>";

	}

	elseif(strpos($url, 'error=projectname') !==false) {

		echo "Projekt navn eksisterer allerede <br><br>";

	}



// Her tjekkes der om man er logget ind i systemet



	if (isset($_SESSION['id'])) {

	} else {

		echo "Du er ikke logget ind";

	}

?>



<br><br><br>



<?php



// Her tjekkes først om man er logget ind og ellers kommer projekt oprettelses formen frem, så man kan oprette et projekt.

	if (isset($_SESSION['id'])) {

		$conn = mysqli_connect($servername, $username, $password, $table);

		$sql = "SELECT Billede_Billede, Billede_Navn, idBilleder FROM billeder";

		$result = mysqli_query($conn, $sql);

			while ($row = $result->fetch_assoc()) {
				
				echo "<div class='gallery-box'>
					
					<img src='img/" . $row['Billede_Billede'] . "'>

					<p>Billede id:" . " " . $row['idBilleder'] . " "." Billed Navn:" . " " . $row['Billede_Navn'] . "</p>

					<br><br>

					</div>

					";
			}



		echo "<form class ='register' action='includes/create-order.inc.php' method='POST'>

			Kunde Nummer:<input type='number' name='OKunde' placeholder='Kunde Nummer'><br>

			Billede 1:<input type='number' name='OPic1' placeholder='Billede 1'><br>

			Billede 2:<input type='number' name='OPic2' placeholder='Billede 2' value='0'><br>

			Billede 3:<input type='number' name='OPic3' placeholder='Billede 3' value='0'><br>

			Billede 4:<input type='number' name='OPic4' placeholder='Billede 4' value='0'><br>

			Billede 5:<input type='number' name='OPic5' placeholder='Billede 5' value='0'><br>

			Ordre Startdato:<input type='date' name='OStart' placeholder='Ordre Startdato YYYY-MM-DD'><br>

			Ordre Slutdato:<input type='date' name='OSlut' placeholder='Ordre Slutdato YYYY-MM-DD'><br>

			Samlet Pris:<input type='number' name='OSamlet' placeholder='Samlet Pris'><br>

			Ordre Status:<select name='OStatus'>
								<option value='Ikke-Betalt' checked>Ikke-Betalt</option>
								<option value='Betalt'>Betalt</option>
							</select>
							<br>

			<button type='submit'>Opret Ordre</button>

		</form>";

	}

?>

</body>

</html>



