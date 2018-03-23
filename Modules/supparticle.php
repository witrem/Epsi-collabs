<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php'; 
session_start();

if (!is_login()) {
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
}

$db = Data_base::connect();

if (isset($_POST['supparticle'])) {

    $req = $db->prepare("delete from tag where id_Article = :id");
    $req->bindParam(':id', $_POST['supparticle']);
    $req->execute();


    $req = $db->prepare("delete from articles where id_Article = :id");
    $req->bindParam(':id', $_POST['supparticle']);
    $req->execute();

    
}

if (isset ($_POST['pubarticle1'])) {
    
  echo'OK';
  echo $_POST['pubarticle1'];

    $req = $db->prepare("Update articles SET etat=1 where id_Article=:id");
    $req->bindParam(':id', $_POST['pubarticle1']);
    $req->execute();    
    $db=null;
    
}

else if (isset ($_POST['pubarticle0'])) {

    

    $req = $db->prepare("Update articles SET etat=0 where id_Article=:id");
    $req->bindParam(':id', $_POST['pubarticle0']);    
    $req->execute();
    $db=null;
    
}

header('Location: http://' . $_SERVER['HTTP_HOST'] . '/listarticle_user.php');