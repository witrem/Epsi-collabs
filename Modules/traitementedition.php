<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php';
session_start();

if (!is_login()) {
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
}

$titre = $_POST['titre'];
$id = $_POST['idarticle'];
$description = $_POST['description'];
$article = $_POST['editor1'];

var_dump($_POST);


$db = Data_base::connect();
$req = $db->prepare("UPDATE `articles` SET Titre = :Titre, Contenu = :Contenu, Description = :Description, etat = 0 where id_Article =:id");
$req->bindParam(':Contenu', $article);
$req->bindParam(':Titre', $titre);
$req->bindParam(':Description', $description);
$req->bindParam(':id', $id);
$req->execute();

header('Location: http://' . $_SERVER['HTTP_HOST'] . '/listarticle_user.php');