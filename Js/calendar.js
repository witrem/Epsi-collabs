function update() {
    $('#calendar').fullCalendar('removeEventSources');
    campus = $("#campus_select").val();
    comp = $("#comp_select").val();
    console.log(campus + ' . ' + comp)
    $('#calendar').fullCalendar('addEventSource', {
            url: 'http://epsi-collabs.fr/Modules/EventFeeder.php',
            type: 'POST',
            data: {
                comp: comp,
                campus: campus
            },
            error: function() {
                alert('there was an error while fetching events!');
            },
            color: 'blue',
            textColor: 'white'
        }
    )
}

function update_view_calendar() {
    if ($( window ).width() > 1300) {
        $('#menu').css("transform", "none")
    }
    if ($( window ).width() < 450) {
        $('#calendar').fullCalendar('changeView', 'unJour');
    }
    if ($( window ).width() >= 450 && $( window ).width() < 700) {
        $('#calendar').fullCalendar('changeView', 'deuxJour');
    }
    if ($( window ).width() >= 700 && $( window ).width() < 900) {
        $('#calendar').fullCalendar('changeView', 'quatreJour');
    }
    if ($( window ).width() >= 900 ) {
        $('#calendar').fullCalendar('changeView', 'semaine');
    }
}

$(document).ready(function(){

    campus = $("#campus_select").val();
    
    comp = $("#comp_select").val();

    console.log(campus + ' . ' + comp)

    $('#calendar').fullCalendar({
        height: 'parent',
        nowIndicator: true,
        editable: false,
        allDaySlot: false,
        defaultView: 'agendaWeek',
        header: {
            left:   '',
            center: 'title',
            right:  'today prev,next',
        },
        views: {
            unJour: {
              type: 'agendaDay'
            },
            deuxJour: {
                type: 'agenda',
                duration: { days: 2 },
            },
            quatreJour: {
                type: 'agenda',
                duration: { days: 4 },
            },
            semaine: {
                type: 'agendaWeek'
            }
        },
        eventSources: [
            {
                url: 'http://epsi-collabs.fr/Modules/EventFeeder.php',
                type: 'POST',
                data: {
                    comp: comp,
                    campus: campus
                },
                error: function() {
                    alert('there was an error while fetching events!');
                },
                color: 'blue',
                textColor: 'white'
            }
          ]
    });

    update_view_calendar();

    $('.fc-left').html('<div class="clickable btn_menu_calendar_resp"><i class="material-icons">menu</i></div>');

    $('.btn_menu_calendar_resp').on("click", function() {
        if ($('#menu').css("transform") == 'none' || $('#menu').css("transform") == null) {
            $('#menu').css("transform", "translateX(-300px)")
        } else {
            $('#menu').css("transform", "none")
        }
    })

    $( window ).resize(function() {
        update_view_calendar();
    });

});

