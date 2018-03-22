<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Modules/config.php'; ?>
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
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Includes/nav.php" ?>
<body>

    <div class="modal-content">
        <?php
        $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $req = $db->prepare("select p.Nom,p.Prenom,p.Email,p.Niveau,ca.Nom as Nom_Campus,p.Description,p.Social1,p.Social2,p.Social3,p.Photo, co.Nom as Nom_Competence from personnes p "
                . "join campus ca on p.id_campus = ca.id_campus join propose pr on pr.id_Personne=p.id_Personne "
                . "join competences co on co.id_Competence=pr.id_Competence "
                . "where p.id_Personne= :idpersonne");
        $req->bindValue(':idpersonne', 6);
        $req->execute();
        $resultat = $req->fetchAll();
        ?>

        <div id="login-wrapper" class="card mh-auto profiluser"> 
            <div class="row alignement">

                <div class="col s12">
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

                        <img src="/Assets/Avatar/<?php echo $resultat[0]['Photo']; ?>" alt="" class="circle responsive-img photo" width="15%">
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
                                    <td><?php echo $resultat[0]['Nom']; ?></td>

                                </tr>
                                <tr>
                                    <td>Prénom</td>
                                    <td><?php echo $resultat[0]['Prenom']; ?></td>

                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td><?php echo $resultat[0]['Description']; ?></td>

                                </tr>
                                <tr>
                                    <td>Campus</td>
                                    <td><?php echo $resultat[0]['Nom_Campus']; ?></td>

                                </tr>
                                <tr>
                                    <td>Niveau</td>
                                    <td><?php echo $resultat[0]['Niveau']; ?></td>

                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $resultat[0]['Email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Social 1</td>
                                    <td><?php echo $resultat[0]['Social1']; ?></td>
                                </tr>
                                <tr>
                                    <td>Social 2</td>
                                    <td><?php echo $resultat[0]['Social2']; ?></td>
                                </tr>
                                <tr>
                                    <td>Social 3</td>
                                    <td><?php echo $resultat[0]['Social3']; ?></td>
                                </tr>

                            </tbody>
                        </table> 
                        <div class="Talents">
                            <p class="comptext">Super Pouvoir</p>
                            <?php
                                    foreach ($resultat as $ligne) {
                                        
                                        echo "<div class='chip'>",$ligne['Nom_Competence'],"</div>";
                                    }
                            ?>
                            
                            
                          
                        </div>
                    </div>
                    <div id="test2" class="col s12">SOON</div>
                    <div id="test3" class="col s12">
                         <form action="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/Modules/addmessagerie.php'; ?>" method="POST">
                        <div class="row">
                          
                                <div class="row">
                                    
                                    <div class="input-field col s12 messagerie">
                                        <i class="material-icons prefix">mode_edit</i>
                                       
                                        <textarea id="icon_prefix2" name="msg" class="materialize-textarea "></textarea>
                                        <input name="ID_User" type="hidden" value="11"> <!--INSERER ID DE L'USER SELECT -->
                                        <label for="icon_prefix2">Ton message</label>
                                       
                                    </div>
                                   
                                </div>
                            
                        </div>

                        <button class="btn-floating btn-large modal-trigger bg-epsi5 modalbutton modal-action modal-close" type="submit"><i class="material-icons">email</i></button>
                         </form>
                    </div>
                </div>

            </div>
        </div>
      
</body>

