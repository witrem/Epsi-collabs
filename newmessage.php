<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Modules/config.php'; ?>
<!DOCTYPE html>


<?php
if (isset($_POST)) {
    $msg = $_POST['msg'];
    $idg = $_POST['ID_Groupes'];
    $idsession = 9; // AJOUTER SESSION USER 
    

    $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $req = $db->prepare("INSERT INTO `messages` ( Contenu, ID_User, ID_Groupes ) VALUES ( :Contenu, :ID_Createur, :ID_Groupes)");
    $req->bindParam(':Contenu', $_POST['msg']);
    $req->bindParam(':ID_Createur', $idsession);
    $req->bindParam(':ID_Groupes', $idg);
    $req->execute();
}
header('location: http://' . $_SERVER['HTTP_HOST'] . '/messagerie.php?idg=' . $idg);
?>
 