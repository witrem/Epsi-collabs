<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php';

session_start();

if (!is_login()) {
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
}
?>

<html>

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


    <?php
    if (isset($_POST['editarticle'])) {

        $db = Data_base::connect();
        $req = $db->prepare("select * from articles where id_Article=:id");
        $req->bindParam(':id', $_POST['editarticle']);
        $req->execute();
        $resultat = $req->fetch();
        $db = null;

        $id = $resultat['id_Article'];
    }
    ?>
    <div id="login-wrapper" class="card mh-auto inscription">       
        <h3 class="center-align">Edition Article</h3>
        <div class="row alignement">
            <form action="Modules/traitementedition.php" method="post">

                <div class="row">
                    <div class="col s3">
                        <p>Titre</p>

                        <textarea id="textarea1" name="titre" class="materialize-textarea"><?php echo $resultat['Titre']; ?></textarea>
                    </div>
                </div>

                <div class="input-field col s12">

                </div>

                <div class="row">
                    <div class="col s6">
                        <p>Description</p>
                        <textarea id="textarea1" name="description" class="materialize-textarea"><?php echo $resultat['Description']; ?></textarea>
                    </div>
                </div>
                <input type="hidden" name="idarticle" value="<?php echo $id; ?>">

                <textarea id="editor1" name="editor1" cols="80" rows="800">
                    <?php echo $resultat['Contenu']; ?>
                </textarea>
                <br>
                <button class="waves-effect waves-light btn" type="submit"><i class="material-icons">beenhere</i> Enregistrer</button>
            </form>
        </div>
        <br>
    </div>

    <script>

        CKEDITOR.replace('editor1', {height: '100%'});

        var data = CKEDITOR.instances.editor1.getData();


    </script>

</html>