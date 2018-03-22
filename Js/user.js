function update_calendar_user() {
    $('#user-calendar').fullCalendar('removeEventSources');
    $('#user-calendar').fullCalendar('addEventSource', {
        url: 'http://localhost:88/Modules/EventFeeder.php',
        type: 'POST',
        data: {
            arg1: 'user',
            arg2: $('#id_User').val()
        },
        error: function () {
            alert('there was an error while fetching events!');
        },
        color: 'blue',
        textColor: 'white'
    })
}

function update_view_calendar() {
    if ($(window).width() > 1300) {
        $('#menu').css("transform", "none")
    }
    if ($(window).width() < 450) {
        $('.calendar').fullCalendar('changeView', 'unJour');
    }
    if ($(window).width() >= 450 && $(window).width() < 700) {
        $('.calendar').fullCalendar('changeView', 'deuxJour');
    }
    if ($(window).width() >= 700 && $(window).width() < 900) {
        $('.calendar').fullCalendar('changeView', 'quatreJour');
    }
    if ($(window).width() >= 900) {
        $('.calendar').fullCalendar('changeView', 'semaine');
    }
}

function show_calendar() {
    setTimeout(function() {
    $('#user-calendar').fullCalendar({
        height: 650,
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

    update_calendar_user()
    
    update_view_calendar();

    }, 50)

}

$(window).resize(function () {
    update_view_calendar();
});