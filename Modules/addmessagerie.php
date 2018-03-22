<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Modules/config.php'; ?>
<?php

if (isset($_POST['msg']) && isset($_POST['ID_User'])) {
    
    $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    
    $idsession = 10; // AJOUTER SESSION USER 
    $iduser = $_POST['ID_User']; 
    
    

    $req = $db->prepare("INSERT INTO `groupes` (`ID_Groupes`) VALUES (NULL)");
    $req->execute();
    $idg = $db->lastInsertId();


    $req = $db->prepare("INSERT INTO `invitations` (`ID_User`, `ID_Groupes`, `proprio`, `Etat_Invitation`) VALUES ( :id_user, :idg )");
    $req->bindParam(':id_user', $iduser);
    $req->bindParam(':idg', $idg);
    $req->execute();
    

    $req = $db->prepare("INSERT INTO `invitations` (`ID_User`, `ID_Groupes`, `proprio`, `Etat_Invitation`) VALUES ( :id_user, :idg )");
    $req->bindParam(':id_user', $idsession);
    $req->bindParam(':idg', $idg);
    $req->execute();
    
    
    
    $req = $db->prepare("INSERT INTO `messages` ( Contenu, ID_User, ID_Groupes ) VALUES ( :Contenu, :ID_Createur, :ID_Groupes)");
    $req->bindParam(':Contenu', $_POST['msg']);
    $req->bindParam(':ID_Createur', $idsession);
    $req->bindParam(':ID_Groupes', $idg);
    $req->execute();
}

header('location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
?>