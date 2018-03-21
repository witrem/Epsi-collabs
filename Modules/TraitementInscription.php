<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php';

if (isset($_POST)) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $campus = $_POST['campus'];
    $niveau = $_POST['niveau'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
   
    $db = Data_base::connect();
    $req = $db->prepare("SELECT email FROM personnes WHERE email = :email");
    $req->bindValue(':email', $email);
    $req->execute();
    $resultat= $req->fetch();
    
    if ($resultat == null && ($password1 == $password2) ) {
        $req = $db->prepare("INSERT INTO personnes ( Nom, Prenom, Email, MDP, Niveau, id_Campus) VALUES ( :nom, :Prenom, :Email, :MDP, :Niveau, :Campus)");
        $req->bindValue(':nom', $nom);
        $req->bindValue(':Prenom', $prenom);
        $req->bindValue(':Email', $email); 
        $req->bindValue(':MDP', hash('sha256', $password1));
        $req->bindValue(':Niveau', $niveau);
        $req->bindValue(':Campus', $campus);
        $req->execute();
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
    }
    
    else {
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/Modules/inscription.php');
    }
}