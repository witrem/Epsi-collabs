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
        <link rel="stylesheet" href="/Css/main.css">
        <link rel="stylesheet" href="/Css/modal.css">
        <link rel="stylesheet" href="/Css/article.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <title>Epsi Collabs</title>

    </head>
    <body>

        <?php
        $db = Data_base::connect();
        $req = $db->prepare("Select *  from articles where etat='1' ");
        $req->execute();
        $resultat = $req->fetchAll();
        echo '<ul class="collection">';
        foreach ($resultat as $ligne) {



            echo '<li class="collection-item liste">';
            echo '<b><h4>' . $ligne['Titre'] . '</b></h4><br>';
            echo $ligne['Description'] . '<br>';
            echo '<form action="/article.php" method="GET">';
            echo '<input name="article" type="hidden" value="' . $ligne['id_Article'] . '">';
            echo '<button class="waves-effect waves-light btn listebouton bg-epsi" type="submit"><i class="material-icons right">arrow_forward</i>Lire la suite</button>';
            echo '</form>';
            echo '<form action="/Modules/supparticle.php" method="POST">';

            echo '<input name="supparticle" type="hidden" value="' . $ligne['id_Article'] . '">';
            echo '</form>';
            echo '<form action="/edition.php" method="POST">';
            echo '<input name="editarticle" type="hidden" value="' . $ligne['id_Article'] . '">';
            echo '<button class="waves-effect waves-light btn bg-epsi2" type="submit"><i class="material-icons right">edit</i>Editer</button>';

            echo '</form>';


            echo '<form action="valid_article.php" method="POST">';
            echo '<button class="waves-effect waves-light btn bg-epsi3" type="submit"><i class="material-icons right">check</i>Accepter</button>';
            echo '<input name="pubarticle1" type="hidden" value="' . $ligne['id_Article'] . '">';
            echo '</form>';



            echo '<form action="valid_article.php" method="POST">';
            echo '<button class="waves-effect waves-light btn btn bg-epsi5" type="submit"><i class="material-icons right">close</i>Renvoyer</button>';
            echo '<input name="pubarticle0" type="hidden" value="' . $ligne['id_Article'] . '">';
            echo '</form>';
        }



        echo '</li>';

        echo '</ul>';
        ?>

    </body>

</html>







