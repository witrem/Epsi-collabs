<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php';

session_start();

if (!is_login()) {
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
}

$idcomp = $_POST['idcomp'];

$db = Data_base::connect();
$req = $db->prepare("Select * from articles a 
join tag g on g.id_Article=a.id_Article
where a.etat='2' AND g.id_Competence= :idcomp  ");
$req->bindParam(':idcomp', $idcomp);
$req->execute();
$resultat = $req->fetchAll();
echo '<ul class="collection">';
foreach ($resultat as $ligne) {

    $req = $db->prepare("SELECT Nom from tag g join competences c on c.id_Competence = g.id_Competence where id_Article = :idcomp ");
    $req->bindParam(':idcomp', $ligne['id_Article']);
    $req->execute();
    $nbcomp = $req->fetchAll();

    echo '<li class="collection-item liste">';
    echo '<b><h4>' . $ligne['Titre'] . '</b></h4><br>';
    echo $ligne['Description'] . '<br>';
    
    foreach ($nbcomp as $comp) {
        echo '<div class="chip">',$comp['Nom'],'</div>';   
    }
    
    echo '<form action="article.php" method="GET">';
    echo '<input name="article" type="hidden" value="' . $ligne['id_Article'] . '">';
    echo '<button class="waves-effect waves-light btn listebouton bg-epsi3" type="submit"><i class="material-icons right">arrow_forward</i>Lire la suite</button>';
    echo '</form>';
    echo '</li>';

}

echo '</li>';

?>