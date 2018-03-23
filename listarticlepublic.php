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
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Includes/nav.php"; ?>
        <div id="select-wrapper">
            <div id="select-comp-article" class="input-field col s12 search_select">
                <select id="select-comp-article-value" class="filter-value" id="comp_select">
                    <option value="0" selected>Compétences</option>
                    <?php
                        Competence::select_print();
                        ?>
                </select>
            </div>
        </div>
        <div id="list-article-wrapper">
            
        </div>
        <script src="Js/article.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_profil.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifprofil.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifdate.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifcomp.php'; ?>

    <script src="Js/modals.js"></script>
    </body>
</html>