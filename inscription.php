<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, userscalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="Css/modal.css">
    <link rel="stylesheet" href="Css/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <title>Epsi Collabs</title>

</head>

<body>


    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
    </script>
    <div id="login-wrapper" class="card mh-auto inscription card-responsive">

        <div class="row alignement">
            <h4>Inscription</h4>
            <div class="col s12">

                <form action="http://<?php echo $_SERVER['HTTP_HOST']; ?>/Modules/TraitementInscription.php" method="POST">
                    <table class="infoprofil">

                        <tbody>
                            <tr>
                                <td>Nom</td>
                                <td>
                                    <div class="input-field inline">
                                        <input name="nom" id="nom" type="text" class="validate">
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>Prénom</td>
                                <td>
                                    <div class="input-field inline">
                                        <input name="prenom" id="prenom" type="text" class="validate">
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>Campus</td>
                                <td>
                                    <div class="input-field col s12">
                                        <select name="campus">
                                            <option value="1">Aras</option>
                                            <option value="2">Bordeau</option>
                                            <option value="3">Brest</option>
                                            <option value="4">Grenoble</option>
                                            <option value="5">Lille</option>
                                            <option value="6">Lyon</option>
                                            <option value="7">Montpellier</option>
                                            <option value="8">Nantes</option>
                                            <option value="9">Paris</option>
                                        </select>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>Niveau</td>
                                <td>
                                    <div class="input-field col s12">
                                        <select name="niveau">
                                            <option value="B1">B1</option>
                                            <option value="B2">B2</option>
                                            <option value="B3">B3</option>
                                            <option value="I4">I4</option>
                                            <option value="I5">I5</option>
                                        </select>

                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input id="nom" name="email" type="email" class="validate">
                                </td>
                            </tr>
                            <tr>
                                <td>Mot de Passe</td>

                                <td>
                                    <input id="password" name="password1" type="password" class="validate">

                                </td>
                            </tr>

                            <tr>
                                <td>Confirmation</td>
                                <td>

                                    <input id="password" name="password2" type="password" class="validate">

                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button id="ins_submit_btn" class="btn" type="submit">valider</button>
                    <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/login.php" class="ml-1 btn red">annuler</a>

                </form>
            </div>
        </div>
    </div>
</body>