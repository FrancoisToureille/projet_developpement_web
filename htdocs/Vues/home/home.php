<?php

// liste de categoorie
$S_affichageCategorie = "";
foreach ($A_vue['listeCategorie'] as $superCategorie => $categorie){
    $S_affichageCategorie .= "<li id='$superCategorie'> $superCategorie <form name='categories' method='POST' action='/Recherche/afficheResult'><br>";
    foreach ($categorie as $sousCategorie){
        $S_affichageCategorie .= "<input id='$sousCategorie->idCategorie' type='radio' name='categories[]' value ='$sousCategorie->idCategorie' onclick='this.form.submit();'><label for='$sousCategorie->nomCategorie'>$sousCategorie->nomCategorie </label>";
    }
    $S_affichageCategorie .= "</form> </li>";
}

//Recettes aléatoires
echo 
"
<div id='recetteEtCategorie'>
    <div id ='blocRecettes'>
        <div class = 'grosBloc'>
            <img alt='fleche' class='arrow left_arrow' src='/image/fleche.png' onclick='recettePrecedente()'> 
            <div class='recettes' id = 'recette1'>
                <p class= 'titreRecette'>" . $A_vue['recette1'] . "</p>
                <p class='ingredientsTitre'> ingredients: </p>
                <p class='ingredients'>" . $A_vue['ingredients1']  . "</p>
                <p class='quantitesTitre'> quantites: </p>
                <p class='quantites'>" . $A_vue['quantites1']  . "</p>
                <p class='instructionsTitre'> instructions: </p>
                <p class='instructions'>" . $A_vue['instructions1']  . "</p>
                <p class='categoriesTitre'> categories: </p>
                <p class='categories'>" . $A_vue['categories1']  . "</p>
            </div>

            <div class='recettes' id = 'recette2'>
                <p class= 'titreRecette'>" . $A_vue['recette2'] . "</p>
                <p class='ingredientsTitre'> ingredients: </p>
                <p class='ingredients'>" . $A_vue['ingredients2']  . "</p>
                <p class='quantitesTitre'> quantites: </p>
                <p class='quantites'>" . $A_vue['quantites2']  . "</p>
                <p class='instructionsTitre'> instructions: </p>
                <p class='instructions'>" . $A_vue['instructions2']  . "</p>
                <p class='categoriesTitre'> categories: </p>
                <p class='categories'>" . $A_vue['categories2']  . "</p>
            </div>

            <div class='recettes' id = 'recette3'>
                <p class='titreRecette'>" . $A_vue['recette3']  . "</p>
                <p class='ingredientsTitre'> ingredients: </p>
                <p class='ingredients'>" . $A_vue['ingredients3']  . "</p>
                <p class='quantitesTitre'> quantites: </p>
                <p class='quantites'>" . $A_vue['quantites3']  . "</p>
                <p class='instructionsTitre'> instructions: </p>
                <p class='instructions'>" . $A_vue['instructions3']  . "</p>
                <p class='categoriesTitre'> categories: </p>
                <p class='categories'>" . $A_vue['categories3']  . "</p>
            </div>

            <img alt='fleche' class='arrow right_arrow' src='/image/fleche.png' onclick='recetteSuivante()'>
        </div>

        <div id='img_recette'>
            <img class='image' id='image1' src=" .$A_vue['image1'] .">
            <img class='image' id='image2' src=" .$A_vue['image2'] .">
            <img class='image' id='image3' src=" .$A_vue['image3'] .">
        </div>

    </div>

    <div class = 'menuCategorie'>
        <ul>"
        . $S_affichageCategorie  .
        "</ul>
    </div>

</div>";
