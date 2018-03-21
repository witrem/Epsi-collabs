<div id="modalmodifdate" class="modal">

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
            
            <a onclick='submit()' class="btn-floating btn-large waves-effect waves-light bg-epsi modalbutton"><i class="material-icons">add_alarm</i></a>

            <a class="modal-action modal-close btn-floating btn-large waves-effect waves-light red  modalbutton"><i class="material-icons">close</i></a>
            
        </div>
    </div>
</div>

<script>
                
    var time_slider = document.getElementById('time-slider');

    noUiSlider.create(time_slider, {
        start: [11, 13],
        connect: true,
        behaviour: 'tap',
        step: 0.5,
        range: {
            'min': 0,
            'max': 24
        }
    });

    var date_slider = document.getElementById('date-slider');

    noUiSlider.create(date_slider, {
        start: [15],
        behaviour: 'tap',
        step: 1,
        range: {
            'min': 1,
            'max': 31
        }
    });
    
    date_slider.noUiSlider.on('update', function(value) {
	    document.getElementById('label_day').innerHTML = Math.floor(value) + numberToMonth($("#select_month").val());
    });

    $('#select_month').change(function(value) {
	    document.getElementById('label_day').innerHTML = Math.floor(date_slider.noUiSlider.get()) + numberToMonth($("#select_month").val());
    });

    time_slider.noUiSlider.on('update', function( values, handle ) {
	    document.getElementById('label_hour').innerHTML = 'Plage horaire : ' + ((Math.floor(values[0]*10)/10) + 'h').replace('.5h', 'h30') + ' - ' + ((Math.floor(values[1]*10)/10) + 'h').replace('.5h', 'h30')
    });

    function numberToMonth(num) {
        switch(num) {
            case null: return ''
            case "01": return ' Janvier'
            case "02": return ' Févirer'
            case "03": return ' Mars'
            case "04": return ' Avril'
            case "05": return ' Mai'
            case "06": return ' Juin'
            case "07": return ' Juillet'
            case "08": return ' Aout'
            case "09": return ' Septembre'
            case "10": return ' Octobre'
            case "11": return ' Novembre'
            case "12": return ' Décembre'
        }
    }

    function submit() {

        data  = 'timeD='  + time_slider.noUiSlider.get()[0];
        data += '&timeF=' + time_slider.noUiSlider.get()[1];
        data += '&date='  + Math.floor(date_slider.noUiSlider.get());
        data += '&month=' + $('#select_month').val();
        data += '&comp='  + $('#select_comp').val();

        console.log(data)

        $.ajax({
            url: "http://www.epsi-collabs.fr/Modules/AddEvent.php",
            type: "POST",
            data: data
        }).done(function(data) {
            console.log("pass");
        });

    }

</script>