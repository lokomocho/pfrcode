<?php
//Déclaration de ma variable d'affichage
$message ="";

//Fonction de nettoyage des données
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

//fonction ajout utilisateur
function addUser(){
    if(empty($_POST["email"]) || empty($_POST["password"]) ){
        return "Veuillez remplir tous les champs.";
    }

    //vérification du format des données
    //si l'email ne ressemble pas à un email, on retourne un message d'erreur
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        return "L'email n'est pas au bon format.";
    }
    }

    //Nettoyage des données
    $email = sanitize($_POST["email"]);
    // if(!preg_match('/[a-zA-Z0-9.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)){
    //     return "L'email n'est pas au bon format.";
    // }

    $password = sanitize($_POST["password"]);

    //hashage du mot de passe
    $password = password_hash($password, PASSWORD_BCRYPT);

  //instanciation de l'objet de connexion PDO
    $bdd = new PDO('mysql:host=localhost;dbname=jeudefous','root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


    try{
       
        //la méthode prepare() retourne un nouvel objet, je dois donc le stocker pour le réutiliser
        $req = $bdd->prepare('INSERT INTO utilisateur (mail_utilisateur, mdp_utilisateur) VALUES (?,?)');

        //3eme Etape : je vais devoir remplir mes étiquettes 
        //utilisation de la méthode bindParam()
        //1er Paramète : la position du ? dans ma requête
        //2nd Paramètre : la valeur du ?
        //3eme Paramètre : le format de donnée du ?
        $req->bindParam(1,$email,PDO::PARAM_STR);
        $req->bindParam(2,$password,PDO::PARAM_STR);

        //4eme Etape : exécution de la requête avec la methode execute()
        $req->execute();

        //Je retourne un message de confirmation
        return "$email a bien été enregistré.";

    }catch(EXCEPTION $error){
        return $error->getMessage();
    }

//Traitement du formulaire d'inscription quand on le reçoit
if(isset($_POST["submit"])){
    $message = addUser();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.scss">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Inscription</title>
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
    <h1 class="titrepages">Inscription</h1>
    <main id="mainconnex">

        <div id="boxconnect">
            <form action="" method="post">
                <h1 id="titreconx">S'inscrire</h1>
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
                <button type="submit" class="btn" id="emojicav">S'inscrire</button>
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