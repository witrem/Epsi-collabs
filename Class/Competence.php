<?php

    class Competence {

        private $id;
        private $name;

        public function __construct($id, $name) {

            $this->id = $id;
            $this->name = $name;

        }

        public function select_print($id, $name) {

            echo "<option value=" . $id . ">" . $name . "</option>";

        }

    };

?>