<?php

    include_once "/home/romain/Documents/Epsi-collabs/Includes/main.php";
    session_start();

    // Afficher les erreurs à l'écran
    ini_set('display_errors', 1);

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
    <script>
    $(document).ready(function(){
        $('.modal-trigger').leanModal();
    });
    </script>

    <?php include "/home/romain/Documents/Epsi-collabs/Includes/nav.php" ?>

    <input type="text" id="search" placeholder="Compétences, artices">
 
    <section id="competences" class="txt-center txt-light card border hide">
        <table>
            <thead>
                <tr>
                    <th id="comp-title" class="txt-center">Compétences</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="clickable">PHP</td>
                </tr>
                <tr>
                    <td class="clickable">Javascript</td>
                </tr>
                <tr>
                    <td class="clickable">C++</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section id="article_container">

        <?php 
            $article = new Article("title", "description de type qualitey", array("http://localhost:88/Assets/Images/profil.jpg")); 
            $article->print_this();
            $article = new Article("title", "description de type qualitey", array("http://localhost:88/Assets/Images/profil.jpg")); 
            $article->print_this();
            $article = new Article("title", "description de type qualitey", array("http://localhost:88/Assets/Images/profil.jpg")); 
            $article->print_this();
        ?>

    </section>

    <?php include('Modals/m_profil.php'); ?>
</html>