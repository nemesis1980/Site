<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$Bid = (isset($_POST['Bid']) ? $_POST['Bid'] : null);

$BPic = (isset($_POST['BPic']) ? $_POST['BPic'] : null);

$iName = (isset($_POST['iName']) ? $_POST['iName'] : null);

$iLength = (isset($_POST['iLength']) ? $_POST['iLength'] : null);

$iHeight = (isset($_POST['iHeight']) ? $_POST['iHeight'] : null);

$iPrice = (isset($_POST['iPrice']) ? $_POST['iPrice'] : null);


// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.



if (empty($BPic)) {

	header("Location: ../edit-order.php?error=empty");

	exit();

}



if (empty($iName)) {

	header("Location: ../edit-order.php?error=empty");

	exit();

}



if (empty($iPrice)) {

	header("Location: ../edit-order.php?error=empty");

	exit();

}



/*

Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.

Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.

*/



	$conn = mysqli_connect($servername, $username, $password, $table);



	$sql = "SELECT idBilleder FROM billeder WHERE idBilleder='$Bid'";

	$result = mysqli_query($conn, $sql);


		$sql = "UPDATE billeder SET Billede_Billede='$BPic', Billede_Navn='$iName', Billede_Længde='$iLength', Billede_Højde='$iHeight', Billede_Pris='$iPrice' WHERE idBilleder='$Bid'";

		$conn->query($sql);



/*		if (mysqli_query($conn, $sql)) {

    		echo "Record updated successfully";

		} else {

    		echo "Error updating record: " . mysqli_error($conn);

		}

*/	



	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.



	header("Location: ../pictures.php");



?>

