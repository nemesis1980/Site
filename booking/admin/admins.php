<?php

// Include bliver brugt til at loade database connection filen.



	include 'dbcon.php';



//Her bliver header.php, som er vores menu, inkluderet på siden



	include 'header.php';

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Login System</title>

<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

<?php





// Her tjekkes først om man er logget ind og ellers kommer signup formen frem, så man kan registrere sig.

	if (isset($_SESSION['id'])) {



		// Nedenfor bliver sql statements lavet, til at tjekke de indtastede værdier fra brugeren, i formen til at logge ind på hjemmesiden, og hvis username eller password er forkert, kommer der en fejlbesked.



		$conn = mysqli_connect($servername, $username, $password, $table);



		$uid = $_SESSION['id'];

		echo "

			<ul class='uladmins'>

				<li><a href='admin-profiles.php'>SE ADMINS</a></li>

				<li><a href='create-admin.php'>TILFØJ ADMIN</a></li>

				<li><a href='edit-admin.php'>ÆNDRE ADMIN</a></li>

				<li><a href='delete-admin.php'>SLET ADMIN</a></li>

			</ul>
			";
	}

	else {

		echo "Du skal være logget ind for at kunne oprette eller ændre i admins.";

	}

?>

</body>

</html>