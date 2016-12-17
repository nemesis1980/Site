<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$Bid_1 = (isset($_POST['Bid_1']) ? $_POST['Bid_1'] : null);

$BPic_1 = (isset($_POST['BPic_1']) ? $_POST['BPic_1'] : null);



	$conn = mysqli_connect($servername, $username, $password, $table);



	$sql = "SELECT idBilleder FROM billeder WHERE idBilleder='$Bid_1'";

	$result = mysqli_query($conn, $sql);

		$sql = "DELETE FROM billeder WHERE idBilleder='$Bid_1'";

		$conn->query($sql);


// unlink($BPic_1);

if (!unlink("../img/".$BPic_1)) {
	echo ("Error deleting $BPic_1");
	}

else {
	header("Location: ../pictures.php");
	}

	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.

//	header("Location: ../pictures.php");



?>

