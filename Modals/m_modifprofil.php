<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php'; ?>
<div id="modalmodifprofile" class="modal">

    <div class="modal-content">

        <?php
        $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $req = $db->prepare("select p.Photo from personnes p where p.id_Personne= :idpersonne");
        $req->bindValue(':idpersonne', 2);
        $req->execute();
        $resultat = $req->fetchAll();
        ?>

        <h4 class="titreprofil">Profil</h4>
        <div class="row alignement">

            <div class="col s12">

                <img src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/Assets/Avatar/" . User::get_avatar_url($_SESSION['user']['id']) ?>" alt="" class="circle responsive-img" width="15%">

                <form action="UploadAvatar.php" method="post" enctype="multipart/form-data" >
                    <div class="file-field input-field">
                        <div class="btn bg-epsi">
                            <span>File</span>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <button class="btn bg-epsi alignementbtn" type="submit" name="submit">Changer d'avatar</button>
                </form>





                <table class="infoprofil">

                        <tbody>

                            <tr>
                                <td>Social 1</td>
                                <td>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input name="social1" type="text" value="<?php echo $resultat[0]['Social1'] ?>">
                                        </div>
                                    </div>  
                                </td>
                            </tr>
                            <tr>
                                <td>Social 2</td>
                                <td>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input name="social2" type="text" value="<?php echo $resultat[0]['Social2'] ?>">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Social 3</td>
                                <td>  
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input name="social3" type="text" value="<?php echo $resultat[0]['Social3'] ?>">
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td>  <div class = "row">
                                        <div class = "input-field col s12">
                                            <textarea id = "comments" class = "materialize-textarea" length = "200" name="description"><?php echo $resultat[0]['Description']; ?></textarea>
                                            <script>
                                                $(document).ready(function () {
                                                    $('input#input_text, textarea#textarea1').characterCounter();
                                                });


                                            </script>
                                        </div>          
                                    </div></td>    			
                            </tr>


                <a class="btn-floating btn-large waves-effect waves-light bg-epsi  modalbutton"><i class="material-icons">autorenew</i></a>

                <a class="modal-action modal-close btn-floating btn-large waves-effect waves-light red  modalbutton"><i class="material-icons">close</i></a>

            </div>
        </div>

    </div>
</div>