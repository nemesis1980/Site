<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$pid = (isset($_POST['pid']) ? $_POST['pid'] : null);

$PFornavn = (isset($_POST['PFornavn']) ? $_POST['PFornavn'] : null);

$PEfternavn = (isset($_POST['PEfternavn']) ? $_POST['PEfternavn'] : null);

$PEmail = (isset($_POST['PEmail']) ? $_POST['PEmail'] : null);



// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.



if (empty($PFornavn)) {

	header("Location: ../edit-profile.php?error=empty");

	exit();

}



if (empty($PEfternavn)) {

	header("Location: ../edit-profile.php?error=empty");

	exit();

}



if (empty($PEmail)) {

	header("Location: ../edit-profile.php?error=empty");

	exit();

}



/*

Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.

Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.

*/



	$conn = mysqli_connect($servername, $username, $password, $table);



	$sql = "SELECT id_Admins FROM admins WHERE id_Admins='$pid'";

	$result = mysqli_query($conn, $sql);


		$sql = "UPDATE admins SET Admin_Fornavn='$PFornavn', Admin_Efternavn='$PEfternavn', Admin_Email='$PEmail' WHERE id_Admins='$pid'";

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

