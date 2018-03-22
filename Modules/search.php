<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . "/Includes/main.php";

    if (isset($_GET)) {

        $first = true;

        $request = "SELECT pe.Nom, pe.id_Personne, pe.Photo, pe.Prenom, pe.Niveau, (SELECT Nom from campus ca WHERE ca.id_Campus = pe.id_Campus) as campus_name 
            FROM personnes pe";

        if (isset($_GET['comp'])) {

            if ($first) {
                $first = false;
            } else {
                $request .= ' AND ';
            }
            
            $request .= ' JOIN propose pr ON pr.id_Personne = pe.id_Personne
            WHERE EXISTS (SELECT :comp as id_Competence)';
            $data[':comp'] = $_GET['comp'];

        }

        if (isset($_GET['lvl'])) {

            if ($first) {
                $first = false;
                $request .= ' WHERE ';
            } else {
                $request .= ' AND ';
            }

            $request .= "pe.Niveau = :lvl";

            $data[':lvl'] = $_GET['lvl'];

        }

        if (isset($_GET['campus'])) {

            if ($first) {
                $first = false;
                $request .= ' WHERE ';
            } else {
                $request .= ' AND ';
            }

            $request .= "pe.id_Campus = :campus";

            $data[':campus'] = $_GET['campus'];

        }

        if (isset($_GET['user'])) {
            
            if ($first) {
                $first = false;
                $request .= ' WHERE ';
            } else {
                $request .= ' AND ';
            }

            $request .= "pe.Email LIKE :perso";

            $data[':perso'] = "%" . $_GET['user'] . "%";

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