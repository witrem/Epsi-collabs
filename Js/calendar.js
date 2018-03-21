$(document).ready(function(){

    campus = $("#campus_select").val();
    
    comp = $("#comp_select").val();

    console.log(campus + ' . ' + comp)

    $('#calendar').fullCalendar({
        height: 'parent',
        columnHeader: true,
        nowIndicator: true,
        editable: false,
        eventSources: [
            {
                url: 'http://localhost:88/Modules/EventFeeder.php',
                type: 'GET',
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

    $('#calendar').fullCalendar('changeView', 'agendaWeek');

});

function update() {
    $('#calendar').fullCalendar('removeEventSources');
    campus = $("#campus_select").val();
    comp = $("#comp_select").val();
    console.log(campus + ' . ' + comp)
    $('#calendar').fullCalendar('addEventSource', {
            url: 'http://localhost:88/Modules/EventFeeder.php',
            type: 'GET',
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