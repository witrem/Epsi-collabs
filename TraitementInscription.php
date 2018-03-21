<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Modules/config.php'; ?>
<?php

if (isset($_POST)) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $campus = $_POST['campus'];
    $niveau = $_POST['niveau'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    
    var_dump($_POST) ;
   
    
    $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $req = $db->prepare("Select email from personnes where email=:email");
    $req->bindValue(':email', $email);
    $req->execute();
    $resultat= $req->fetch();
    
    if ($resultat == null && ($password1 == $password2) ) {
        echo 'ok13244';
    $req = $db->prepare("INSERT INTO `personnes` ( `Nom`, `Prenom`, `Email`, `MDP`, `Niveau`, `id_Campus`) VALUES ( :nom, :Prenom, :Email, :MDP, :Niveau, :Campus)");
    $req->bindValue(':nom', $nom);
    $req->bindValue(':Prenom', $prenom);
    $req->bindValue(':Email', $email); 
    $req->bindValue(':MDP', hash('sha256', $password1));
    $req->bindValue(':Niveau', $niveau);
    $req->bindValue(':Campus', $campus);
    $req->execute();
  header('location: login.php');
    echo 'ok';
    var_dump($_POST) ;
    }
    
    else {
        header('location: inscription.php');
        
    }
}