<?php

session_start();

// Vi starter en session her.



// Include bliver brugt til at loade database connection filen.



include '../dbcon.php';



// Nedenfor bliver de forskellige variabler lavet, så de svarer til de data der skal sendes til databasen.

$target_dir = "../img/";

$target = $target_dir . basename($_FILES["BPic"]["name"]);

$uploadOk = 1;

$imageFileType = pathinfo($target,PATHINFO_EXTENSION);

$imageFileTypeActual = strtolower(end($imageFileType));

$BPic = $_FILES['BPic']['name'];

$iName = $_POST['iName'];

$iLength = $_POST['iLength'];

$iHeight = $_POST['iHeight'];

$iDepth = $_POST['iDepth'];

$iPrice = $_POST['iPrice'];


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["BPic"]["tmp_name"]);
    if($check !== false) {
        echo "Filen er et billede - <br>" . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Filen er ikke et billede. <br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target)) {
    echo "Beklager filen eksisterer allerede. <br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["BPic"]["size"] > 20000000) {
    echo "Beklager, filen er for stor. <br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileTypeActual != "jpg" && $imageFileTypeActual != "png" && $imageFileTypeActual != "jpeg" && $imageFileTypeActual != "gif") {
    echo "Beklager, JPG, JPEG, PNG & GIF er de eneste filtyper der er tilladte. <br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Beklager, din fil blev ikke uploaded. <br>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["BPic"]["tmp_name"], $target)) {
        echo "Filen ". basename( $_FILES["BPic"]["name"]). " er blevet uploaded. <br>";
    } else {
        echo "Beklager, der skete en fejl ved uploaden. <br>";
    }
}


// Nedenfor tjekkes om der er indtastet data i alle områder i signup formen, ellers bliver insert statement ikke kørt, og man bliver sendt tilbage til signupsiden med en fejl.


if (empty($BPic)) {

	header("Location: ../create-picture.php?error=empty");

	exit();

}



if (empty($iName)) {

	header("Location: ../create-picture.php?error=empty");

	exit();

}


if (empty($iPrice)) {

	header("Location: ../create-picture.php?error=empty");

	exit();

}


/*

Nedenfor bliver dataene indsat i databasen, hvis ovenstående tjek kører igennem.

Desuden bliver der tjekket for om projekt navnet eksisterer i forvejen.

*/




else {

		$sql = "INSERT INTO billeder (Billede_Navn, Billede_Længde, Billede_Højde, Billede_Dybde, Billede_Pris, Billede_Billede)

				VALUES ('$iName', '$iLength', '$iHeight', '$iDepth', '$iPrice', '$BPic')";

		$result = mysqli_query($conn, $sql);

	}



	// Nedenfor bliver man efter dataen er sendt, sendt tilbage til forsiden.


//	header("Location: ../pictures.php");



?>

