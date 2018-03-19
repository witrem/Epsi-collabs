<?php

    class Campus {

        private $id;
        private $name;

        public function select_print() {

            $db = Data_base::connect();

            $statment = $db->prepare("SELECT * FROM campus");
            
            $statment->execute();

            $answer = $statment->fetchAll(PDO::FETCH_ASSOC);

            foreach ($answer as &$comp) {
                
                echo "<option value=" . $comp['id_Campus'] . ">" . $comp['Nom'] . "</option>";

            }

        }

    };

?>