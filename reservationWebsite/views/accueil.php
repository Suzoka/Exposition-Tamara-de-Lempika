<!DOCTYPE html>
<html lang="<?php echo $_SESSION["lang"] == "fr" ? "fr" : "en" ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_accueil.css">
    <title><?php echo $_SESSION["lang"] == "fr" ? "Expo Tamara de Lempicka - Les années folles" : "Exhibition Tamara de Lempicka - The Roaring Twenties" ?></title>
</head>

<body>
    <a href="#content" class="skip-link"><?php echo $_SESSION["lang"] == "fr" ? "Aller au contenu" : "Go to content" ?></a>
    <?php include './views/components/header.php'; ?>
    <main id="content">
        <section class="banniere">
            <div class="text">
                <h1><span id="tam">Tamara</span>
                    <br>de Lempicka, <span id="era"><?php echo $_SESSION["lang"] == "fr" ? "les annees folles" : "the Roaring Twenties" ?></span>
                </h1>
                <h2><?php echo $_SESSION["lang"] == "fr" ? "28 mars - 28 avril 2024" : "March 28 - April 28, 2024" ?></h2>
                <p><?php echo $_SESSION["lang"] == "fr" ? "Une exposition virtuelle dans les temps des années folles à travers les tableaux décalés et interrogateurs de Tamara." : "A virtual exhibition in the Roaring Twenties through Tamara's quirky and questioning paintings." ?></p>
            </div>
            <div class="imgBanniere">
                <img id="tamaraPaint" src="../img/TamaraPaint.png" alt="">
            </div>
            <a href="#teaser" class="scroll" id="teaser">
                <img src="../img/icons/scroll.svg" alt="scroll">
            </a>
        </section>

        <section class="tamara">
            <h2>Tamara de Lempicka</h2>
            <div class="contentTamara">
                <p class="t1"><?php echo $_SESSION["lang"] == "fr" ? "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <br>reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id" : "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <br>reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id" ?>
                </p>
                <img class="imgBig" src="../img/tamaraAccueil2.png" alt="<?php echo $_SESSION["lang"] == "fr" ? "Peinture d'une femme en tunique rouge de Tamara" : "Painting of a woman in a red tunic by Tamara" ?>">
                <img class="imgSmall s1" src="../img/tamara.png" alt="<?php echo $_SESSION["lang"] == "fr" ? "Photo de Tamara" : "Photo of Tamara" ?>">
                <img class="imgSmall s2" src="../img/tamaraAccueil.png" alt="<?php echo $_SESSION["lang"] == "fr" ? "Autoportrait de Tamara dans une Bugatti verte" : "Self-portrait of Tamara in a green Bugatti" ?>">
                <p class="t2"><?php echo $_SESSION["lang"] == "fr" ? "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                <br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sin velit esse cillum dolore eu " : "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                <br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sin velit esse cillum dolore eu " ?>
                </p>
            </div>
        </section>

        <section class="teaser">
            <h2>Teaser</h2>
            <div class="contentTeaser">
                <div class="iframeResponsive">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ"></iframe>
                </div>
                <div class="presentation">
                    <div class="infosTeaser">
                        <div class="infoTeaser">
                            <img src="../img/icons/place.svg" alt="">
                            <p>IUT de Marne-la-Vallée</p>
                        </div>
                        <div class="infoTeaser">
                            <img src="../img/icons/time.svg" alt="">
                            <p>30min</p>
                        </div>
                    </div>
                    <p id="textPresent"><?php echo $_SESSION["lang"] == "fr" ? "Plongez à la découverte des années folles à travers Tamara de Lempicka et ses tableaux ! Cette époque où l’art moderne et la représentation de la femme prennent vie. Les années folles symbole, d’une époque unique, euphorique, où le domaine artistique et culturelle connaissent leur apogée.
                        <br>Des œuvres qui illustrent l’émancipation de la femme et la beauté féminine. Tamara y peint
                        une image de la femme libre, autonome et épanoui dans sa vie et ses propres choix. Grâce à cette
                        exposition interactive unique, vous aurez la chance de vous inviter dans l’univers de Tamara et
                        de découvrir les tableaux d’une toute nouvelle manière." : "Dive into the Roaring Twenties through Tamara de Lempicka and her paintings ! A time when the modern art and the woman representation came to life. The Roaring Twenties has a symbol of a unique and euphoric era, when art and culture were at their peak.
                        <br>These works demonstrate the emancipation of women et her beauty. Tamara paints a picture of woman as free, independent and radiant in her life and her choices. Thanks to this interactive and unique exhibition, you will have the opportunity to enter Tamara’s universe and discover in a new way her paintings. " ?>
                    </p>
                    <a id="reservation" href="./billetterie">
                        <img src="../img/icons/ticket.svg" alt="">
                        <p><?php echo $_SESSION["lang"] == "fr" ? "Réserver" : "Book now" ?></p>
                    </a>
                </div>
            </div>
        </section>

        <section class="access" id="access">
            <h2><?php echo $_SESSION["lang"] == "fr" ? "Accès" : "Access" ?></h2>
            <div class="contentAccess">
                <div class="plan">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5252.201070809865!2d2.582695076449555!3d48.83722100219615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e60e33dd9a3fdd%3A0x7e5ced48ab7fc8df!2sIUT%20de%20Marne-la-Vall%C3%A9e%20-%20Universit%C3%A9%20Gustave%20Eiffel!5e0!3m2!1sfr!2sfr!4v1709888116532!5m2!1sfr!2sfr"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="infosAccess">
                    <div class="infoAccess">
                        <div class="h3">
                            <img src="../img/icons/transport.svg" alt="">
                            <h3><?php echo $_SESSION["lang"] == "fr" ? "Venir en transport" : "By transport" ?></h3>
                        </div>
                        <ul>
                            <li>RER A - Noisy-Champs</li>
                            <li>Bus 213 - Espace Descartes</li>
                            <li>Bus 312 - Nobel</li>
                        </ul>
                    </div>
                    <div class="infoAccess">
                        <div class="h3">
                            <img src="../img/icons/voiture.svg" alt="">
                            <h3><?php echo $_SESSION["lang"] == "fr" ? "Venir en voiture" : "By car" ?></h3>
                        </div>    
                        <ul>
                            <li>Via A4 </li>
                            <li>Bd du Ru du Nesles N370</li>
                            <li>Rue Albert Einstein</li>
                        </ul>
                    </div>
                    <div class="infoAccess">
                        <div class="h3">
                            <img src="../img/icons/velo.svg" alt="">
                            <h3><?php echo $_SESSION["lang"] == "fr" ? "Venir en vélo" : "By bike" ?></h3>
                        </div>
                        <ul>
                            <li>Via Av. de Gravelle</li>
                            <li>Via Av de Gravelle et D4</li>
                            <li>Via D120</li>
                        </ul>
                    </div>
                    <div class="infoAccess">
                        <div class="h3">
                            <img src="../img/icons/pied.svg" alt="">
                            <h3><?php echo $_SESSION["lang"] == "fr" ? "Venir à pied" : "On foot" ?></h3>
                        </div>
                        <ul>
                            <li>Via D120</li>
                            <li>Via D143</li>
                            <li>Via N302</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include './views/components/footer.php'; ?>
</body>

</html>