<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Includes/main.php";

    session_start();

    
    
    if (!is_login()) {
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
    }

?>
<!DOCTYPE html>
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
    <script src="Js/search.js"></script>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Includes/nav.php" ?>

    <div id="search">
        <div class="input-field col s12 search_select">
            <select id="comp_select">
                <option value="0" disabled selected>Compétences</option>
                <?php
                    Competence::select_print();
                ?>
            </select>
        </div><div class="input-field col s12 search_select">
            <select id="campus_select">
                <option value="0" selected>Campus</option>
                <?php
                    Campus::select_print();
                ?>
            </select>
        </div><div class="input-field col s12 search_select">
            <select id="lvl_select">
                <option value="0" selected>Niveau</option>
                <option value="B1">B1</option>
                <option value="B2">B2</option>
                <option value="B3">B3</option>
                <option value="I4">I4</option>
                <option value="I5">I5</option>
            </select>
        </div><div class="search_select">
            <div id="search_btn" class="btn clickable" onclick="search()">Rechercher</div>
        </div>
    </div>

    <div id="search_btn_resp" class="btn clickable" onclick="search()">
        <i class="material-icons">search</i>
    </div>

    <div id="founded-user" class="">

    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_profil.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifprofil.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifdate.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifcomp.php'; ?>

    <script src="Js/modals.js"></script>

</html>