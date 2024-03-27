<head>
    <meta name="description"
        content="Découvrez l'exposition Tamara de Lempicka - les années folles : une immersion dans les années folles à travers les tableaux de Tamara de Lempicka. Explorez les œuvres uniques de l'artiste dans cette exposition immersive unique jusqu'au 28 Avril 2024.">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_h&f.css">
    <link rel="stylesheet" href="../styles/style_accueil.css">
    <title>
        <?php echo $_SESSION["lang"] == "fr" ? "Expo Tamara de Lempicka - Les années folles" : "Exhibition Tamara de Lempicka - The Roaring Twenties" ?>
    </title>
    <link rel="icon" type="image/png" href="../img/favicon.png">
</head>

<body>
    <a href="#content" class="skip-link">
        <?php echo $_SESSION["lang"] == "fr" ? "Aller au contenu" : "Go to content" ?>
    </a>
    <?php include './views/components/header.php'; ?>
    <main id="content">
        <section class="banniere">
            <div class="text">
                <h1><span id="tam">Tamara</span>
                    <br>de Lempicka, <span id="era">
                        <?php echo $_SESSION["lang"] == "fr" ? "les annees folles" : "the Roaring Twenties" ?>
                    </span>
                </h1>
                <h2>
                    <?php echo $_SESSION["lang"] == "fr" ? "28 mars - 28 avril 2024" : "March 28 - April 28, 2024" ?>
                </h2>
                <p>
                    <?php echo $_SESSION["lang"] == "fr" ? "Une exposition virtuelle dans les temps des années folles à travers les tableaux décalés et interrogateurs de Tamara." : "A virtual exhibition in the Roaring Twenties through Tamara's quirky and questioning paintings." ?>
                </p>
            </div>
            <div class="imgBanniere">
                <img id="tamaraPaint" src="../img/TamaraPaint.png" alt="">
            </div>
            <a href="#teaser" class="scroll" id="teaser">
                <img src="../img/icons/scroll.svg" alt="scroll">
            </a>
        </section>

        <section class="tamara" data-scroll="Teaser">
            <h2>Tamara de Lempicka</h2>
            <div class="contentTamara">
                <p class="t1">
                    <?php echo $_SESSION["lang"] == "fr" ? "Tamara Rozalia Gurwick-Gorska, plus connue sous le nom de Tamara de Lempicka, a marqué l'histoire de l'art du XXe siècle par son talent artistique original et sa vie hors du commun. Née le 16 mai 1898 à Varsovie, elle est élevée dans un milieu aisé et cultivé, partageant son temps entre Saint-Pétersbourg et Lausanne. 
                <br>En 1914 elle entreprend une réelle carrière artistique en s'inscrivant à l'Académie des Beaux-Arts de Saint-Pétersbourg. En 1916 elle épouse l'avocat Tadeusz Lempicki et donne naissance à leur fille Marie-Chrisitine. En 1917 elle fuit la révolution d'octobre et se rend à Paris où elle est accueilli par ses cousins." : "Tamara Rozalia Gurwick-Gorska, better known as Tamara de Lempicka, left her mark on twentieth-century art history with her orignal artistic talent and her extraordinary life. 
                Born in Warsaw on May 16, 1898, she grew up in an affluent and cultured environment, dividing her time between St Petersburg and Lausanne. 
                <br>In 1914 she begin a real artistic career, by registering at the  Saint Petersburg Academy of Fine Arts. In 1916 she married the lawyer Tadeusz Lempicki and had her daughter Marie-Christine.
                In 1917 she fled the October Revolution and went to Paris where she was welcomed by her cousins." ?>
                </p>
                <img class="imgBig" src="../img/tamaraAccueil2.png"
                    srcset="../img/tamaraAccueil2330.png 400w"
                    alt=""
                >
                <img class="imgSmall s1" src="../img/tamara.png"
                    srcset="../img/tamara220.png 440w"
                    alt=""
                >
                <img class="imgSmall s2" src="../img/tamaraAccueil.png"
                    srcset="../img/tamaraAccueil220.png 440w"
                    alt=""
                >
                <p class="t2"><?php echo $_SESSION["lang"] == "fr" ? "Sous la tutelle de Maurice Denis et André Lhote, Tamara de Lempicka trouve un précieux soutien à l'Académie Ranson et de la Grande Chaumière. Fusionnant la Renaissance et le néo-cubisme, elle crée un style novateur, évoquant l'élégance des Années folles.
                <br>Sa première exposition en 1923, \"Perspective (ou les deux amies)\", lance sa renommée et l'essor de l'Art Déco." : "Under the tutelage of Maurice Denis and André Lhote, Tamara de Lempicka found support at the Ranson Academy and the Grande Chaumière. Mixing the Renaissance and neo-Cubism, she created an innovative style, evoking the elegance of the Roaring Twenties.
                <br>Her 1rst exhbition in 1923 \"Perspective (ou les deux amies)\", propelled her reputation and the rise of Art Deco." ?>
                </p>
            </div>
        </section>

        <section class="teaser" data-scroll="Teaser">
            <h2>Teaser</h2>
            <div class="contentTeaser">
                <div class="iframeResponsive">
                    <iframe src="https://www.youtube.com/embed/0AwAFKBY-Uo?si=6qMXA8hfmywyXxjk">
                        <p>Ceci est un lien vers le teaser video de l'exposition que vous pouvez retrouver sur ce lien
                            Youtube : <a href="https://youtu.be/0AwAFKBY-Uo?si=wH2p-N0rZnrZrEOA"></a></p>
                    </iframe>
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
                    <p id="textPresent">
                        <?php echo $_SESSION["lang"] == "fr" ? "Plongez à la découverte des années folles à travers Tamara de Lempicka et ses tableaux ! Cette époque où l’art moderne et la représentation de la femme prennent vie. Les années folles symbole, d’une époque unique, euphorique, où le domaine artistique et culturelle connaissent leur apogée.
                        <br>Des œuvres qui illustrent l’émancipation de la femme et la beauté féminine. Tamara y peint
                        une image de la femme libre, autonome et épanoui dans sa vie et ses propres choix. Grâce à cette
                        exposition interactive unique, vous aurez la chance de vous inviter dans l’univers de Tamara et
                        de découvrir les tableaux d’une toute nouvelle manière." : "Dive into the Roaring Twenties through Tamara de Lempicka and her paintings ! A time when the modern art and the woman representation came to life. The Roaring Twenties has a symbol of a unique and euphoric era, when art and culture were at their peak.
                        <br>These works demonstrate the emancipation of women et her beauty. Tamara paints a picture of woman as free, independent and radiant in her life and her choices. Thanks to this interactive and unique exhibition, you will have the opportunity to enter Tamara’s universe and discover in a new way her paintings. " ?>
                    </p>
                    <a id="reservation" href="./billetterie">
                        <img src="../img/icons/ticket.svg" alt="">
                        <p>
                            <?php echo $_SESSION["lang"] == "fr" ? "Réserver" : "Book now" ?>
                        </p>
                    </a>
                </div>
            </div>
        </section>

        <section class="access" id="access" data-scroll="Access">
            <h2>
                <?php echo $_SESSION["lang"] == "fr" ? "Accès" : "Access" ?>
            </h2>
            <div class="contentAccess">
                <div class="plan">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5252.201070809865!2d2.582695076449555!3d48.83722100219615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e60e33dd9a3fdd%3A0x7e5ced48ab7fc8df!2sIUT%20de%20Marne-la-Vall%C3%A9e%20-%20Universit%C3%A9%20Gustave%20Eiffel!5e0!3m2!1sfr!2sfr!4v1709888116532!5m2!1sfr!2sfr"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                        <p>Voici l'adresse de l'expo : 2 rue Albert Einstein, 77420 Champs-sur-Marne en France.</p>
                    </iframe>
                </div>
                <div class="infosAccess">
                    <div class="infoAccess">
                        <div class="h3">
                            <img src="../img/icons/transport.svg" alt="">
                            <h3>
                                <?php echo $_SESSION["lang"] == "fr" ? "Venir en transport" : "By transport" ?>
                            </h3>
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
                            <h3>
                                <?php echo $_SESSION["lang"] == "fr" ? "Venir en voiture" : "By car" ?>
                            </h3>
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
                            <h3>
                                <?php echo $_SESSION["lang"] == "fr" ? "Venir en vélo" : "By bike" ?>
                            </h3>
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
                            <h3>
                                <?php echo $_SESSION["lang"] == "fr" ? "Venir à pied" : "On foot" ?>
                            </h3>
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

    <script src="../scripts/accueil.js" type="module"></script>
</body>

</html>