<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Includes/main.php";

    if (isset($_POST)) {

        $first = true;

        $request = "SELECT pe . Nom, pe . id_Personne, pe . Photo, pe . Prenom, pe . Niveau, ca . Nom as campus_name FROM personnes pe
            join propose pr on pe . id_Personne = pr . id_Personne
            join competences c on c . id_Competence = pr . id_Competence
            join campus ca on ca . id_Campus = pe . id_Campus
            where ";

        if (isset($_POST['comp'])) {

            if ($first) {
                $first = false;
            } else {
                $request .= ' AND ';
            }
            
            $request .= 'c . id_Competence = :comp';
            $data[':comp'] = $_POST['comp'];

        }

        if (isset($_POST['lvl'])) {

            if ($first) {
                $first = false;
            } else {
                $request .= ' AND ';
            }

            $request .= "pe . Niveau = :lvl";

            $data[':lvl'] = $_POST['lvl'];

        }

        if (isset($_POST['campus'])) {

            if ($first) {
                $first = false;
            } else {
                $request .= ' AND ';
            }

            $request .= "ca . id_Campus = :campus";

            $data[':campus'] = $_POST['campus'];

        }

        if (isset($_POST['user'])) {
            
            if ($first) {
                $first = false;
            } else {
                $request .= ' AND ';
            }

            $request .= "pe . Email LIKE :user";

            $data[':user'] = "\"%" . $_POST['user'] . "%\"";

        }

        $db = Data_base::connect();

        $statment = $db->prepare($request . ' GROUP BY pe . id_Personne');

        $statment->execute($data);

        $answer = $statment->fetchAll(PDO::FETCH_ASSOC);

        foreach($answer as &$user) {

            $tmp_user = new User;
            $tmp_user->init($user['Nom'], $user['Prenom'], $user['Niveau'], $user['campus_name'], $user['Photo'], $user['id_Personne']);
            $tmp_user->search_result_print();

        }

        exit();

    }
    
    // pas de POST
    
    echo "nop";

?>