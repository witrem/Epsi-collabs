<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Includes/main.php";
    session_start();

    if (!isset($_POST) || !isset($_POST['timeD']) || !isset($_POST['timeF']) || !isset($_POST['date']) || !isset($_POST['month']) || !isset($_POST['comp'])) {
        echo "00001";
        exit();
    }

    function DateToDate($str) {
        if ((int) $str < 10) return '0' . $str;
        else return $str;
    }

    function MinToMin($str) {
        if ($str == '50') return '30';
        else return '00';
    }

    $db = Data_base::connect();

    $statment = $db->prepare("INSERT INTO rencontres ( id_Personne, date_debut, date_fin, id_Competence, id_Campus) VALUES (?, ?, ?, ?, ?)");

    $statment->execute(array(
        $_SESSION['user']['id'],
        "2018-" . $_POST['month'] . '-' . (DateToDate($_POST['date'])) . ' ' . (explode('.', $_POST['timeD'])[0]) . ":" . MinToMin(explode('.', $_POST['timeD'])[1]) . ':00',
        "2018-" . $_POST['month'] . '-' . (DateToDate($_POST['date'])) . ' ' . (explode('.', $_POST['timeF'])[0]) . ":" . MinToMin(explode('.', $_POST['timeF'])[1]) . ':00',
        $_POST['comp'],
        User::get_campus($_SESSION['user']['id'])
    ));
    
    echo $statment->errorCode();
?>

