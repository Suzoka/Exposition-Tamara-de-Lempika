<header>
    <nav>
        <a href="./accueil"><img class="logo" src="../img/fond_noir-colore_expo.png" width="128"
                alt="Accueil site de l'Exposition Tamara de Lempicka: Les années folles"></a>
        <div class="menu">
            <a href="./accueil#teaser">Exposition virtuelle <img src="../img/icons/arrow.svg" alt="Allez à la section"></a>
            <a href="./accueil#access">Infos pratiques <img src="../img/icons/arrow.svg" alt="Allez à la section"></a>
            <a href="./billetterie">Billetterie <img src="../img/icons/arrow.svg" alt="Allez à la section"></a>
        </div>
        <div class="menu-user">
            <?php echo isset($_SESSION["user"]) ? "<a href=\"./deconnexion\">Se déconnecter</a><a id=\"compte\" href=\"\"><img src=\"\" alt=\"Mon compte\"></a>" : "<a href=\"./connexion\">Se connecter</a>
                <a href=\"./inscription\">S'inscrire</a>" ?>
        </div>
        <button class="burger">
            <img class="burgerOpen" src="../img/icons/burger.svg" alt="Ouvrir le menu">
            <img class="burgerClose" src="../img/icons/burgerClose.svg" alt="Fermer le menu">
        </button>
    </nav>
</header>