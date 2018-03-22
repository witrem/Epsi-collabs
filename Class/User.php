<?php

class User {

    private $id;
    private $nom;
    private $prenom;
    private $level;
    private $campus;
    private $maitrised_comp;
    private $avatar_url;
    private $unmaitrised_comp;
    private $dates;

    public function __construct() {

    }

    public function init($nom, $prenom, $level, $campus, $avatar_url, $id) {

        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->level = $level;
        $this->campus = $campus;
        $this->avatar_url = $avatar_url;
        $this->id = $id;

    }

    public function change_avatar_url($id, $ext) {

        $db = Data_base::connect();

        $req = $db->prepare("UPDATE `personnes` SET `Photo` = :photo WHERE `personnes`.`id_Personne` = :idpersonne");

        $req->execute(array(
            ":idpersonne" => $id,
            ":photo" => $id . "." . $ext
        ));

    }

    public function get_avatar_url($id) {

        $db = Data_base::connect();
        
        $req = $db->prepare("SELECT p . Photo from personnes p where p . id_Personne = :idpersonne");
        
        $req->execute(array(":idpersonne" => $_SESSION['user']['id']));
        
        $answer = $req->fetch();

        return $answer['Photo'];

    }

    public function search_result_print() {
        echo "
            <div class='user shadow border clickable' onclick='document.location.href=\"http://" . $_SERVER['HTTP_HOST'] . "/User.php?id=" . $this->id . "\"'>
                <div>
                    <img src='http://" . $_SERVER['HTTP_HOST'] . '/Assets/Avatar/' .  $this->avatar_url . "' alt='avatar_img'>
                </div>
                <div>
                    <span class='user-name'>" . $this->nom . " - " . $this->prenom . "</span><br>
                    " . $this->level . " - " . $this->campus . "
                </div>
            </div>
        ";

    }

    public function get_campus($id) {

        $db = Data_base::connect();

        $req = $db->prepare("SELECT id_Campus FROM personnes WHERE id_Personne = :id");

        $req->execute(array(":id" => $id));

        $answer = $req->fetch();

        return $answer['id_Campus'];

    }

    public function is_prof() {

        $db = Data_base::connect();

        $req = $db->prepare("SELECT Niveau FROM personnes WHERE id_Personne = :id");

        $req->execute(array(":id" => $_SESSION['user']['id']));

        $answer = $req->fetch();

        if ($answer['Niveau'] == "Prof"){
            return true;
        } else {
            return false;
        }

    }

    public function get_user_info($id) {

        $db = Data_base::connect();

        $req = $db->prepare("SELECT p . id_Personne, p . Nom, p . Prenom, p . Email, p . Niveau, ca . Nom as Nom_Campus, p . Description, p . Social1, p . Social2, p . Social3, p . Photo FROM personnes p
        join campus ca on p . id_campus = ca . id_campus join propose pr on pr . id_Personne = p . id_Personne
        where p . id_Personne = :idpersonne");
        
        $req->bindValue(':idpersonne', $id);
        
        $req->execute();
        
        return $req->fetch();

    }

    public function get_comp_propose($id) {

        $db = Data_base::connect();

        $req = $db->prepare("SELECT cp . Nom FROM personnes p
        join campus ca on p . id_campus = ca . id_campus 
        join propose pr on pr . id_Personne = p . id_Personne
        join competences cp on cp . id_Competence = pr . id_Competence
        where p . id_Personne = :idpersonne");

        $req->bindValue(':idpersonne', $id);
        
        $req->execute();
        
        return $req->fetchAll(PDO::FETCH_ASSOC);

    }

};
?>