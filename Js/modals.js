/* ====================================================
    #modifdate
   ==================================================== */

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

function submit_event() {

    data  = 'timeD='  + time_slider.noUiSlider.get()[0];
    data += '&timeF=' + time_slider.noUiSlider.get()[1];
    data += '&date='  + Math.floor(date_slider.noUiSlider.get());
    data += '&month=' + $('#select_month').val();
    data += '&comp='  + $('#select_comp').val();

    console.log(data)

    $.ajax({
        url: "http://localhost:88/Modules/AddEvent.php",
        type: "POST",
        data: data
    }).done(function(data) {
        console.log([data])
        if (data == '00000\n' || data == '00000') {
            alert('event creer');
        } else {
            alert('une erreur est survenue');
        }
    });

}

/* ====================================================
    #modifprofil
   ==================================================== */

function submit_profilmodif() {

    data  = 'social1='  + $("#social1").val();
    data += '&social2=' + $("#social2").val();
    data += '&social3='  + $("#social3").val();
    data += '&comment=' + $("#comments").val();

    console.log(data)

    $.ajax({
        url: "http://localhost:88/Modules/Modifuser.php",
        type: "POST",
        data: data
    }).done(function(data) {
        console.log([data])
        if (data == '00000\n' || data == '00000') {
            alert('profil sauvegarder');
        } else {
            alert('une erreur est survenue');
        }
    });

}

/* ====================================================
    #competencegestion
   ==================================================== */

function submit_compmodif() {

    data  = 'Talents='  + $("#talents").val();
    data += '&Besoins=' + $("#besoins").val();

    console.log(data)

    $.ajax({
        url: "http://localhost:88/Modules/competencegestion.php",
        type: "POST",
        data: data
    }).done(function(data) {
        console.log([data])
        if (data == '00000\n' || data == '00000') {
            alert('profil sauvegarder');
        } else {
            alert('une erreur est survenue');
        }
    });

}