$(document).ready(function(){

    $('#calendar').fullCalendar({
        height: 'parent',
        columnHeader: true,
        nowIndicator: true,
        editable: false,
        eventSources: [
            {
                url: 'http://localhost:88/Modules/EventFeeder.php',
                type: 'POST',
                data: {
                    comp: 1
                },
                error: function() {
                    alert('there was an error while fetching events!');
                },
                color: 'yellow',
                textColor: 'black'
            }
          ]
    });

    $('#calendar').fullCalendar('changeView', 'agendaWeek');

});

function log() {

    console.log("pass");

}