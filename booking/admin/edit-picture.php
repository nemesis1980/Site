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

	

/*

	elseif(strpos($url, 'error=projectname') !==false) {

		echo "Projekt navn eksisterer allerede <br><br>";

	}

*/

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

		echo $_POST['Bid'];

		$Bid = (isset($_POST['Bid']) ? $_POST['Bid'] : null);

		$conn = mysqli_connect($servername, $username, $password, $table);



		$sql = "SELECT * FROM billeder WHERE idBilleder='$Bid'";

		$result = mysqli_query($conn, $sql);

		while ($row = $result->fetch_assoc()) {

			echo "<img src='img/" . $row['Billede_Billede'] . "'>";

		}

		echo "<form class ='register' action='includes/edit-picture.inc.php' method='POST'>

			<input type='hidden' name='Bid' value='".$_POST['Bid']."'>

			Billede: <input type='file' name='BPic' value=".$_POST['BPic']."><br>

			Navn: <input type='text' name='iName' value=".$_POST['iName']."><br>

			Længde: <input type='number' name='iLength' value=".$_POST['iLength']."><br>

			Højde: <input type='number' name='iHeight' value=".$_POST['iHeight']."><br>

			Pris: <input type='number' name='iPrice' value=".$_POST['iPrice']."><br>
			<br><br>

			<button type='submit'>Gem Billede</button>

		</form>";

	}

?>

</body>

</html>