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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
    <link rel="stylesheet" href="noUiSlider/nouislider.css">
    <link rel="stylesheet" href="Css/modal.css">
    <link rel="stylesheet" href="Css/calendar.css">
    <link rel="stylesheet" href="Css/main.css">
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script src='fullcalendar/lib/moment.min.js'></script>
    <script src='fullcalendar/fullcalendar.js'></script>
    <script src='fullcalendar/locale/fr.js'></script>   
    <script src="noUiSlider/nouislider.js"></script>

    <title>Epsi Collabs</title>

</head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Includes/nav.php" ?>
<body>
    <script>
        $(document).ready(function(){
            $('.modal-trigger').leanModal();
            $('select').material_select();
        });
    </script>
    <?php
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = $_SESSION['user']['id'];
        }
        $result = User::get_user_info($id);

    ?>

    <div id="login-wrapper" class="card mh-auto profiluser card-responsive"> 
        <div class="row alignement">

            <div class="col s12 p-no">
                <nav class="nav-extended bg-epsi3">

                    <div class="nav-content">
                        <ul class="tabs tabs-transparent">
                            <li class="tab"><a href="#test1">Profil</a></li>
                            <li class="tab"><a href="#test2">Calendrier</a></li>
                            <li class="tab"><a href="#test3">Contact</a></li>

                        </ul>
                    </div>
                </nav>
                <div id="test1" class="col s12">

                    <img src="/Assets/Avatar/<?php echo $result[0]['Photo']; ?>" alt="" class="circle responsive-img photo" width="15%">
                    <table class="infoprofil">

                        <thead>
                            <tr>
                                <th>Infos</th>
                                <th>Données</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Nom</td>
                                <td><?php echo $result['Nom']; ?></td>

                            </tr>
                            <tr>
                                <td>Prénom</td>
                                <td><?php echo $result['Prenom']; ?></td>

                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><?php echo $result['Description']; ?></td>

                            </tr>
                            <tr>
                                <td>Campus</td>
                                <td><?php echo $result['Nom_Campus']; ?></td>

                            </tr>
                            <tr>
                                <td>Niveau</td>
                                <td><?php echo $result['Niveau']; ?></td>

                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $result['Email']; ?></td>
                            </tr>
                            <tr>
                                <td>Social 1</td>
                                <td><?php echo $result['Social1']; ?></td>
                            </tr>
                            <tr>
                                <td>Social 2</td>
                                <td><?php echo $result['Social2']; ?></td>
                            </tr>
                            <tr>
                                <td>Social 3</td>
                                <td><?php echo $result['Social3']; ?></td>
                            </tr>

                        </tbody>
                    </table> 
                    <div class="Talents">
                        <p class="comptext">Super Pouvoir</p>

                        <?php

                            $result = User::get_comp_propose($id);
                            foreach ($result as $ligne) {
                                echo "<div class='chip'>",$ligne['Nom'],"</div>";
                            }
                        
                        ?>
                        
                    </div>
                </div>
                <div id="test2" class="col s12">SOON</div>
                <div id="test3" class="col s12">
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12 messagerie">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <textarea id="icon_prefix2" class="materialize-textarea "></textarea>
                                    <label for="icon_prefix2">Ton message</label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <a class="btn-floating btn-large modal-trigger bg-epsi5 modalbutton modal-action modal-close" href="#"><i class="material-icons">email</i></a>

                </div>
            </div>

        </div>
    
      
</body>

