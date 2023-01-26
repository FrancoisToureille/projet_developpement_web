<?php

//liste de cattegorie pour le filtre
$S_affichageCheckBox = "";

foreach ($A_vue['listeSousCategorie'] as $item){
    $S_affichageCheckBox .= "<div class='categorieCheckBox'><input type='checkbox' name='categories[]' value='$item->idCategorie'>$item->nomCategorie</input></div>";
}

$S_affichageCheckBox .= "<input id='validerCategorie' type='submit' value='Soumettre' name='submit'></form>";


echo
"<div id='navBarr'>
    <div id='barreAutre'>
        <div class='connexion'>
            <img id='img_form' alt='img_form' src='/image/img_form.png'>
            <img class='icon_page' id='img_accueil' alt='img_accueil' src='/image/maison.png'>       
            <div id='connexion_txt'><button class='bouton lien' onclick='goToConnexion()'><span>Connexion - Inscription</span></button></div>
            <div id='accueil_txt'><button class='bouton lien' onclick='goToAccueil()'><span>Accueil</span></button></div>
        </div>
        <form id='search_form' action='/Recherche/afficheResult' method='POST'>
            <div class='search'>
                
                    <input id='search_input' type='text' name='search_input'>
                    <input type='image' id='img_loupe' alt='img_loupe' src='/image/loupe.png'>
            </div>
        </div>
        <div id='barreCategorie'>"
                . $S_affichageCheckBox .
        "</div>
    </form>
</div>";