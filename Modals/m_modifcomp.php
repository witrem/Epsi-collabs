
<div id="modalmodifcomp" class="modal">

    <div class="modal-content ">


        <h4 class="titreprofil">Gérer ses compétences</h4>
        <div class="row alignement">
            <form action="competencegestion.php" method="POST">

                <div class="col s12">
                    
                    <div class="input-field col s12">
                              
                        <select multiple name="Besoins[]">
                            <option value="" disabled selected>Selection</option>
                            <?php
                            
                            Competence::select_print_checked_demande(1);

                            ?>
                            
                        </select>
                    <label for="textarea1">Besoins</label>
                    </div>
                    <br>

                    <div class="input-field col s12">
                        <select multiple name="Talents[]"> 
                            <option value="" disabled selected>Selection</option>
                            
                            <?php
                                Competence::select_print_checked_propose(1);
                            ?>
                        </select>
                        <label for="textarea1">Propositions</label>
                    </div>
                    <script>

                        $(document).ready(function () {
                            $('select').material_select();
                        });

                    </script>



                    <button class="btn-floating btn-large waves-effect waves-light bg-epsi modalbutton" type="submit"><i class="material-icons">assignment_turned_in</i></button>
                </div>
            </form>      



            <a class="modal-action modal-close btn-floating btn-large waves-effect waves-light red  modalbutton"><i class="material-icons">close</i></a>



        </div>
    </div>
</div>

