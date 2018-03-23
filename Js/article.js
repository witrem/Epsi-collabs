$(document).ready(function() {

    $("#select-comp-article").change(function() {
        console.log('first pass')
        console.log($("#select-comp-article-value").val())
        if ($("#select-comp-article-value").val() == 0 || $("#select-comp-article").val() == null) {
            $("#list-article-wrapper").html('');
        } else {
            console.log('pass')
            $.ajax({
                url: "http://www.epsi-collabs.fr/Modules/articleFeeding.php",
                type: "POST",
                data: 'idcomp=' + $("#select-comp-article-value").val()
            }).done(function(data) {
                console.log(data)
                $("#list-article-wrapper").html(data);        
            });
        }
    })

})