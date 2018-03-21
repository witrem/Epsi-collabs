<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php'; ?>
<div id="modalprofile" class="modal">

    <div class="modal-content">

            <h4 class="titreprofil">Profil</h4>
            <div class="row alignement">

                <div class="col s12">

                    <img src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/Assets/Avatar/" . User::get_avatar_url($_SESSION['user']['id']) ?>" alt="" class="circle responsive-img" width="15%">
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
                                <td>Legeay</td>

                            </tr>
                            <tr>
                                <td>Prénom</td>
                                <td>Alexis</td>

                            </tr>
                            <tr>
                                <td>Campus</td>
                                <td>Nantes</td>

                            </tr>
                            <tr>
                                <td>Niveau</td>
                                <td>B1</td>

                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>alexis.legeay@epsi.fr</td>
                            </tr>
                            <tr>
                                <td>Social</td>
                                <td>https://twitter.com/LegeayAlexis</td>
                            </tr>

                        </tbody>
                    </table>
                    <a class="btn-floating btn-large modal-trigger bg-epsi4 modalbutton modal-action modal-close" href="#">
                        <i class="material-icons">event_available</i>
                    </a>
                    <a class="btn-floating btn-large modal-trigger bg-epsi3 modalbutton modal-action modal-close" href="#modalmodifcomp">
                        <i class="material-icons">build</i>
                    </a>
                    <a class="btn-floating btn-large modal-trigger bg-epsi2 modalbutton modal-action modal-close" href="#modalmodifdate">
                        <i class="material-icons">alarm_add</i>
                    </a>
                    <a class="btn-floating btn-large modal-trigger bg-epsi modalbutton modal-action modal-close" href="#modalmodifprofile">
                        <i class="material-icons">create</i>
                    </a>
                    <a href="#!" class="modal-action modal-close btn-floating btn-large waves-effect waves-light red modalbutton">
                        <i class="material-icons">close</i>
                    </a>

                </div>

            </div>
    </div>
</div>