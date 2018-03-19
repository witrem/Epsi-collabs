<nav>
    <div class="nav-wrapper bg-epsi">
        <a href="#" class="brand-logo ml-1-resp-992">Epsi Collabs</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#">Profile</a></li>
            <?php if (isset($_SESSION['connected'])) { ?>
            <li><a href="<?php echo '../Modules/disconnect.php'; ?>">Déconnexion</a></li>
            <?php } else { ?>
            <li><a href="<?php echo '../login.php'; ?>">Connexion</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>