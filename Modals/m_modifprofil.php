<div id="modalmodifprofile" class="modal">

    <div class="modal-content">
        <script>
              $(document).ready(function() {
    $('select').material_select();
  });
            
            </script>
        <h4 class="titreprofil">Profil</h4>
        <div class="row alignement">

            <div class="col s12">

                <img src="Assets/Images/profil.jpg" alt="" class="circle responsive-img" width="15%">
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
                            <td><div class="input-field inline">
                                    <input id="prenom" type="text" class="validate" placeholder="Alexis"></div></td>

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
                            <td>alexis.legeay@epsi.fr</td>
                        </tr>
                        <tr>
                            <td>Social</td>
                            <td>https://twitter.com/LegeayAlexis</td>
                        </tr>

                    </tbody>
                </table>


                <a class="btn-floating btn-large waves-effect waves-light purple darken-2">
                    <i class="material-icons">autorenew</i>
                </a>

            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
        </div>
    </div>
</div>