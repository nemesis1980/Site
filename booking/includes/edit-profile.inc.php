<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$uid = (isset($_POST['uid']) ? $_POST['uid'] : null);

$KFornavn = (isset($_POST['KFornavn']) ? $_POST['KFornavn'] : null);

$KEfternavn = (isset($_POST['KEfternavn']) ? $_POST['KEfternavn'] : null);

$KFirma = (isset($_POST['KFirma']) ? $_POST['KFirma'] : null);

$KAdresse = (isset($_POST['KAdresse']) ? $_POST['KAdresse'] : null);

$KPostnr = (isset($_POST['KPostnr']) ? $_POST['KPostnr'] : null);

$KEmail = (isset($_POST['KEmail']) ? $_POST['KEmail'] : null);

$KTlf = (isset($_POST['KTlf']) ? $_POST['KTlf'] : null);



// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.



if (empty($KFornavn)) {

	header("Location: ../edit-profile.php?error=empty");

	exit();

}



if (empty($KEfternavn)) {

	header("Location: ../edit-profile.php?error=empty");

	exit();

}



if (empty($KAdresse)) {

	header("Location: ../edit-profile.php?error=empty");

	exit();

}



if (empty($KPostnr)) {

	header("Location: ../edit-profile.php?error=empty");

	exit();

}



if (empty($KEmail)) {

	header("Location: ../edit-profile.php?error=empty");

	exit();

}



if (empty($KTlf)) {

	header("Location: ../edit-profile.php?error=empty");

	exit();

}



/*

Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.

Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.

*/



	$conn = mysqli_connect($servername, $username, $password, $table);



	$sql = "SELECT idKunder FROM kunder WHERE idKunder='$uid'";

	$result = mysqli_query($conn, $sql);


		$sql = "UPDATE kunder SET Kunde_Fornavn='$KFornavn', Kunde_Efternavn='$KEfternavn', Kunde_Firma='$KFirma', Kunde_Adresse='$KAdresse', postnummer_postnummer='$KPostnr', Kunde_Email='$KEmail', Kunde_Telefon='$KTlf' WHERE idKunder='$uid'";

		$conn->query($sql);



/*		if (mysqli_query($conn, $sql)) {

    		echo "Record updated successfully";

		} else {

    		echo "Error updating record: " . mysqli_error($conn);

		}

*/	



	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.



	header("Location: ../profile.php");



?>

