<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Modules/config.php'; ?>
<?php

if(isset($_POST)) {
 $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));   
 $req = $db->prepare("UPDATE `personnes` SET `Description` = :Description, `Social1` = :Social1, `Social2` = :Social2, `Social3` = :Social3 WHERE `personnes`.`id_Personne` = :idpersonne ");
        $req->bindValue(':idpersonne', 6);
        $req->bindValue(':Description', $_POST['description']);
        $req->bindValue(':Social1', $_POST['social1']);
        $req->bindValue(':Social2', $_POST['social2']);
        $req->bindValue(':Social3', $_POST['social3']);
        $req->execute();
        
}

header('location: index.php');