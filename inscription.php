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
        <?php include "Includes/nav.php" ?>

        <script>
            $(document).ready(function () {
                $('select').material_select();
            });

        </script>
        <div id="login-wrapper" class="card mh-auto inscription"> 
               
            <div class="row alignement">
                <h4>Inscription</h4>
                <div class="col s12">


                    <table class="infoprofil">
                        <form action="" method="">
                        <tbody>
                            <tr>
                                <td>Nom</td>
                                <td><div class="input-field inline">
                                        <input id="nom" type="text" class="validate"></div></td>

                            </tr>
                            <tr>
                                <td>Prénom</td>
                                <td><div class="input-field inline">
                                        <input id="prenom" type="text" class="validate"></div></td>

                            </tr>
                            <tr>
                                <td>Campus</td>
                                <td><div class="input-field col s12">
                                        <select>

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

                                    </div></td>

                            </tr>
                            <tr>
                                <td>Niveau</td>
                                <td><div class="input-field col s12">
                                        <select>

                                            <option value="1">B1</option>
                                            <option value="2">B2</option>
                                            <option value="3">B3</option>
                                            <option value="4">I4</option>
                                            <option value="5">I5</option>
                                        </select>

                                    </div></td>

                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input id="nom" type="email" class="validate"></td>
                            </tr>


                        </tbody>
                        
                    </table>
                    <button class="btn-floating btn-large waves-effect waves-light purple darken-2" type="submit"><i class="material-icons">create</i></button>
                    </form>
                </div>
            </div>
    </body>
