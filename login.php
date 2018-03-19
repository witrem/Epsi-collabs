<?php 

    // load or reload a session ! have to be the first line
    include 'Include/main.php';
    session_start();

    $erreur = false;

    if(isset($_POST) && isset($_POST['login']) && isset($_POST['password'])) {
        
        if($_POST['login'] == "admin") {
            

            $_SESSION['user']['id'] = "0";
            
           
            $_SESSION['user']['login'] = "admin";
           
           
            $_SESSION['connected'] = true;


            header('Location: http://' . $_SERVER['HTTP_HOST']);
            exit();

        } else {
            
            // mot de passe incorect ou erreur

            $erreur = true;
            
        }

    }

?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, userscalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="Css/login.css">
        <link rel="stylesheet" href="Css/main.css">
        <title>Identifiez-vous</title>

    </head>

    <body>

        <div id="login-wrapper" class="card mh-auto">

            <h1>COLLABS</h1>

            <hr>
            <br>

            <form action="login.php" method="post">

                <label class="login-resp-label">Nom d'Utilisateur</label>
                <div class="input-group mb-3 input-group-login">
                    <div class="input-group-prepend">
                        <span class="input-group-text login-label" style="width: 150px;">Nom d'Utilisateur</span>
                    </div>
                    <input type="text" name="login" class="login-input form-control<?php if ($erreur == true) echo " is-invalid"; ?>" value="<?php if (isset($_COOKIE['login'])) echo $_COOKIE['login'];?>" >
                </div>

                <label class="login-resp-label">Mot De Passe</label>
                <div class="input-group mb-3 input-group-login">
                    <div class="input-group-prepend">
                        <span class="input-group-text login-label" style="width: 150px;">Mot De Passe</span>
                    </div>
                    <input type="password" name="password" class="login-input form-control<?php if ($erreur == true) echo " is-invalid"; ?>"value="<?php if (isset($_COOKIE['login'])) echo $_COOKIE['login'];?>" >
                <?php if ($erreur == true) echo "<div class='invalid-feedback'> Nom d'utilisateur ou mot de passe erroné </div>"; ?>
                </div>

                <div class="w-100-center">
                    <button class="btn" type="submit">connexion</button>
                </div>

            </form>
        
        </div>

    </body>

</html>