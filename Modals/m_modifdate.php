<div id="modalmodifdate" class="modal modal-fixed-footer">

    <div class="modal-content modifdate">

        <h4 class="titreprofil">Créer une Disponibilité</h4>
        <div class="alignement">

            <section class="form_create_event">

                <div class="input-field col s12">
                    <select id="select_month">
                        <option value="01" selected>Janvier</option>
                        <option value="02">Février</option>
                        <option value="03">Mars</option>
                        <option value="04">Avril</option>
                        <option value="05">Mai</option>
                        <option value="06">Juin</option>
                        <option value="07">Juillet</option>
                        <option value="08">Aout</option>
                        <option value="09">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </select>
                </div>
                
                <div>
                    <div id="date-slider"></div>
                </div>
                
                <div>
                    <label id="label_day">Jours : 15</label>
                </div>

                <div>
                    <div id="time-slider"></div>
                </div>
                
                <div>
                    <label id="label_hour">Plage horaire : </label>
                </div>

                <div class="input-field col s12">
                    <select id="select_comp">
                        <option value="" disabled selected>Compétence</option>
                        <?php Competence::select_print(); ?>
                    </select>
                </div>
            </section>
        </div>
    </div>
    <div class="modal-footer">
        <a onclick='submit_event()' class="btn-floating modal-close btn-large waves-effect waves-light bg-epsi modalbutton"><i class="material-icons">add_alarm</i></a>
        <div class="ml-1 inline"></div>
        <a class="modal-action modal-close btn-floating btn-large waves-effect waves-light red  modalbutton"><i class="material-icons">close</i></a>
    </div>
</div>