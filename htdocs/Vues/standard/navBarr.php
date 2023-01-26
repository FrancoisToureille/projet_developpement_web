<?php

//liste de cattegorie pour le filtre
$S_affichageCheckBox = "";

foreach ($A_vue['listeSousCategorie'] as $item){
    $S_affichageCheckBox .= "<input type='checkbox' name='categories[]' value='$item->idCategorie'>$item->nomCategorie</input>";
}

$S_affichageCheckBox .= "<input type='submit' value='Soumettre' name='submit'></form>";


echo
"<div id='navBarr'>
    <div class='connexion'>
        <img id='img_form' alt='img_form' src='/image/img_form.png'>
        <img class='icon_page' id='img_accueil' alt='img_accueil' src='/image/maison.png'>       
        <div id='connexion_txt'><button class='bouton lien' onclick='goToConnexion()'><span>Connexion - Inscription</span></button></div>
        <div id='accueil_txt'><button class='bouton lien' onclick='goToAccueil()'><span>Accueil</span></button></div>
    </div>
    <div class='search'>
        <form action='/Recherche/afficheResult' method='POST'>
            <input id='search' type='text' name='search_input'>
            <input type='image' id='img_loupe' alt='img_loupe' src='/image/loupe.png'> "
            . $S_affichageCheckBox .
       " </form>
    </div>
</div>";