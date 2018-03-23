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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <title>Epsi Collabs</title>

    </head>
    <body>
                 <?php include $_SERVER['DOCUMENT_ROOT'] . "/Includes/nav.php" ?>

        
        <?php
        if (isset($_GET['article'])) {
        
        $idart=$_GET['article'];
        $db = Data_base::connect();
        $req = $db->prepare("Select * from articles a join personnes p on a.Id_Personne=p.Id_Personne where id_Article= :idarticle ");
        $req->bindParam(':idarticle', $idart);
        $req->execute();
        $resultat = $req->fetch();
     
        $resultat['Date'] = date("d/m/y G:i", strtotime($resultat['Date']));
         echo'<div id="login-wrapper" class="card mh-auto inscription">              
        <div class="row alignement">';
                
   echo'<div class="contenuarticle">';
   echo '<h4 class="titre">'.$resultat['Titre'].'</h4>';
   echo '<div class="contenu">'.$resultat['Contenu'].'</div>';
   echo '<div class="footerarticle">Par: ',$resultat['Nom'],' ',$resultat['Prenom'] ,'  ['.$resultat['Date'].']</div>';
   echo'</div>';
        
        echo '</div></div>';
        
    }    
        ?>
    </body>
</html>

     