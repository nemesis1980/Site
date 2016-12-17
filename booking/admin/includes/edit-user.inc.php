<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$uid = (isset($_POST['uid']) ? $_POST['uid'] : null);

$UFornavn = (isset($_POST['UFornavn']) ? $_POST['UFornavn'] : null);

$UEfternavn = (isset($_POST['UEfternavn']) ? $_POST['UEfternavn'] : null);

$UFirma = (isset($_POST['UFirma']) ? $_POST['UFirma'] : null);

$UAdresse = (isset($_POST['UAdresse']) ? $_POST['UAdresse'] : null);

$UPostnr = (isset($_POST['UPostnr']) ? $_POST['UPostnr'] : null);

$UEmail = (isset($_POST['UEmail']) ? $_POST['UEmail'] : null);

$UTlf = (isset($_POST['UTlf']) ? $_POST['UTlf'] : null);


// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.



if (empty($UFornavn)) {

	header("Location: ../edit-user.php?error=empty");

	exit();

}



if (empty($UEfternavn)) {

	header("Location: ../edit-user.php?error=empty");

	exit();

}



if (empty($UAdresse)) {

	header("Location: ../edit-user.php?error=empty");

	exit();

}



if (empty($UPostnr)) {

	header("Location: ../edit-user.php?error=empty");

	exit();

}



if (empty($UEmail)) {

	header("Location: ../edit-user.php?error=empty");

	exit();

}



if (empty($UTlf)) {

	header("Location: ../edit-user.php?error=empty");

	exit();

}


/*

Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.

Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.

*/



	$conn = mysqli_connect($servername, $username, $password, $table);



	$sql = "SELECT idKunder FROM kunder WHERE idKunder='$uid'";

	$result = mysqli_query($conn, $sql);


		$sql = "UPDATE kunder SET Kunde_Fornavn='$UFornavn', Kunde_Efternavn='$UEfternavn', Kunde_Firma='$UFirma', Kunde_Adresse='$UAdresse', postnummer_postnummer='$UPostnr', Kunde_Email='$UEmail', Kunde_Telefon='$UTlf' WHERE idKunder='$uid'";

		$conn->query($sql);



/*		if (mysqli_query($conn, $sql)) {

    		echo "Record updated successfully";

		} else {

    		echo "Error updating record: " . mysqli_error($conn);

		}

*/	



	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.



	header("Location: ../user-profiles.php");



?>

