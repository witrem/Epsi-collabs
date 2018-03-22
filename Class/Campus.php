<?php

    class Campus {

        private $id;
        private $name;

        public function select_print() {

            $db = Data_base::connect();

            $statment = $db->prepare("SELECT * FROM campus");
            
            $statment->execute();

            $answer = $statment->fetchAll(PDO::FETCH_ASSOC);

            $campus = User::get_campus($_SESSION['user']['id']);

            foreach ($answer as &$comp) {
                
                echo "<option value=" . $comp['id_Campus'];
                if ($comp['id_Campus'] == $campus) echo ' selected';
                echo ">" . $comp['Nom'] . "</option>";

            }

        }

        public function value_print() {

            $db = Data_base::connect();

            $statment = $db->prepare("SELECT * FROM campus");
            
            $statment->execute();

            $answer = $statment->fetchAll(PDO::FETCH_ASSOC);

            foreach ($answer as &$comp) {
                
                echo '<div id="campus-' . $comp['id_Campus'] . '">' . $comp['Nom'] . '</div>';

            }

        }

    };

?>