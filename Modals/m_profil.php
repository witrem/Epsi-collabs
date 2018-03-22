<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php'; ?>
<div id="modalprofile" class="modal modal-fixed-footer">

    <div class="modal-content">

        <?php
            $result = User::get_user_info($_SESSION['user']['id']);
        ?>

        <h4 class="titreprofil">Profil</h4>
        <div class="row alignement">

            <div class="col s12">

                <img src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/Assets/Avatar/" . User::get_avatar_url($_SESSION['user']['id']) ?>" alt="" class="circle profil-img" width="15%">
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
                        <td>
                            <?php echo $result['Nom']; ?>
                        </td>

                    </tr>
                    <tr>
                        <td>Prénom</td>
                        <td>
                            <?php echo $result['Prenom']; ?>
                        </td>

                    </tr>
                    <tr>
                        <td>Campus</td>
                        <td>
                            <?php echo $result['Nom_Campus']; ?>
                        </td>

                    </tr>
                    <tr>
                        <td>Niveau</td>
                        <td>
                            <?php echo $result['Niveau']; ?>
                        </td>

                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <?php echo $result['Email']; ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="ml-1 inline"></div>
        <a class="btn-floating btn-large modal-trigger bg-epsi3 modalbutton modal-action" href="#modalmodifcomp">
            <i class="material-icons">build</i>
        </a>
        <div class="ml-1 inline"></div>
        <a class="btn-floating btn-large modal-trigger bg-epsi2 modalbutton modal-action" href="#modalmodifdate">
            <i class="material-icons">alarm_add</i>
        </a>
        <div class="ml-1 inline"></div>
        <a class="btn-floating btn-large modal-trigger bg-epsi modalbutton modal-action" href="#modalmodifprofile">
            <i class="material-icons">create</i>
        </a>
        <div class="ml-1 inline"></div>
        <a class="btn-floating btn-large modal-action modal-close red modalbutton" href="#!">
            <i class="material-icons">close</i>
        </a>
    </div>
</div>