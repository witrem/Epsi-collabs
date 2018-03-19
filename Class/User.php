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
            $this->nom = "alexis";
            $this->prenom = "witrem";
            $this->level = "B1";
            $this->campus = "Nantes";
            $this->avatar_url = "http://localhost:88/Assets/Images/profil.jpg";

        }

        public function search_result_print() {

            echo "
                <div class='card-panel grey lighten-5 z-depth-1'>
                    <div class='row valign-wrapper'>
                        <div class='col s2'>
                            <img src='images/yuna.jpg' alt='avatar_img' class='circle responsive-img'>
                        </div>
                        <div class='col s10'>
                            <span class='black-text'>
                                This is a square image. Add the 'circle' class to it to make it appear circular.
                            </span>
                        </div>
                    </div>
                </div>
            ";

        }

    };

?>