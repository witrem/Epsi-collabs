<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, userscalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="Css/main.css">
    <link rel="stylesheet" href="Css/modal.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <title>Epsi Collabs</title>

</head>
<body>7
    <?php include "Includes/nav.php" ?>
    <meta http-equiv="refresh" content="3; URL=index.php">
    
<div class="row alignement                                                                                                                                                                                                                                                                                                                                                                                   ">
<div class="card-panel col s12 logfichier">
<?php
$target_dir = "Assets/Avatar/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image !";
        $uploadOk = 0;
    }
}



if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Aie votre Avatar est trop lourd !";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Désolé, seulement JPG, JPEG, PNG & GIF sont autorisé sur Collabs";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Votre fichier n'a pas été upload !";

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Le fichier ". basename( $_FILES["fileToUpload"]["name"]). " a été envoyé ! Redirection en cours...";
    } else {
        echo "Désolé, Il y a une une erreur dans votre envoi de fichier. Redirection en cours...";
    }
}
?>
    <div>
        </div>
</body>
