<?php

    class Data_base {

        public function connect() {
            
            $request = 'mysql:host=localhost;dbname=epsi-collabs;charset=utf8';
            $client = 'webclient';
            $password = 'webpassword';

            try {
    
                return new PDO($request, $client, $password); 
            
            } catch(Exception $e) {
            
                die('Erreur : ' . $e->getMessage());
            
            }
        
        }

        public function login_test($email, $password) {

            $db = Data_base::connect();

            $statement = $db->prepare("SELECT pe . id_Personne, pe . MDP FROM personnes pe WHERE pe . Email = :email");

            $statement->execute(array(":email" => $email));

            $answer = $statement->fetch();

            if ($answer['MDP'] == $password) return $answer; else return false;

        }

    }

?>