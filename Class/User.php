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

    public function __construct($id) {

        $this->id = $id;
        $this->nom = "alexis de parmesan";
        $this->prenom = "witrem du bois joli";
        $this->level = "B1";
        $this->campus = "Nantes";
        $this->avatar_url = "http://localhost:88/Assets/Images/profil.jpg";
    }

    public function search_result_print() {

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

                <div class='user shadow border'>
                    <div>
                        <img src='" . $this->avatar_url . "' alt='avatar_img'>
                    </div>
                    <div>
                        <span class='user-name'>" . $this->nom . " - " . $this->prenom . "</span><br>
                        " . $this->level . " - " . $this->campus . "
                    </div>
                </div>
            ";

            echo "
                <div class='user shadow border'>
                    <div>
                        <img src='" . $this->avatar_url . "' alt='avatar_img'>
                    </div>
                    <div>
                        <span class='user-name'>" . $this->nom . " - " . $this->prenom . "</span><br>
                        " . $this->level . " - " . $this->campus . "
                    </div>
                </div>
            ";

        public function get_campus($id) {

            $db = Data_base::connect();

            $req = $db->prepare("SELECT id_Campus FROM personnes WHERE id_Personne = :id");

            $req->execute(array(":id" => $id));

            $answer = $req->fetch();

            return $answer['id_Campus'];

        }



;
?>