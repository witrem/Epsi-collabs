<?php

    // Afficher les erreurs à l'écran
    ini_set('display_errors', 1);

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Class/User.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Class/Competence.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Class/Data_base.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Class/Campus.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Class/Event.php";

    function is_login() {

        if (isset($_SESSION['connected'])) {
            return true;
        } else {
            return false;
        }

    }

?>