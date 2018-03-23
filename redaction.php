<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php';

session_start();

if (!is_login()) {
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
}
?>
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
    <script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script>
    <title>Epsi Collabs</title>

</head>
<form action="Modules/traitementarticle.php" method="post">
    <div id="login-wrapper" class="card mh-auto inscription">       
        <h3 class="center-align">Créer un article</h3>
        <div class="row alignement">
            <div class="row">
                <div class="col s3">
                    <p>Titre</p>

                    <textarea id="textarea1" name="titre" class="materialize-textarea"></textarea>
                </div>
            </div>
            <?php
            $db = Data_base::connect();

            $req = $db->prepare("SELECT * FROM competences");
            $req->execute();
            $resultat = $req->fetchAll();
            ?>



            <div class="input-field col s12">
                <select multiple name="comp[]">

                    <?php
                    foreach ($resultat as $competence) {
                        echo "<option value='";
                        echo $competence['id_Competence'];
                        echo "'>";
                        echo $competence['Nom'];
                        echo"</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="row">
                <div class="col s6">
                    <p>Description</p>
                    <textarea id="textarea1" name="description" class="materialize-textarea"></textarea>
                </div>
            </div>
            <textarea id="editor1" name="editor1" cols="80" rows="800"></textarea>
            <br>
            <button class="waves-effect waves-light btn" type="submit"><i class="material-icons">beenhere</i> Enregistrer</button>
            </form>
            <a href="listarticle_user.php" class="waves-effect waves-light btn ">Liste Article</a>
           

            <script>


                $(document).ready(function () {
                    $('select').material_select();
                });


                CKEDITOR.replace('editor1', {height: '100%'});

                var data = CKEDITOR.instances.editor1.getData();





            </script>    


        </div>
         <br>
    </div>
</html>