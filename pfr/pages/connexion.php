
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Connexion</title>
</head>

<body>

    <header>
        <a href="/pages/accueil.html"><img src="/images/logoJeudefousremovebg.png" alt="logo" height="100"
                width="100"></a>
        <nav class="navbarhead">
            <ul class="linkshead">
                <li><a class="lienmanusc" href="/pages/accueil.html">Accueil</a></li>
                <li><a class="lienmanusc" href="/pages/lieux.html">Lieux</a></li>
                <li><a class="lienmanusc" href="#">Évènements</a></li>
                <li><a class="lienmanusc" href="/pages/quisommesnous.html">Qui sommes-nous?</a></li>
                <li><a class="lienmanusc" href="#">FAQ</a></li>
                <li><a class="lienmanusc" href="/pages/partie.html">Parties</a></li>
                <li><a class="lienmanusc" href="/pages/jeux.html">Jeux</a></li>

            </ul>
            <div class="buttons">
                <a href="/pages/connexion.html" id="lienconx">Se connecter</a>
                <a href="#"><img src="/images/icons8-male-user-48.png" alt="icone_compte"></a>
                <a href="#"><img src="/images/icons8-la-france-48.png" alt="icone_flagfr"></a>
            </div>
        </nav>
    </header>

    <h1 class="titrepages">Connexion</h1>
    <main id="mainconnex">

        <div id="boxconnect">
            <form action="" method="post">
                <h1 id="titreconx">Se connecter</h1>
                <div class="inputbox">
                    <input type="text" placeholder="Identifiant" required>
                    <i class='bx bx-user' style='color:#fff'></i>
                </div>
                <div class="inputbox">
                    <input type="password" placeholder="Mot de passe" required>
                    <i class='bx bxs-lock' style='color:#fff'></i>
                </div>
                <div class="remember_forgot">
                    <label><input type="checkbox">Se souvenir de moi</label>
                    <a href="#">Mot de passe oublié ?</a>
                </div>
                <button type="submit" class="btn" id="emojicav">Connexion</button>
                <div class="lieninscription">
                    <p>Pas de compte?
                        <a href="/pages/inscription.php">S'inscrire</a>
                    </p>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <div class="liensfooter">
            <h3>Contactez-nous</h3>
            <p class="positionlienfoot"><a class="taillelienfoot" href="#">Contact</a></p>
        </div>

        <div class="liensfooter">
            <h3>À propos</h3>
            <p class="positionlienfoot"><a class="taillelienfoot" href="/pages/mentionslegales.html">Mentions légales</a></p>
        </div>

        <div class="liensfooter">
            <ul class="iconesfooter">
                <li><a href="https://www.facebook.com/?locale=fr_FR"><img src="/images/icons8-facebook-nouveau.svg"
                            alt="icone fb"></a></li>
                <li><a href="https://www.instagram.com/"><img src="/images/icons8-instagram.svg" alt="icone insta"></a>
                </li>
                <li><a href="https://x.com/?lang=fr"><img src="/images/icons8-twitter.svg" alt="icone twitter"></a></li>
            </ul>
        </div>

    
    </footer>
<script src="/app.js"></script>
</body>

</html>