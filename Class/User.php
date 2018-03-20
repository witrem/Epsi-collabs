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

        }

    };

?>