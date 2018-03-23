<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php'; 
    session_start();

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

</head>
<body>
    <script>
        $(document).ready(function(){
            $('.modal-trigger').leanModal();
            $('select').material_select();
        });
    </script>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Includes/nav.php" ?>

    <?php
        $idsession = $_SESSION['user']['id'];

        $db = Data_base::connect();
        $req = $db->prepare("Select ID_Groupes from invitations where ID_User = :idpersonne");
        $req->bindValue(':idpersonne', $idsession);
        $req->execute();
        $resultat = $req->fetchAll();
    ?>
        <div class="listuser">
            <div id="login-wrapper" class="card mh-auto">
                <div class="row alignement">
                    <div class="col s12">
                        <div id="test1" class="col s12">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Mes Messages Privés</th>

                                    </tr>
                                </thead>
                                <tbody>

                                <?php

                                    foreach ($resultat as $ligne) {

                                        $idg = $ligne['ID_Groupes'];
                                        
                                        $req = $db->prepare("Select i.ID_User,p.Nom,p.Prenom,p.Photo from invitations i
                                            join personnes p on p.id_Personne= i.ID_User
                                            where `ID_Groupes`= :idg AND ID_User != :idpersonne");
                                        $req->bindValue(':idg', $ligne['ID_Groupes']);
                                        $req->bindValue(':idpersonne', $idsession);
                                        $req->execute();
                                        $info = $req->fetch();

                                        echo "<tr><td><img src='/Assets/Avatar/$info[3]' alt='' class='circle responsive-img photo' width='10%'><a href='messagerie.php?idg=$idg'>", $info[1], " ", $info[2], "</a></tr></td>";
                                    
                                    }
                                ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if (!(isset($_GET['idg']))) {
                
            } else {
        ?>
            <div id="message-wrapper" class="modal-content">
                <div id="login-wrapper" class="card mh-auto">
                    <div class="row alignement">
                        <div class="col s12">
                            <div id="test1" class="col s12">
                                <table class="listmsg">
                                    <thead>
                                        <tr>
                                            <th>Messages</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                            if (isset($_GET['idg'])) {
                                                
                                                $idg = $_GET['idg'];

                                                $req = $db->prepare("select * from messages where ID_Groupes= :ID_Groupes");
                                                $req->bindParam(':ID_Groupes', $idg);
                                                $req->execute();
                                                $messages = $req->fetchAll();

                                            foreach ($messages as $message) {

                                                $message['Date'] = date("d/m/y G:i", strtotime($message['Date']));

                                                echo "<tr><td>";
                                                if ($message['ID_User'] == $idsession) {
                                                    echo"
                                                        <div class='col s8 profiluser message1'>
                                                            <div class='card-panel cyan'>
                                                                <span class='white-text'>";

                                                    echo '[' . $message['Date'] . '] ', $message['Contenu'], "<br>";
                                                } else {
                                                    echo "<div class='col s4'></div>
                                            <div class='col s8 profiluser message1'>
                                                <div class='card-panel  orange darken-3'>
                                                    <span class='white-text'>";
                                                    echo $message['Contenu'], ' [' . $message['Date'] . "]<br>";
                                                }
                                                    echo "</span>
                                                    </div>
                                                </div>
                                                </td>
                                                </tr>";
                                                }
                                            }
                                        ?>


                                    </tbody>
                                </table>

                            </div>



                        </div>





                    </div>
                    <?php
                
                $req = $db->prepare("Select p.Nom,p.Prenom from invitations i
                join personnes p on p.id_Personne= i.ID_User
                where `ID_Groupes`= :idg AND ID_User != :idpersonne");
                $req->bindValue(':idg', $idg );
                $req->bindValue(':idpersonne', $idsession);
                $req->execute();
                $mname = $req->fetch();
                ?>
                        <form action="Modules/newmessage.php" method="POST">

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <textarea id="icon_prefix2" name="msg" class="materialize-textarea message1 mh-auto"></textarea>
                                    <input name="ID_Groupes" type="hidden" value="<?php echo $idg; ?>">
                                    <label for="icon_prefix2">Ton message à
                                        <?php echo $mname['Nom'],' ',$mname['Prenom']; ?>
                                    </label>
                                    <button class="btn-floating btn-large bg-epsi5 boutonmsg" type="submit">
                                        <i class="material-icons">email</i>
                                    </button>
                                </div>
                            </div>
                        </form>

                </div>
            </div>
            <?php } ?>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_profil.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifprofil.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifdate.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Modals/m_modifcomp.php'; ?>

    <script src="Js/modals.js"></script>
    
</body>