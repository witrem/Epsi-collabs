<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php';
session_start();

// Afficher les erreurs à l'écran
ini_set('display_errors', 1);

if (!is_login()) {
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
    exit();
}

if (!User::is_prof()) {
    header('location: http://' . $_SERVER['HTTP_HOST']);
    exit();
}

$db = Data_base::connect();

if (isset($_POST['addcomp'])) {

    $req = $db->prepare("Select Nom from Competences where Nom=:Comp");
    $req->bindValue(':Comp', $_POST['addcomp']);
    $req->execute();
    $resultat = $req->fetch();

    if ($resultat == null) {

        $req = $db->prepare("INSERT INTO `competences` ( `Nom`) VALUES ( :Nom )");
        $req->bindValue(':Nom', $_POST['addcomp']);
        $req->execute();
    }
}

if(isset($_POST['addprof']) || isset($_POST['change_niveau'])) {
    $req = $db->prepare("UPDATE `personnes` SET `Niveau` = :niveau WHERE Email = :mail");
    if (isset($_POST['addprof'])) {
        $req->bindValue(':niveau', 'Prof');
        $req->bindValue(':mail', $_POST['addprof']);
    } else if (isset($_POST['change_niveau'])) {
        $req->bindValue(':niveau', $_POST['niveau']);
        $req->bindValue(':mail', $_POST['change_niveau']);
    }
    $req->execute();
}

header('location: Admin.php');