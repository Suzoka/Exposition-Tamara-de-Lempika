<header>
    <nav>
        <a href="./accueil"><img class="logo" src="../img/fond_noir-colore_expo.png" width="128"
                alt="Accueil site de l'Exposition Tamara de Lempicka: Les années folles"></a>
        <div class="menu">
            <a href="./accueil#teaser"><?php echo $_SESSION["lang"] == "fr" ? "Exposition virtuelle" : "Virtual exhibition" ?><img src="../img/icons/arrow.svg"
                    alt="Allez à la section"></a>
            <a href="./accueil#access"><?php echo $_SESSION["lang"] == "fr" ? "Infos pratiques" : "Useful info" ?><img src="../img/icons/arrow.svg" alt="Allez à la section"></a>
            <a href="./billetterie"><?php echo $_SESSION["lang"] == "fr" ? "Billetterie" : "Ticketing" ?><img src="../img/icons/arrow.svg" alt="Allez à la section"></a>
        </div>
        <div class="menu-user">
            <?php echo isset ($_SESSION["user"]) ? "<a href=\"./deconnexion\">". ($_SESSION["lang"]=="fr" ? "Se déconnecter" : "Sign out") . "</a><a id=\"compte\" href=\"./compte\"><img src=\"../img/compte.png\" alt=\"".($_SESSION["lang"]=="fr" ? "Mon compte" : "My account")."\"></a>" : "<a href=\"./connexion\">".($_SESSION["lang"]=="fr" ? "Se connecter" : "Sign in")."</a>
                <a href=\"./inscription\">".($_SESSION["lang"]=="fr" ? "S'inscrire" : "Sign up")."</a>" ?>
            <?php if ($_SESSION["lang"] == "fr") { ?>
                <a href="./languageEN?from=<?php echo $page ?>"><img class="language" src="../img/icons/en.svg" alt="change language to english" lang="en"></a>
            <?php } else { ?>
                <a href="./languageFR?from=<?php echo $page ?>"><img class="language" src="../img/icons/fr.svg" alt="changer la langue en français"></a>
            <?php } ?>
        </div>
        <button class="burger">
            <img class="burgerOpen" src="../img/icons/burger.svg" alt="Ouvrir le menu">
            <img class="burgerClose" src="../img/icons/burgerClose.svg" alt="Fermer le menu">
        </button>
    </nav>
    <script src="../scripts/burger.js" defer></script>
</header>