<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$firstName = $_POST['firstName'];

$lastName = $_POST['lastName'];

$Email = $_POST['Email'];

$uid = $_POST['uid'];

$pwd = $_POST['pwd'];



// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.



if (empty($firstName)) {

	header("Location: ../signup.php?error=empty");

	exit();

}



if (empty($lastName)) {

	header("Location: ../signup.php?error=empty");

	exit();

}



if (empty($Email)) {

	header("Location: ../signup.php?error=empty");

	exit();

}



if (empty($uid)) {

	header("Location: ../signup.php?error=empty");

	exit();

}



if (empty($pwd)) {

	header("Location: ../signup.php?error=empty");

	exit();

}



/*

Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.

Desuden bliver der tjekket for om username eksisterer i forvejen. Herefter bliver password encrypted, før det bliver sendt til databasen.

*/



else {

	$sql = "SELECT id_Admins FROM admins WHERE id_Admins='$uid'";

	$result = mysqli_query($conn, $sql);

	$uidcheck = mysqli_num_rows($result);

	if ($uidcheck > 0) {

		header("Location: ../signup.php?error=username");

		exit();

	} else {

		$enc_pwd = password_hash($pwd, PASSWORD_DEFAULT);

		$sql = "INSERT INTO slackdk_booking.admins (Admin_Fornavn, Admin_Efternavn, Admin_Email, Admin_Brugernavn, Admin_Password) 

		VALUES ('$firstName', '$lastName', '$Email', '$uid', '$enc_pwd')";

		$result = mysqli_query($conn, $sql);



	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.



	header("Location: ../index.php");

	}

}



