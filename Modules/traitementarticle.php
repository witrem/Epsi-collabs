<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php';
session_start();

if (!is_login()) {
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
}

$titre = $_POST['titre'];
$comp = $_POST['comp'];
$description = $_POST['description'];
$article = $_POST['editor1'];
$idperso = $_SESSION['user']['id'];
var_dump($comp);

$db = Data_base::connect();
$req = $db->prepare("INSERT INTO articles ( id_Personne, Titre, Contenu, Description, etat) VALUES ( :id_Personne, :Titre, :Contenu, :Description, '0')");
$req->bindParam(':id_Personne', $idperso);
$req->bindParam(':Titre', $titre);
$req->bindParam(':Contenu', $article);
$req->bindParam(':Description', $description);
$req->execute();
$idArticle = $db->lastInsertId();



for ($i=0; $i < count($comp); $i++ ) {
$req = $db->prepare("INSERT INTO tag (id_Article, id_Competence) VALUES ( :id_Article, :id_comp)");
$req->bindParam(':id_Article', $idArticle);
$req->bindParam(':id_comp', $comp[$i]);
$req->execute();

}


header('Location: http://' . $_SERVER['HTTP_HOST'] . '/listarticle_user.php');
