<nav>
    <div class="nav-wrapper bg-epsi">
        <div class="clickable" id="slide_menu_btn" onclick><i class="material-icons">menu</i></div>
        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>" class="brand-logo ml-1-resp-992">Epsi Collabs</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="modal-trigger" href="#modalprofile">Profil</a></li>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/Modules/disconnect.php'; ?>">Déconnexion</a></li>
        </ul>
    </div>
</nav>

<div id="slide_menu" class="bg-epsi">

    <ul>
        <li><a href='http://<?php echo $_SERVER['HTTP_HOST']; ?>'>Accueil</a></li>
        <li><a class="modal-trigger" href="#modalprofile">Profil</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/Modules/disconnect.php">Déconnexion</a></li>
    </ul>

</div>

<script>
    
    $(document).ready(function(){

        $('#slide_menu_btn').on("click", function() {
            if ($('#slide_menu').css("transform") == 'none') {
                $('#slide_menu').css("transform", "translateX(210px)")
            } else {
                $('#slide_menu').css("transform", "none")
            }
        })

    })

</script>