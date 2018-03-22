<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php';
    session_start();

if (isset($_POST['msg']) && isset($_POST['ID_User'])) {
    
    $db = Data_base::connect();
    
    
    $idsession = $_SESSION['user']['id']; // AJOUTER SESSION USER 
    $iduser = $_POST['ID_User']; 

    // verif de groupe existant

    $req = $db->prepare("SELECT id_Groupes FROM invitations WHERE ID_User = :id_ses AND EXISTS (SELECT id_Groupes FROM invitations WHERE ID_User = :id_user)");
    $req->execute(array(
        ':id_ses' => $idsession,
        ':id_user' => $iduser
    ));

    $idg = $req->fetch();

    if ($idg == false) {

        $req = $db->prepare("INSERT INTO `groupes` (`ID_Groupes`) VALUES (NULL)");
        $req->execute();
        $idg = $db->lastInsertId();
    
    
        $req = $db->prepare("INSERT INTO `invitations` (`ID_User`, `ID_Groupes`) VALUES ( :id_user, :idg )");
        $req->bindParam(':id_user', $iduser);
        $req->bindParam(':idg', $idg);
        $req->execute();
        
    
        $req = $db->prepare("INSERT INTO `invitations` (`ID_User`, `ID_Groupes`) VALUES ( :id_user, :idg )");
        $req->bindParam(':id_user', $idsession);
        $req->bindParam(':idg', $idg);
        $req->execute();

    }

    //
    
    $req = $db->prepare("INSERT INTO `messages` ( Contenu, ID_User, ID_Groupes ) VALUES ( :Contenu, :ID_Createur, :ID_Groupes)");
    $req->bindParam(':Contenu', $_POST['msg']);
    $req->bindParam(':ID_Createur', $idsession);
    $req->bindParam(':ID_Groupes', $idg);
    $req->execute();
}

exit();
 
header('location: http://' . $_SERVER['HTTP_HOST'] . '/messagerie.php');
?>