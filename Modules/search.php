<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Includes/main.php";

    if (isset($_POST)) {

        if (isset($_POST['comp'])) {

            $request = "SELECT pe . Nom, pe . Photo, pe . Prenom, pe . Niveau, ca . Nom as campus_name, c . Nom as Nom_Competence FROM personnes pe
            join propose pr on pe . id_Personne = pr . id_Personne
            join competences c on c . id_Competence = pr . id_Competence
            join campus ca on ca . id_Campus = pe . id_Campus
            where c . id_Competence = :comp";

            $data[':comp'] = $_POST['comp'];

            if (isset($_POST['lvl'])) {

                $request .= " and pe . Niveau = :lvl";

                $data[':lvl'] = $_POST['lvl'];

            }

            if (isset($_POST['campus'])) {

                $request .= " and ca . id_Campus = :campus";

                $data[':campus'] = $_POST['campus'];

            }

            $db = Data_base::connect();

            $statment = $db->prepare($request);

            $statment->execute($data);

            $answer = $statment->fetchAll(PDO::FETCH_ASSOC);

            foreach($answer as &$user) {

                $user = new User;
                $user->init($user['Nom'], $user['Prenom'], $user['Niveau'], $user['campus_name'], $user['Photo']);
                $user->search_result_print();

            }

            exit();

        }

    }
    
    // pas de POST
    
    echo "nop";

?>