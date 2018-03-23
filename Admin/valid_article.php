<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php';
session_start();

if (!is_login()) {
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
}

$db = Data_base::connect();

if (isset ($_POST['pubarticle1'])) {
    
  
  echo $_POST['pubarticle1'];

    $req = $db->prepare("Update articles SET etat=2 where id_Article=:id");
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

header("location:listarticle_admin.php");