<header>
    <nav>
        <a href="accueil.php"><img class="logo" src="../img/fond_noir-colore_expo.png" width="128"
                alt="Accueil site de l'Exposition Tamara de Lempicka: Les années folles"></a>
        <div class="menu">
            <a href="#teaser">Exposition virtuelle</a>
            <a href="#access">Infos pratiques</a>
            <a href="">Billeterie</a>
        </div>
        <div class="menu-user">
            <?php echo isset($_SESSION["user"]) ? "<a href=\"./deconnexion\">Se déconnecter</a><a id=\"compte\" href=\"\"><img src=\"\" alt=\"Mon compte\"></a>" : "<a href=\"./connexion\">Se connecter</a>
                <a href=\"./inscription\">S'inscrire</a>" ?>
        </div>
    </nav>
</header>