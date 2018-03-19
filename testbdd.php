<?php include_once "bootstrap.php" ?> 
<?php include 'config.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
session_start();
session_destroy();
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="UTF-8">
        <link href="maincss.css" rel="stylesheet" type="text/css"/>
        <link href="indexcss.css" rel="stylesheet" type="text/css"/>
        <title>Index</title>
    </head>
    <body>
        <div class="connexionpage">
            <h1>Test BDD</h1>
            <?php 
            $db = new PDO("mysql:host=" . Config::SERVERNAME . ";port=" . Config::PORT . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $req = $db->prepare("select * from personnes");
            $req->bindParam(':iden', $nom);
            $req->execute();

            $resultat = $req->fetchAll();
            var_dump($resultat);
            ?>




        </div>
        <br><br>
        <div class="align">
            <!--<form action="index.php">-->
            <form method="post" action="index.php"> 
                <div class="formulaire">
                    <div class="form-group">
                        <label for="inputdefault">Nom</label>
                        <input class='form-control' type='text' input type='text' name='Nom' required placeholder="Votre nom d'utilisateur">
                    </div>
                    <div class="form-group">
                        <label for="inputdefault">Mot de passe</label>
                        <input class='form-control' type='password' input type='text' name='MDP' required placeholder="Votre mot de passe" minlength="4" maxlength="20" size="20">
                    </div>
                </div>
                <div class="connexionpage">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
                    </div>

                    <button type="button|submit" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                        Connexion
                    </button>
                    <?php
                    if (isset($_POST["Nom"])) {
                        $nom = $_POST['Nom'];
                        $motdp = $_POST['MDP'];
                        $pass = hash('sha256', $motdp);
                        $db = new PDO("mysql:host=" . Config::SERVERNAME . ";port=" . Config::PORT . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                        $req = $db->prepare("select * from personnes where Identifiant=:iden ");
                        $req->bindParam(':iden', $nom);
                        $req->execute();

                        $resultat = $req->fetchAll();
                        // var_dump($resultat);

                        $req2 = $db->prepare("SELECT Identifiant, COUNT(*) as nombre FROM personnes where Identifiant=:iden ");
                        $req2->bindParam(':iden', $nom);
                        $req2->execute();
                        $db = null;
                        $resultat2 = $req2->fetchAll();
                        // var_dump($resultat2);

                        if ($resultat[0]['Actif']==0){
                            echo "<div class='alert alert-danger' id='info'><strong>You Shall Not PASS!</strong> Autorisation refusée.</div>";
                        }
                        else if (!($resultat2[0][0] == NULL)) {
                            if (($nom == $resultat[0]['Identifiant']) && ($pass == $resultat[0]['MDP'])) {
                                echo "<div class='alert alert-success' id='info'><strong>Connexion Etablie!</strong> Veuillez patienter pendant le chargement de votre compte</div>";
                                session_start();
                                $_SESSION['Identif'] = $nom;
                                $_SESSION['temps'] = time();
                                $_SESSION['connected'] = "oui";
                                $_SESSION['idchat'] = "oui";
                                // header("Location: accueil.php?nom='$nom'");
                                header("Location: accueil.php");
                            } else {
                                echo "<div class='alert alert-danger' id='info'><strong>Erreur de connexion!</strong> Nom d'utilisateur ou mot de passe incorrect.</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger' id='info'><strong>Erreur de connexion!</strong> Nom d'utilisateur ou mot de passe incorrect.</div>";
                        }
                    }
                    ?>
                </div>

            </form>
        </div>




    </body>
</html>

<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Informations Incorrectes</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                Remplisser le formulaire de contact
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>
            </div>
        </div>
    </div>
</div>
