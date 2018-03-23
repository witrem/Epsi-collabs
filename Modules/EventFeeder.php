<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Includes/main.php";

    // Afficher les erreurs à l'écran
    ini_set('display_errors', 1);

    if (!isset($_POST) || !isset($_POST['arg1']) || !isset($_POST['arg2'])) {
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/Erreur/nop.html');
        exit();
    }

    header("Content-type: text/javascript");

    $db = Data_base::connect();

    // check call calendar

    if ($_POST['arg1'] == 'user') {
        
        $statment = $db->prepare("SELECT *, (SELECT Nom FROM competences cp WHERE cp . id_Competence = r . id_Competence) as titre FROM rencontres r WHERE id_Personne = :id");

        $statment->execute(array(
            ":id" => $_POST['arg2']
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

        exit();

    }

    $statment = $db->prepare("SELECT *, (SELECT Prenom FROM personnes p WHERE p . id_Personne = r . id_Personne) as titre FROM rencontres r WHERE id_Competence = :comp AND id_Campus = :campus");

    $statment->execute(array(
        ":comp" => $_POST['arg1'],
        ":campus" => $_POST['arg2']
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