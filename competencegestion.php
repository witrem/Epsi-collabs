<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Modules/config.php'; ?>
<?php

$db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));  
if (isset($_POST['Talents'])) {
    

    $req = $db->prepare("DELETE FROM propose where id_Personne=:idpersonne");
    $req->bindValue(':idpersonne', 6);
    $req->execute();
    $resultat = $req->fetchAll();


    for ($i = 0; $i < count($_POST['Talents']); $i++) {
        $req = $db->prepare("INSERT INTO `propose` (`id_Competence`, `id_Personne`) VALUES (:idcomp, :idpers)");
        $req->bindValue(':idcomp', $_POST['Talents'][$i]);
        $req->bindValue(':idpers', 6);
        $req->execute();
    }
}
    
if (isset($_POST['Besoins'])) {
    
    $req = $db->prepare("DELETE FROM demande where id_Personne=:idpersonne");
    $req->bindValue(':idpersonne', 6);
    $req->execute();
    $resultat = $req->fetchAll();


    for ($i = 0; $i < count($_POST['Besoins']); $i++) {
        $req = $db->prepare("INSERT INTO `demande` (`id_Competence`, `id_Personne`) VALUES (:idcomp, :idpers)");
        $req->bindValue(':idcomp', $_POST['Besoins'][$i]);
        $req->bindValue(':idpers', 6);
        $req->execute();
    }
}
    
