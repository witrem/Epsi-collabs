<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php';

session_start();

if (!is_login()) {
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
}
?>
<html lang="fr">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, userscalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
        <link rel="stylesheet" href="noUiSlider/nouislider.css">
        <link rel="stylesheet" href="Css/modal.css">
        <link rel="stylesheet" href="Css/calendar.css">
        <link rel="stylesheet" href="Css/main.css">
        <link rel="stylesheet" href="Css/index.css">
        <link rel="stylesheet" href="Css/article.css">
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script src='fullcalendar/lib/moment.min.js'></script>
        <script src='fullcalendar/fullcalendar.js'></script>
        <script src='fullcalendar/locale/fr.js'></script>   
        <script src="noUiSlider/nouislider.js"></script>

        <title>Epsi Collabs</title>

    </head>
    <body>
        <script>
            $(document).ready(function(){
                $('.modal-trigger').leanModal();
                $('select').material_select();
            });
        </script>
    
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Includes/nav.php";
        
        $idperso = $_SESSION['user']['id'] ;

        $db = Data_base::connect();
        $req = $db->prepare("Select * from articles where id_Personne= :idpersonne");
        $req->bindParam(':idpersonne', $idperso);
        $req->execute();
        $resultat = $req->fetchAll();
        
        
        
        
        echo '<ul class="collection">';
        foreach ($resultat as $ligne) {



            echo '<li class="collection-item liste">';
            echo '<b><h4>' . $ligne['Titre'] . '</b></h4><br>';
            echo $ligne['Description'] . '<br>';

            echo '<form action="Modules/supparticle.php" method="POST">';
            echo '<button class="waves-effect waves-light btn bg-epsi5" type="submit"><i class="material-icons right">close</i>Supprimer</button>';
            echo '<input name="supparticle" type="hidden" value="' . $ligne['id_Article'] . '">';
            echo '</form>';

            echo '<form action="edition.php" method="POST">';
            echo '<input name="editarticle" type="hidden" value="' . $ligne['id_Article'] . '">';
            echo '<button class="waves-effect waves-light btn bg-epsi2" type="submit"><i class="material-icons right">edit</i>Editer</button>';

            echo '</form>';

            if ($ligne['etat'] == 0) {
                echo '<form action="Modules/supparticle.php" method="POST">';
                echo '<button class="waves-effect waves-light btn bg-epsi" type="submit"><i class="material-icons right">brightness_1</i>Soumettre</button>';
                echo '<input name="pubarticle1" type="hidden" value="' . $ligne['id_Article'] . '">';
                echo '</form>';
            } else if ($ligne['etat'] == 1) {

                echo '<form action="Modules/supparticle.php" method="POST">';
                echo '<button class="waves-effect waves-light btn bg-epsi3" type="submit"><i class="material-icons right">brightness_2</i>Ne Plus soumettre</button>';
                echo '<input name="pubarticle0" type="hidden" value="' . $ligne['id_Article'] . '">';
                echo '</form>';
            }



            echo '</li>';
        }
        echo '<a class="btn-floating btn-large  bg-epsi4 modalbutton" href="redaction.php"><i class="material-icons">create</i></a>';
        echo '</ul>';
        ?>
        
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_profil.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifprofil.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifdate.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifcomp.php'; ?>

    <script src="Js/modals.js"></script>

</html>







