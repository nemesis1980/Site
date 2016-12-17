<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.


$OStart = $_POST['OStart'];

$OSlut = $_POST['OSlut'];

$OPris = $_POST['OPris'];

$OPic1 = $_POST['OPic1'];

$OPic2 = $_POST['OPic2'];

$OPic3 = $_POST['OPic3'];

$OPic4 = $_POST['OPic4'];

$OPic5 = $_POST['OPic5'];

$CID = $_SESSION['id'];



// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.



if (empty($OStart)) {

	header("Location: ../create-project.php?error=empty");

	exit();

}



if (empty($OSlut)) {

	header("Location: ../create-project.php?error=empty");

	exit();

}



if (empty($OPris)) {

	header("Location: ../create-project.php?error=empty");

	exit();

}



if (empty($OPic1)) {

	header("Location: ../create-project.php?error=empty");

	exit();

}



/*

Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.

Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.

*/

else {

	$conn = mysqli_connect($servername, $username, $password, $table);


	$sql = "INSERT INTO ordrer (Ordrer_Startdato, Ordrer_Slutdato, Ordrer_SamletPris, Ordrer_Billede1, Ordrer_Billede2, Ordrer_Billede3, Ordrer_Billede4, Ordrer_Billede5, kunder_idKunder, admins_id_Admins)

			VALUES ('$OStart', '$OSlut', '$OPris', '$OPic1', '$OPic2', '$OPic3', '$OPic4', '$OPic5', '$CID', '3');";

	$result = mysqli_query($conn, $sql);

}



	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.



	header("Location: ../notpaid-orders.php");



?>

