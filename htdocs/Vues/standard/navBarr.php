<div id="navBarr">
    <div class="connexion">
        <img id="img_form" alt="img_form" src="/image/img_form.png">
        <img class="icon_page" id="img_accueil" alt="img_accueil" src="/image/maison.png">
        <div id="connexion_txt_bis"><button class="bouton lien" onclick="goToConnexion()"><span>Connexion</span></button></div>        <div id="connexion_txt"><button class="bouton lien" onclick="goToConnexion()"><span>Connexion - Inscription</span></button></div>
        <div id="accueil_txt"><button class="bouton lien" onclick="goToAccueil()"><span>Accueil</span></button></div>
    </div>
    <div class="search">
        <form action="/Recherche/rechercheRegex" method="POST">
            <input id="search" type="text" name="search_input">
            <input type="image" id="img_loupe" alt="img_loupe" src="./image/loupe.png">
        </form>
    </div>
</div>