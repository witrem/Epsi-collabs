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


<body>
    <?php
    $idsession = 10;


    $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $req = $db->prepare("Select ID_Groupes from Invitations where ID_User = :idpersonne");
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
        <div class="modal-content inscription">


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
    if (!(isset($_GET['idg']))) {
        
    } else {

        $idg = $_GET['idg'];

        $req = $db->prepare("select * from messages where ID_Groupes= :ID_Groupes");
        $req->bindParam(':ID_Groupes', $idg);
        $req->execute();
        $messages = $req->fetchAll();

        foreach ($messages as $message) {


            $message['Date'] = date("d/m/y G:i", strtotime($message['Date']));
            echo "<tr><td>";
            if ($message['ID_User'] == $idsession) {
                echo"<div class='col s8 profiluser message1'>
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

                <form action="newmessage.php" method="POST">

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="icon_prefix2" name="msg" class="materialize-textarea message1 mh-auto"></textarea>
                            <input name="ID_Groupes" type="hidden" value="<?php echo $idg; ?>">
                            <label for="icon_prefix2">Ton message</label>
                            <button class="btn-floating btn-large bg-epsi5 boutonmsg" type="submit"><i class="material-icons">email</i></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
<?php } ?>
</body>

