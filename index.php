<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Includes/main.php";
    session_start();

    // Afficher les erreurs à l'écran
    ini_set('display_errors', 1);

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
    <script>
    $(document).ready(function(){
        $('.modal-trigger').leanModal();
        $('select').material_select();
    });
    </script>
    <script src="Js/search.js"></script>

    <?php include "/home/romain/Documents/Epsi-collabs/Includes/nav.php" ?>

    <div id="search">
        <div class="input-field col s12 search_select">
            <select id="comp_select">
                <option value="0" disabled selected>Compétences</option>
                <?php
                    Competence::select_print(1, "PHP");
                    Competence::select_print(2, "Javascript");
                    Competence::select_print(3, "Office");
                    Competence::select_print(4, "C++");
                    Competence::select_print(5, "UML");
                ?>
            </select>
        </div><div class="input-field col s12 search_select">
            <select id="lvl_select">
                <option value="" disabled selected>Niveau</option>
                <option value="1">B1</option>
                <option value="2">B2</option>
                <option value="3">B3</option>
                <option value="4">I4</option>
                <option value="5">I5</option>
            </select>
        </div><div class="input-field col s12 search_select">
            <select id="campus_select">
                <option value="" disabled selected>Campus</option>
                <?php
                    Competence::select_print(0, "PHP");
                    Competence::select_print(1, "Javascript");
                    Competence::select_print(2, "Office");
                    Competence::select_print(3, "C++");
                    Competence::select_print(4, "UML");
                ?>
            </select>
        </div><div class="search_select">
            <div id="search_btn" class="btn clickable" type="submit" onclick="search()">Rechercher</button>
        </div>
    </div>
 
    <section id="found_user" class="txt-center txt-light card border hide">
        
        

    </section>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Modals/m_profil.php"; ?>

</html>