function update_calendar_perso() {
    $('#calendar-perso').fullCalendar('removeEventSources');
    $('#calendar-perso').fullCalendar('addEventSource', {
        url: 'http://www.epsi-collabs.fr/Modules/EventFeeder.php',
        type: 'POST',
        data: {
            arg1: 'user',
            arg2: $("#my_id").val()
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
        header: {
            left: '',
            center: 'title',
            right: 'today prev,next',
        },
        views: {
            deuxJour: {
                type: 'list',
                duration: {
                    days: 7
                },
            }
        },
        defaultView: 'custom'
    });

    update_calendar_perso();

})


/* ====================================================================
    #search part
   ==================================================================== */

function search() {

    $("#search").css('height', '83px');
    console.log('pass')
    $("#search").css('overflow', 'hidden');

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

        $("#search_btn_resp").attr("onclick", "cancel()");
        $("#search_btn_resp").attr("class", "btn clickable red");
        $("#search_btn_resp i").text('close');

    });

}

function cancel() {
    $("#founded-user").html('');
    $("#search_btn").attr("onclick", "search()");
    $("#search_btn").text("Rechercher");
    $("#search_btn").attr("class", "btn clickable");

    $("#search_btn_resp").attr("onclick", "search()");
    $("#search_btn_resp").attr("class", "btn clickable");
    $("#search_btn_resp i").text('search');
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

