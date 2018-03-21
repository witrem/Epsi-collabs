<div id="modalmodifdate" class="modal">

    <div class="modal-content modifdate">

        <h4 class="titreprofil">Créer une Disponibilité</h4>
        <div class="row alignement">
            <div class="col s12">
             
                <form action="traitementdispo.php" method="POST">
                <label for="date">Date Début</label>
                <input id="date" type="text" name="DateDebut"  class="datepicker" required>
                
                 <label for="date">Créneaux</label>
                <div class="input-field col s12" >
    <select name="hdebut">
      <option value="08:00:00">8h</option>
      <option value="09:00:00">9h</option>
      <option value="10:00:00">10h</option>
       <option value="11:00:00">11h</option>
      <option value="12:00:00">12h</option>
      <option value="13:00:00">13h</option>
       <option value="14:00:00">14h</option>
      <option value="15:00:00">15h</option>
      <option value="16:00:00">16h</option>
       <option value="17:00:00">17h</option>
      <option value="18:00:00">18h</option>
      <option value="19:00:00">19h</option>
    </select>
    <label>Heure début</label>
  </div>
  <div class="input-field col s12" >
    <select name="hfin">
      <option value="08:00:00">8h</option>
      <option value="09:00:00">9h</option>
      <option value="10:00:00">10h</option>
       <option value="11:00:00">11h</option>
      <option value="12:00:00">12h</option>
      <option value="13:00:00">13h</option>
       <option value="14:00:00">14h</option>
      <option value="15:00:00">15h</option>
      <option value="16:00:00">16h</option>
       <option value="17:00:00">17h</option>
      <option value="18:00:00">18h</option>
      <option value="19:00:00">19h</option>
    </select>
    <label>Heure Fin</label>
  </div>
                
    <script>

                    $(document).ready(function () {
                        $('select').material_select();
                    });

                    $('.datepicker').pickadate({
                        selectMonths: true, // Creates a dropdown to control month
                        selectYears: 2, // Creates a dropdown of 15 years to control year
                        labelMonthNext: 'Mois suivant',
                        labelMonthPrev: 'Mois précédent',
                        labelMonthSelect: 'Selectionner le mois',
                        labelYearSelect: 'Selectionner une année',
                        monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                        monthsShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'],
                        weekdaysFull: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
                        weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
                        weekdaysLetter: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
                        today: 'Aujourd\'hui',
                        clear: 'Réinitialiser',
                        close: 'Fermer',
                        format: 'dd/mm/yyyy'

                    });

                </script>
                
               

                <button class="btn-floating btn-large waves-effect waves-light bg-epsi modalbutton" type="submit"><i class="material-icons">add_alarm</i></button>
                </form>

                <a class="modal-action modal-close btn-floating btn-large waves-effect waves-light red  modalbutton"><i class="material-icons">close</i></a>


            </div>
        </div>
    </div>
</div>
</div>

