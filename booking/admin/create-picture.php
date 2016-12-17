<?php

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

		echo "<form class ='register' action='includes/create-picture.inc.php' method='POST' enctype='multipart/form-data'>

			Billede: <input type='file' name='BPic' id='BPic'><br>

			Navn: <input type='text' name='iName' placeholder='Navn'><br>

			Længde: <input type='number' name='iLength' placeholder='Længde' value='0'><br>

			Højde: <input type='number' name='iHeight' placeholder='Højde' value='0'><br>

			Pris: <input type='number' name='iPrice' placeholder='Pris' value='1'><br>

			<button type='submit'>Opret Billede</button>

		</form>";

	}

?>

</body>

</html>



