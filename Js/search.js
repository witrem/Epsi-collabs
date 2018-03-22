function search() {
    if ($("#comp_select").val() == null) {
        alert("Selectionnez une compétence à approfondir");
        return;
    }

    data = 'comp=' + $("#comp_select").val();
    

    if ($("#lvl_select").val() != null && $("#lvl_select").val() != 0) {
        data += '&lvl=' + $("#lvl_select").val();
    }

    if ($("#campus_select").val() != 0 && $("#campus_select").val() != 0) {
        data += '&campus=' + $("#campus_select").val();
    }

    $.ajax({
        url: "http://www.epsi-collabs.fr/Modules/search.php",
        type: "POST",
        data: data
    }).done(function(data) {
        console.log('pass');
        $("#founded-user").html(data);
    });

}

