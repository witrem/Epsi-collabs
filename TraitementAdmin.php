<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Modules/config.php'; ?>
<?php

$db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));



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