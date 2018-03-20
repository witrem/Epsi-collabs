<?php

    class Competence {

        private $id;
        private $name;

        public function __construct($id, $name) {

            $this->id = $id;
            $this->name = $name;

        }

        public function select_print() {

            $db = Data_base::connect();

            $statment = $db->prepare("SELECT * FROM competences");
            
            $statment->execute();

            $answer = $statment->fetchAll(PDO::FETCH_ASSOC);

            foreach ($answer as &$comp) {
                
                echo "<option value=" . $comp['id_Competence'] . ">" . $comp['Nom'] . "</option>";

            }

        }

    };

?>