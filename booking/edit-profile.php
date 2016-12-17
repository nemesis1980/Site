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

		echo "<form class ='register' action='includes/edit-profile.inc.php' method='POST'>

			<input type='hidden' name='uid' value='".$_POST['uid']."'>

			Fornavn: <input type='text' name='KFornavn' value=".$_POST['KFornavn']."><br>

			Efternavn: <input type='text' name='KEfternavn' value=".$_POST['KEfternavn']."><br>

			Firma: <input type='text' name='KFirma' value=".$_POST['KFirma']."><br>

			Adresse: <input type='text' name='KAdresse' value=".$_POST['KAdresse']."><br>

			Postnummer: <input type='number' name='KPostnr' value=".$_POST['KPostnr']."><br>

			Email: <input type='text' name='KEmail' value=".$_POST['KEmail']."><br>

			Telefon: <input type='text' name='KTlf' value=".$_POST['KTlf']."><br>

			<button type='submit'>Gem Profil</button>

		</form>";

	}

?>

</body>

</html>