<?php 

include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php'; 
session_start();

$db = Data_base::connect();  
if (isset($_POST['Talents'])) {
    
    $req = $db->prepare("DELETE FROM propose where id_Personne=:idpersonne");
    $req->bindValue(':idpersonne', $_SESSION['user']['id']);
    $req->execute();
    $resultat = $req->fetchAll();


    for ($i = 0; $i < count($_POST['Talents']); $i++) {
        $req = $db->prepare("INSERT INTO `propose` (`id_Competence`, `id_Personne`) VALUES (:idcomp, :idpers)");
        $req->bindValue(':idcomp', $_POST['Talents'][$i]);
        $req->bindValue(':idpers', $_SESSION['user']['id']);
        $req->execute();
    }
}
    
if (isset($_POST['Besoins'])) {
    
    $req = $db->prepare("DELETE FROM demande where id_Personne=:idpersonne");
    $req->bindValue(':idpersonne', $_SESSION['user']['id']);
    $req->execute();
    $resultat = $req->fetchAll();


    for ($i = 0; $i < count($_POST['Besoins']); $i++) {
        $req = $db->prepare("INSERT INTO `demande` (`id_Competence`, `id_Personne`) VALUES (:idcomp, :idpers)");
        $req->bindValue(':idcomp', $_POST['Besoins'][$i]);
        $req->bindValue(':idpers', $_SESSION['user']['id']);
        $req->execute();
    }
}
    
header('location: http://' . $_SERVER['HTTP_HOST']);