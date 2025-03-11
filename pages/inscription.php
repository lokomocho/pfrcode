<?php
//Déclaration de ma variable d'affichage
$message ="";

//Fonction de nettoyage des données
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

//fonction ajout utilisateur
function addUser(){
    if(empty($_POST["login"]) || empty($_POST["password"]) ){
        return "Veuillez remplir tous les champs.";
    }

    //Nettoyage des données
    $login = sanitize($_POST["login"]);
    $password = sanitize($_POST["password"]);

    //hashage du mot de passe
    $password = password_hash($password, PASSWORD_BCRYPT);

  //instanciation de l'objet de connexion PDO
    $bdd = new PDO('mysql:host=localhost;dbname=jeudefous','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    $check = $bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE login_utilisateur = ?');
    $check->execute([$login]);
    if ($check->fetchColumn() > 0) {
        return "Ce login est déjà utilisé.";
    }

    try{
       
        //stockage de la requête
        $req = $bdd->prepare('INSERT INTO utilisateur (login_utilisateur, mdp_utilisateur) VALUES (?,?)');
        $req->bindParam(1,$login,PDO::PARAM_STR);
        $req->bindParam(2,$password,PDO::PARAM_STR);

        //exécution de la requête
        $req->execute();

        //message de confirmation
        return "$login a bien été enregistré.";

    }catch(Exception $error){
        return $error->getMessage();
    }
    
//Traitement du formulaire d'inscription
if(isset($_POST["submit"])){
    $message = addUser();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Inscription</title>
</head>

<body>
<body>
<header>
        <a href="/pages/index.html"><img src="/images/logoJeudefousremovebg.png" alt="logo" height="100"
                width="100"></a>
        <nav class="navbarhead">
            <ul class="linkshead">
                <li><a class="lienmanusc" href="/pages/index.html">Accueil</a></li>
                <li><a class="lienmanusc" href="/pages/lieux.html">Lieux</a></li>
                <li><a class="lienmanusc" href="/pages/events.html">Évènements</a></li>
                <li><a class="lienmanusc" href="/pages/quisommesnous.html">Qui sommes-nous?</a></li>
                <li><a class="lienmanusc" href="/pages/faq.html">FAQ</a></li>
                <li><a class="lienmanusc" href="/pages/jeux.html">Jeux</a></li>
            </ul>
            <div class="buttons">
                <a href="/pages/connexion.php" id="lienconx">Se connecter</a>
                <a href="/pages/moncompte.html"><img src="/images/icons8-male-user-48.png" alt="icone_compte"></a>
                <img src="/images/icons8-la-france-48.png" alt="icone_flagfr">
            </div>
        </nav>
    </header>
    <h1 class="titrepages">Inscription</h1>
    <main id="mainconnex">
            <form action="" method="post" id="boxconnect">
                <h1 id="titreconx">S'inscrire</h1>
                <div class="inputbox">
                    <input type="text" placeholder="Identifiant" name="login" required>
                    <i class='bx bx-user' style='color:#fff'></i>
                </div> 
                <div class="inputbox">
                    <input type="password" placeholder="Mot de passe" name="password" required>
                    <i class='bx bxs-lock' style='color:#fff'></i>
                </div>    
                <div class="remember_forgot">
                    <label><input type="checkbox">Se souvenir de moi</label>
                    <a href="#">Mot de passe oublié ?</a>
                </div>
                <button type="submit" class="btn" id="emojicav" name="submit">S'inscrire</button>
                </div>
            </form>
            <p><?php echo $message ?></p>

    </main>

    <footer>
    <div class="liensfooter">
        <h3>Contactez-nous</h3>
        <p class="positionlienfoot"><a class="taillelienfoot" href="#">Contact</a></p>
    </div>

    <div class="liensfooter">
        <h3>À propos</h3>
        <p class="positionlienfoot"><a class="taillelienfoot" href="/pages/mentionslegales.html">Mentionslégales</a></p>
    </div>

    <div class="liensfooter">
        <ul class="iconesfooter">
            <li><a href="https://www.facebook.com/?locale=fr_FR"><img src="/images/icons8-facebook-nouveau.svg" alt="icone fb"></a></li>
            <li><a href="https://www.instagram.com/"><img src="/images/icons8-instagram.svg" alt="icone insta"></a></li>
            <li><a href="https://x.com/?lang=fr"><img src="/images/icons8-twitter.svg" alt="icone twitter"></a></li>
        </ul>
    </div>
</footer>
</body>
</html>