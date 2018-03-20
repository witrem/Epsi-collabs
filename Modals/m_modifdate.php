<div id="modalmodifdate" class="modal">

    <div class="modal-content modifdate">
       
        <h4 class="titreprofil">Créer une Disponibilitée</h4>
        <div class="row alignement">
            <div class="col s12">
         <label for="date">Date</label>
          <input id="date" type="text" class="datepicker">
          
          <div class="input-field col s12">
    <select multiple>
      <option value="1">Soutien Campus</option>
      <option value="2">Visio</option>
      <option value="3">Mail</option>
    </select>
    <label>Préférence de soutien</label>
  </div>

 <script>
     
       $(document).ready(function() {
    $('select').material_select();
  });
     
              $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 2, // Creates a dropdown of 15 years to control year
      labelMonthNext: 'Mois suivant',
	  labelMonthPrev: 'Mois précédent',
		labelMonthSelect: 'Selectionner le mois',
		labelYearSelect: 'Selectionner une année',
		monthsFull: [ 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' ],
		monthsShort: [ 'Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec' ],
		weekdaysFull: [ 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi' ],
		weekdaysShort: [ 'Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam' ],
		weekdaysLetter: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S' ],
		today: 'Aujourd\'hui',
		clear: 'Réinitialiser',
		close: 'Fermer',
		format: 'dd/mm/yyyy'
		
});
           
   
  $('.timepicker').pickatime({
    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
    twelvehour: false, // Use AM/PM or 24-hour format
    donetext: 'OK', // text for done-button
    cleartext: 'Clear', // text for clear-button
    canceltext: 'Cancel', // Text for cancel-button
    autoclose: false, // automatic close timepicker
    ampmclickable: true, // make AM PM clickable
    aftershow: function(){} //Function for after opening timepicker
  });     

            </script>
            
<a class="btn-floating btn-large waves-effect waves-light bg-epsi modalbutton"><i class="material-icons">add_alarm</i></a>
                
  <a class="modal-action modal-close btn-floating btn-large waves-effect waves-light red  modalbutton"><i class="material-icons">close</i></a>
 

            </div>
        </div>
</div>
    </div>
</div>

