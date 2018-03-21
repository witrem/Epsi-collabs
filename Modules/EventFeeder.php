<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Includes/main.php";

    // Afficher les erreurs à l'écran
    ini_set('display_errors', 1);

    if (!isset($_POST) || !isset($_POST['comp']) || !isset($_POST['campus'])) {
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/Erreur/nop.html');
        exit();
    }

    header("Content-type: text/javascript");

    $db = Data_base::connect();

    $statment = $db->prepare("SELECT *, (SELECT Prenom FROM personnes p WHERE p . id_Personne = r . id_Personne) as titre FROM rencontres r WHERE id_Competence = :comp AND id_Campus = :campus");

    $answer = $statment->execute(array(
        ":comp" => $_POST['comp'],
        ":campus" => $_POST['campus']
    ));

    $answer = $statment->fetchAll(PDO::FETCH_ASSOC);

    if ($answer == false) {
        echo "[]";
        exit();
    }

    echo '[';

    for ($cpt = 0; $cpt < sizeof($answer); $cpt++) {
        if($cpt > 0) echo ',';

        Event::print_for_event($answer[$cpt]['titre'], $answer[$cpt]['date_debut'], $answer[$cpt]['date_fin']);

    }

    echo ']';

?>