function update_calendar_perso() {
    $('#calendar-perso').fullCalendar('removeEventSources');
    $('#calendar-perso').fullCalendar('addEventSource', {
        url: 'http://www.epsi-collabs.fr/Modules/EventFeeder.php',
        type: 'POST',
        data: {
            arg1: 'perso',
            arg2: 'perso'
        },
        error: function () {
            alert('there was an error while fetching events!');
        },
        color: 'blue',
        textColor: 'white'
    })
}

$(document).ready(function () {

    $('#calendar-perso').fullCalendar({
        height: 'parent',
        nowIndicator: true,
        editable: false,
        allDaySlot: false,
        defaultView: 'agendaWeek',
        header: {
            left: '',
            center: 'title',
            right: 'today prev,next',
        },
        views: {
            unJour: {
                type: 'agendaDay'
            },
            deuxJour: {
                type: 'agenda',
                duration: {
                    days: 2
                },
            },
            quatreJour: {
                type: 'agenda',
                duration: {
                    days: 4
                },
            },
            semaine: {
                type: 'agendaWeek'
            }
        }
    });

    //update_view_calendar();

    //update_calendar_perso();

})


/* ====================================================================
    #search part
   ==================================================================== */

function search() {

    $("#search").css('height', '83px');

    data = ''; 

    if ($("#comp_select").val() != null && $("#comp_select").val() != 0) {
        data += 'comp=' + $("#comp_select").val();
    }

    if ($("#lvl_select").val() != null && $("#lvl_select").val() != 0) {
        if (data != '') data += '&'
        data += 'lvl=' + $("#lvl_select").val();
    }

    if ($("#campus_select").val() != 0 && $("#campus_select").val() != 0) {
        if (data != '') data += '&'
        data += 'campus=' + $("#campus_select").val();
    }

    if ($("#user_search").val() != '') {
        if (data != '') data += '&'
        data += 'user=' + $("#user_search").val();
    }

    if (data == '') {
        alert('Selectionnez au moins un filtre');
        return;
    }

    $.ajax({
        url: "http://www.epsi-collabs.fr/Modules/search.php",
        type: "POST",
        data: data
    }).done(function(data) {
        $("#founded-user").html(data);
        $("#search_btn").attr("onclick", "cancel()");
        $("#search_btn").text("Annuler");
        $("#search_btn").attr("class", "btn clickable red");
    });

}

function cancel() {
    $("#founded-user").html('');
    $("#search_btn").attr("onclick", "cancel()");
    $("#search_btn").text("Rechercher");
    $("#search_btn").attr("class", "btn clickable");
}

function search_filter_update() {

    $('#filter-list').text('');

    var filter = '';

    if ($("#comp_select").val() != null && $("#comp_select").val() != 0) {
        filter += $('#filter-list-valueToText #comp-' + $("#comp_select").val()).text() + ' ';
    }

    if ($("#lvl_select").val() != null && $("#lvl_select").val() != 0) {
        filter += $("#lvl_select").val() + ' ';
    }

    if ($("#campus_select").val() != 0 && $("#campus_select").val() != 0) {
        filter += $('#filter-list-valueToText #campus-' + $("#campus_select").val()).text() + ' ';
    }

    if ($("#user_search").val() != '') {
        filter += $("#user_search").val();
    }
    
    $('#filter-list').text(filter);

}

$(document).ready(function () {

    $('#filter-list').on('click', function() {
        if ($("#search").css('height') != '83px') {
            $("#search").css('height', '83px')
            $("#search").css('overflow', 'hidden');
        } else {
            $("#search").css('height', 'auto');
            $("#search").css('overflow', 'initial');
        }
    })

    $('#filter-edit-btn').on('click', function() {
        if ($("#search").css('height') != '83px') {
            $("#search").css('height', '83px')
            $("#search").css('overflow', 'hidden');
        } else {
            $("#search").css('height', 'auto');
            $("#search").css('overflow', 'initial');
        }
    })

    $('.filter-value').change(function() {

        search_filter_update()
        
    })

    search_filter_update()

})

