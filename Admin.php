<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Modules/config.php'; ?>
<html lang="fr">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, userscalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="Css/main.css">
        <link rel="stylesheet" href="Css/modal.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <title>Epsi Collabs</title>

    </head>
    <body>
        <?php
        $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        $req = $db->prepare("SELECT * FROM competences");
        $req->execute();
        $resultat = $req->fetchAll();
        ?>


        <script>

            $(document).ready(function () {
                $('select').material_select();
            });

        </script>

        <div id="login-wrapper" class="card mh-auto inscription"> 

            <div class="row alignement">
                <h4>Parametrage</h4>
                <div class="col s12">


                    <table class="infoprofil">

                        <tbody>

                            <tr>
                                <td>Compétences existante</td>

                                <td>
                                    <div class="input-field col s12">
                                        <select>

                                            <?php
                                            foreach ($resultat as $competence) {

                                                echo "<option disabled>", $competence['Nom'], "</option>";
                                            }
                                            ?>


                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Ajouter Compétence</td>

                                <td>
                                    <form action="TraitementAdmin.php" method="POST">
                                        <div class="input-field inline">
                                            <input name="addcomp" id="nom" type="text" class="validate">

                                            <button class="btn waves-effect waves-light bg-epsi3" type="submit">Créer
                                                <i class="material-icons right">add</i>
                                            </button>

                                        </div>
                                    </form>
                                </td>

                            </tr>

                            <tr>
                                <td>Ajouter Prof</td>
                                <td>
                                    <form action="TraitementAdmin.php" method="POST">
                                        <div class="input-field inline">
                                            <input name="addprof" id="nom" type="text" placeholder="Email Inscription" class="validate">

                                            <button class="btn waves-effect waves-light bg-epsi2" type="submit">Ajouter
                                                <i class="material-icons right">person_add</i>
                                            </button>

                                        </div>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>Modifier Niveau Etudiant</td>
                                <td><form action="TraitementAdmin.php" method="POST">
                                        <div class="input-field inline">


                                            <select name="niveau">

                                                <option value="B1">B1</option>
                                                <option value="B2">B2</option>
                                                <option value="B3">B3</option>
                                                <option value="I4">I4</option>
                                                <option value="I5">I5</option>
                                            </select>

                                            <input name="change_niveau" id="nom"  placeholder="Email Inscription" type="text" class="validate">


                                            <button class="btn waves-effect waves-light bg-epsi5" type="submit">Changer
                                                <i class="material-icons right">assignment_ind</i>
                                            </button>

                                        </div>
                                    </form></td>

                            </tr>






                        </tbody>

                    </table>

                </div>
            </div>
    </body>
