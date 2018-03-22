<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php'; ?>
<div id="modalmodifprofile" class="modal modal-fixed-footer">

    <div class="modal-content">

        <?php
            $result = User::get_user_info($_SESSION['user']['id']);
        ?>

        <h4 class="titreprofil">Profil</h4>
        <div class="row alignement">

            <div class="col s12">

                <img src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/Assets/Avatar/" . User::get_avatar_url($_SESSION['user']['id']) ?>" alt="" class="circle responsive-img" width="15%">

                <form action="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/Modules/UploadAvatar.php'?>" method="post" enctype="multipart/form-data" >
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
                                <input id="social1" name="social1" type="text" value="<?php echo $result['Social1'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Social 2</td>
                            <td>
                                <input id="social2" name="social2" type="text" value="<?php echo $result['Social2'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Social 3</td>
                            <td>  
                                <input id="social3" name="social3" type="text" value="<?php echo $result['Social3'] ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Description</td>
                            <td>  
                                <textarea id="comments" class="materialize-textarea" length="200" name="description"><?php echo $result['Description']; ?></textarea>
                                <script>
                                    $(document).ready(function () {
                                        $('input#input_text, textarea#textarea1').characterCounter();
                                    });
                                </script>
                            </td>    			
                        </tr>
                    </tbody>
                </table>        
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a onclick='submit_profilmodif()' class="btn-floating modal-close btn-large waves-effect waves-light bg-epsi modalbutton"><i class="material-icons">autorenew</i></a>
        <div class="ml-1 inline"></div>
        <a class="modal-action modal-close btn-floating btn-large waves-effect waves-light red  modalbutton"><i class="material-icons">close</i></a>
    </div>
</div>