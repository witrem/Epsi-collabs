<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Class/Article.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Class/Competence.php";

    function is_login() {

        if (isset($_SESSION['connected'])) {
            return true;
        } else {
            return false;
        }

    }

?>