<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php';
    session_start();

    // Afficher les erreurs à l'écran
    ini_set('display_errors', 1);

?>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, userscalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta http-equiv="refresh" content="3; URL=http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="Css/main.css">
    <link rel="stylesheet" href="Css/modal.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <title>Epsi Collabs</title>

</head>

<body>

    <?php

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/Assets/Avatar/";

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        $ext = explode('/', $_FILES['fileToUpload']['type'])[1];

        $isupload = 1;

        if (isset($_POST["submit"])) {

            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            if ($check !== false) {

                $isupload = 1;
            
            } else {
            
                echo "Le fichier n'est pas une image !";
                $isupload = 0;
            
            }
        }

        $typeAccepted = array("image/jpeg", "image/jpg", "image/png");

        if (!in_array($_FILES["fileToUpload"]["type"], $typeAccepted)) {

            echo "Désolé, seulement JPG, JPEG et PNG sont autorisé sur Collabs \n";
            $isupload = 0;
        
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {

            echo "Aie votre Avatar est trop lourd !";
            $isupload = 0;
        
        }

        $cache = User::get_avatar_url($_SESSION['user']['id']);

        if (!($cache == 'Default.png')) {

            if (file_exists($target_dir . $cache)) {

                unlink($target_dir . $cache);
            
            }
        }

        if ($isupload == 0) {
            
            echo "Votre fichier n'a pas été upload !";
        
        } else {

            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir . $_SESSION['user']['id'] . "." . $ext)) {

                User::change_avatar_url($_SESSION['user']['id'], $ext);

                echo "\nLe fichier " . basename($_FILES["fileToUpload"]["name"]) . " a été envoyé ! Redirection en cours...";
            
            } else {
            
                echo "Désolé, Il y a une une erreur dans votre envoi de fichier. Redirection en cours...";
            
            }

        }

        ?>
                
</body>