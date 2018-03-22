<?php

    class Competence {

        private $id;
        private $name;

        public function __construct($id, $name) {

            $this->id = $id;
            $this->name = $name;

        }

        public function select_print_checked_demande($id) {
            
            $db = Data_base::connect();

            $statment = $db->prepare("SELECT * FROM competences");
            
            $statment->execute();

            $answer_comp = $statment->fetchAll(PDO::FETCH_ASSOC);
            
            $statment = $db->prepare("SELECT id_Competence FROM demande WHERE id_Personne = :id");
            
            $statment->execute(array(
                "id" => $id
            ));

            $answer = $statment->fetchAll();
            
            $comp_checked = array();
            
            foreach ($answer as &$comp) {
                $comp_checked[sizeof($comp_checked)] = $comp['id_Competence'];
            }
            
           
            
            foreach ($answer_comp as &$comp) {
                
                echo "<option value=" . $comp['id_Competence'];
                if (in_array($comp['id_Competence'], $comp_checked)){ echo " selected";}
                echo  ">" . $comp['Nom'] . "</option>";

            }
            
        }
        
        public function select_print_checked_propose($id) {
            
            $db = Data_base::connect();

            $statment = $db->prepare("SELECT * FROM competences");
            
            $statment->execute();

            $answer_comp = $statment->fetchAll(PDO::FETCH_ASSOC);
            
            $statment = $db->prepare("SELECT id_Competence FROM propose WHERE id_Personne = :id");
            
            $statment->execute(array(
                "id" => $id
            ));

            $answer = $statment->fetchAll();
            
            $comp_checked = array();
            
            foreach ($answer as &$comp) {
                $comp_checked[sizeof($comp_checked)] = $comp['id_Competence'];
            }
            
           
            
            foreach ($answer_comp as &$comp) {
                
                echo "<option value=" . $comp['id_Competence'];
                if (in_array($comp['id_Competence'], $comp_checked)){ echo " selected";}
                echo  ">" . $comp['Nom'] . "</option>";

            }
            
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

        public function value_print() {

            $db = Data_base::connect();

            $statment = $db->prepare("SELECT * FROM competences");
            
            $statment->execute();

            $answer = $statment->fetchAll(PDO::FETCH_ASSOC);

            foreach ($answer as &$comp) {
                
                echo '<div id="comp-' . $comp['id_Competence'] . '">' . $comp['Nom'] . '</div>';

            }

        }
        
    };

?>