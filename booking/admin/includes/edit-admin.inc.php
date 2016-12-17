<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$aid = (isset($_POST['aid']) ? $_POST['aid'] : null);

$AFornavn = (isset($_POST['AFornavn']) ? $_POST['AFornavn'] : null);

$AEfternavn = (isset($_POST['AEfternavn']) ? $_POST['AEfternavn'] : null);

$AEmail = (isset($_POST['AEmail']) ? $_POST['AEmail'] : null);



// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.



if (empty($AFornavn)) {

	header("Location: ../edit-admin.php?error=empty");

	exit();

}



if (empty($AEfternavn)) {

	header("Location: ../edit-admin.php?error=empty");

	exit();

}



if (empty($AEmail)) {

	header("Location: ../edit-admin.php?error=empty");

	exit();

}


/*

Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.

Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.

*/



	$conn = mysqli_connect($servername, $username, $password, $table);



	$sql = "SELECT id_Admins FROM admins WHERE id_Admins='$aid'";

	$result = mysqli_query($conn, $sql);


		$sql = "UPDATE admins SET Admin_Fornavn='$AFornavn', Admin_Efternavn='$AEfternavn', Admin_Email='$AEmail', WHERE id_Admins='$aid'";

		$conn->query($sql);



/*		if (mysqli_query($conn, $sql)) {

    		echo "Record updated successfully";

		} else {

    		echo "Error updating record: " . mysqli_error($conn);

		}

*/	



	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.



	header("Location: ../admin-profiles.php");



?>

