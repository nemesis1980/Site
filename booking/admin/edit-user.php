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

//		echo $_POST['uid'];

		echo "<form class ='register' action='includes/edit-user.inc.php' method='POST'>

			<input type='hidden' name='uid' value='".$_POST['uid']."'>

			Fornavn: <input type='text' name='UFornavn' value=".$_POST['UFornavn']."><br>

			Efternavn: <input type='text' name='UEfternavn' value=".$_POST['UEfternavn']."><br>

			Firma: <input type='text' name='UFirma' value=".$_POST['UFirma']."><br>

			Adresse: <input type='text' name='UAdresse' value=".$_POST['UAdresse']."><br>

			Postnummer: <input type='number' name='UPostnr' value=".$_POST['UPostnr']."><br>

			Email: <input type='text' name='UEmail' value=".$_POST['UEmail']."><br>

			Telefon: <input type='number' name='UTlf' value=".$_POST['UTlf']."><br>

			<button type='submit'>Gem Kunde</button>

		</form>";

	}

?>

</body>

</html>