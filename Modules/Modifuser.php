<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php'; 
session_start();

if (!isset($_POST) || !isset($_POST['social1']) || !isset($_POST['social2']) || !isset($_POST['social3']) || !isset($_POST['comment'])) {
        echo "00001";
        exit();
}

$db = Data_base::connect();
$req = $db->prepare("UPDATE `personnes` SET `Description` = :Description, `Social1` = :Social1, `Social2` = :Social2, `Social3` = :Social3 WHERE `personnes`.`id_Personne` = :idpersonne ");
$req->bindValue(':idpersonne', $_SESSION['user']['id']);
$req->bindValue(':Description', $_POST['comment']);
$req->bindValue(':Social1', $_POST['social1']);
$req->bindValue(':Social2', $_POST['social2']);
$req->bindValue(':Social3', $_POST['social3']);
$req->execute();

echo $req->errorCode();