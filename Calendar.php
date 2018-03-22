<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Includes/main.php";

    session_start();

    // Afficher les erreurs à l'écran
    ini_set('display_errors', 1);
    
    if (!is_login()) {
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
    }

    $idCampus = User::get_campus($_SESSION['user']['id']);

?>
<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, userscalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
    <link rel="stylesheet" href="noUiSlider/nouislider.css">
    <link rel="stylesheet" href="Css/modal.css">
    <link rel="stylesheet" href="Css/calendar.css">
    <link rel="stylesheet" href="Css/main.css">
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script type="text/javascript" src='fullcalendar/lib/moment.min.js'></script>
    <script type="text/javascript" src='fullcalendar/fullcalendar.js'></script>
    <script type="text/javascript" src='fullcalendar/locale/fr.js'></script>   
    <script type="text/javascript" src="noUiSlider/nouislider.js"></script>
    
    <title>Epsi Collabs</title>

</head>
<body>

    <script>
        $(document).ready(function(){
            $('.modal-trigger').leanModal();
            $('select').material_select();
        });
    </script>
    <script type="text/javascript" src="Js/calendar.js"></script>
    
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/nav.php' ?>

    <div id="menu">

        <div class="clickable btn_menu_calendar_resp"><i class="material-icons">menu</i></div>

        <div class="input-field w-90 self-centered">
            <select id="campus_select">
                <?php
                    Campus::select_print();
                ?>
            </select>
        </div>

        <div class="input-field w-90 self-centered">
            <select id="comp_select">
                <?php
                    Competence::select_print();
                ?>
            </select>
        </div>

    </div>

    <section id="calendar_wrapper">
        <div id="campus-calendar" class='calendar'></div>
    </section>

    <script>
        $("#comp_select").change(function(){
            update_campus_calendar();
        })
        $("#campus_select").change(function(){
            update_campus_calendar();
        })
    </script>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_profil.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifprofil.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifdate.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifcomp.php'; ?>

    <script src="Js/modals.js"></script>

</body>
</html>