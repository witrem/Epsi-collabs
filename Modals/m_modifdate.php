<div id="modalmodifdate" class="modal">

    <div class="modal-content modifdate">

        <h4 class="titreprofil">Créer une Disponibilité</h4>
        <div class="row alignement">

            <div class="col s12 row alignement">

                <div class="input-field col s12">
                    <select>
                        <option value="" disabled selected>Choisir un mois</option>
                        <option value="01">Janvier</option>
                        <option value="02">Février</option>
                        <option value="03">Mars</option>
                        <option value="01">Avril</option>
                        <option value="02">Mai</option>
                        <option value="03">Juin</option>
                        <option value="01">Juillet</option>
                        <option value="02">Aout</option>
                        <option value="03">Septembre</option>
                        <option value="01">Octobre</option>
                        <option value="02">Novembre</option>
                        <option value="03">Décembre</option>
                    </select>
                    <label>Mois</label>
                </div>

                <div id="date-slider"></div>
                <label>Jours</label>

                <div id="time-slider"></div>
                <label>Jours</label>
                
                <script>
                
                    var time_slider = document.getElementById('time-slider');

                    noUiSlider.create(time_slider, {
                        start: [11, 13],
                        connect: true,
                        range: {
                            'min': 0,
                            'max': 24
                        },
                    });

                    var date_slider = document.getElementById('date-slider');

                    noUiSlider.create(date_slider, {
                        start: [15],
                        range: {
                            'min': 0,
                            'max': 31
                        },
                    });


                </script>

                <!-- <p class="range-field">
                    <input type="range" id="hd" min="0" max="24" step="0.5"/>
                    <label>heure de debut</label>
                </p>

                <p class="range-field">
                    <input type="range" id="hf" min="0" max="24" step="0.5"/>
                    <label>heure de fin</label>
                </p> -->

                <a class="btn-floating btn-large waves-effect waves-light bg-epsi modalbutton"><i class="material-icons">add_alarm</i></a>

                <a class="modal-action modal-close btn-floating btn-large waves-effect waves-light red  modalbutton"><i class="material-icons">close</i></a>

            </div>
        </div>
    </div>
</div>
</div>

