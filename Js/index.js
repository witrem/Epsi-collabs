function update_calendar_perso() {
    $('#calendar-perso').fullCalendar('removeEventSources');
    $('#calendar-perso').fullCalendar('addEventSource', {
        url: 'http://localhost:88/Modules/EventFeeder.php',
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

    update_view_calendar();

    update_calendar_perso()

})