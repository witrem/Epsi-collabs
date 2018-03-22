<div id="modalmodifcomp" class="modal modal-fixed-footer">

    <div class="modal-content ">

        <h4 class="titreprofil">Gérer ses compétences</h4>
        <div class="row alignement">
            <form action="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/Modules/competencegestion.php'?>" method="POST">

                <div class="col s12">
                    
                    <div class="input-field col s12">
                              
                        <select multiple id="besoins" name="Besoins[]">
                            <option value="" disabled selected>Selection</option>
                            <?php
                                Competence::select_print_checked_demande($_SESSION['user']['id']);
                            ?>
                        </select>
                    <label for="textarea1">Besoins</label>
                    </div>
                    <br>

                    <div class="input-field col s12">
                        <select multiple id='talents' name="Talents[]"> 
                            <option value="" disabled selected>Selection</option>
                            <?php
                                Competence::select_print_checked_propose($_SESSION['user']['id']);
                            ?>
                        </select>
                        <label for="textarea1">Propositions</label>
                    </div>
                    <script>

                        $(document).ready(function () {
                            $('select').material_select();
                        });

                    </script>

                </div>
            </form>      


        </div>
    </div>
    <div class="modal-footer">
        <a onclick='submit_compmodif()' class="btn-floating btn-large waves-effect waves-light bg-epsi modalbutton" type="submit"><i class="material-icons">assignment_turned_in</i></a>
        <div class="ml-1 inline"></div>
        <a class="modal-action modal-close btn-floating btn-large waves-effect waves-light red  modalbutton"><i class="material-icons">close</i></a>
    </div>

</div>

