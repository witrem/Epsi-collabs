<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php'; 
    session_start();
?>
<!DOCTYPE html>
<?php
if (isset($_POST)) {
    $msg = $_POST['msg'];
    $idg = $_POST['ID_Groupes'];
    $idsession = $_SESSION['user']['id']; // AJOUTER SESSION USER 
    

    $db = Data_base::connect();
    $req = $db->prepare("INSERT INTO `messages` ( Contenu, ID_User, ID_Groupes ) VALUES ( :Contenu, :ID_Createur, :ID_Groupes)");
    $req->bindParam(':Contenu', $_POST['msg']);
    $req->bindParam(':ID_Createur', $idsession);
    $req->bindParam(':ID_Groupes', $idg);
    $req->execute();
}
header('location: http://' . $_SERVER['HTTP_HOST'] . '/messagerie.php?idg=' . $idg);
?>
 