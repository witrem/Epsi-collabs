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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
    <link rel="stylesheet" href="noUiSlider/nouislider.css">
    <link rel="stylesheet" href="Css/main.css">
    <link rel="stylesheet" href="Css/modal.css">
    <link rel="stylesheet" href="Css/calendar.css">
    
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
    <script src="http://<?php echo $_SERVER['HTTP_HOST'] . '/Js/calendar.js' ?>"></script>

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/nav.php' ?>

    <div id="menu" class="">

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
        <div id='calendar'></div>
    </section>

    <script>
        $("#comp_select").change(function(){
            update();
        })
        $("#campus_select").change(function(){
            update();
        })
    </script>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Modals/m_profil.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_profil.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifprofil.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifdate.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifcomp.php'; ?>

</body>
</html>