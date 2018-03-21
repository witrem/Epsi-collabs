function search() {
    if ($("#comp_select").val() == null) {
        alert("Selectionnez une compétence à approfondir");
        return;
    }

    data = 'comp=' + $("#comp_select").val();
    

    if ($("#lvl_select").val() != null) {
        data += '&lvl=' + $("#lvl_select").val();
    }

    if ($("#campus_select").val() != null) {
        data += '&campus=' + $("#campus_select").val();
    }

    console.log(data);

    $.ajax({
        url: "http://yuumii.ovh/Modules/search.php",
        type: "POST",
        data: data
    }).done(function(data) {
        
        $('#founded-user').html(data);

    });

}

