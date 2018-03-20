<div id="modalmodifcomp" class="modal">

    <div class="modal-content">
       <script>
     
     
  
  $('.chips').material_chip();
  $('.chips-initial').material_chip({
    data: [{
      tag: 'Apple',
    }, {
      tag: 'Microsoft',
    }, {
      tag: 'Google',
    }],
  });
  $('.chips-placeholder').material_chip({
    placeholder: 'Enter a tag',
    secondaryPlaceholder: '+Tag',
  });
  $('.chips-autocomplete').material_chip({
    autocompleteOptions: {
      data: {
        'Apple': null,
        'Microsoft': null,
        'Google': null
      },
      limit: Infinity,
      minLength: 1
    }
  });
        
</script>
        <h4 class="titreprofil">Gérer ses compétences</h4>
        <div class="row alignement">
            <div class="col s12">
          <label>Préférence de soutien</label>
         <div class="chips chips-autocomplete"></div>
         <br>
         <label>Vos talents</label>
          <div class="chips chips-autocomplete"></div>
  
 

 
            
<a class="btn-floating btn-large waves-effect waves-light bg-epsi modalbutton"><i class="material-icons">cached</i></a>
                
  <a class="modal-action modal-close btn-floating btn-large waves-effect waves-light red  modalbutton"><i class="material-icons">close</i></a>
 

            </div>
        </div>
</div>
    </div>

