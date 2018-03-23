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
        <link rel="stylesheet" href="Css/main.css">
        <link rel="stylesheet" href="Css/modal.css">
        <link rel="stylesheet" href="Css/article.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <title>Epsi Collabs</title>

    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Includes/nav.php";
        
        //POST DU COMP
        $idcomp = 2;
        
        $db = Data_base::connect();
        $req = $db->prepare("Select * from articles a 
        join tag g on g.id_Article=a.id_Article
        where a.etat='2' AND g.id_Competence= :idcomp  ");
        $req->bindParam(':idcomp', $idcomp);
        $req->execute();
        $resultat = $req->fetchAll();
        echo '<ul class="collection">';
        foreach ($resultat as $ligne) {

            $req = $db->prepare("SELECT Nom from tag g join competences c on c.id_Competence = g.id_Competence where id_Article = :idcomp ");
            $req->bindParam(':idcomp', $ligne['id_Article']);
            $req->execute();
            $nbcomp = $req->fetchAll();
        
            echo '<li class="collection-item liste">';
            echo '<b><h4>' . $ligne['Titre'] . '</b></h4><br>';
            echo $ligne['Description'] . '<br>';
            
            foreach ($nbcomp as $comp) {
                echo '<div class="chip">',$comp['Nom'],'</div>';   
            }
            
            echo '<form action="article.php" method="GET">';
            echo '<input name="article" type="hidden" value="' . $ligne['id_Article'] . '">';
            echo '<button class="waves-effect waves-light btn listebouton bg-epsi3" type="submit"><i class="material-icons right">arrow_forward</i>Lire la suite</button>';
            echo '</form>';

        }



        echo '</li>';

       
        ?>
        </ul>
       
    </body>
</html>