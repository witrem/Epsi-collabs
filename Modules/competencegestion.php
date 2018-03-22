<?php 

include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php'; 
session_start();

if (!isset($_POST) || (!isset($_POST['Talents']) && !isset($_POST['Besoins']))) {
    echo "00001";
    exit();
}

$db = Data_base::connect();

$error[0] = false;

if (isset($_POST['Talents'])) {
    
    $req = $db->prepare("DELETE FROM propose where id_Personne = :idpersonne");
    $req->bindValue(':idpersonne', $_SESSION['user']['id']);
    $req->execute();
    $resultat = $req->fetchAll();

    $talents = explode(',', $_POST['Talents']);

    for ($i = 0; $i < count($talents); $i++) {

        $req = $db->prepare("INSERT INTO `propose` (`id_Competence`, `id_Personne`) VALUES (:idcomp, :idpers)");
        $req->bindValue(':idcomp', $talents[$i]);
        $req->bindValue(':idpers', $_SESSION['user']['id']);
        $req->execute();

        if ($req->errorCode() != '00000' && $req->errorCode() != "00000\n") $error[sizeof($error)] = 'addT' . $i;
    
    }

}
    
if (isset($_POST['Besoins'])) {
    
    $req = $db->prepare("DELETE FROM demande where id_Personne=:idpersonne");
    $req->bindValue(':idpersonne', $_SESSION['user']['id']);
    $req->execute();
    $resultat = $req->fetchAll();

    $besoins = explode(',', $_POST['Besoins']);

    for ($i = 0; $i < count($besoins); $i++) {

        $req = $db->prepare("INSERT INTO `demande` (`id_Competence`, `id_Personne`) VALUES (:idcomp, :idpers)");
        $req->bindValue(':idcomp', $besoins[$i]);
        $req->bindValue(':idpers', $_SESSION['user']['id']);
        $req->execute();

        if ($req->errorCode() != '00000' && $req->errorCode() != "00000\n") $error[sizeof($error)] = 'addB' . $i;

    }
}
    
if (sizeof($error) > 1) var_dump($error);
else echo '00000';