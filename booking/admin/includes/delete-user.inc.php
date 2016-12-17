<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.



$uid_1 = (isset($_POST['uid_1']) ? $_POST['uid_1'] : null);



	$conn = mysqli_connect($servername, $username, $password, $table);



		$sql = "DELETE FROM kunder WHERE idKunder='$uid_1'";

		$conn->query($sql);



	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.



	header("Location: ../user-profiles.php");



?>

