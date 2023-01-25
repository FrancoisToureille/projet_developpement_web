<?php
$S_affichageCategories = "";
$S_affichageIngredients = "";

foreach ($A_vue['listeSousCategorie'] as $O_sousCategorie){
    $S_affichageCategories .= "<option name='categories[]' value=" . $O_sousCategorie->idCategorie . ">" . $O_sousCategorie->nomCategorie . "</option>";
}

foreach ($A_vue['listeIngredient'] as $O_ingredient) {
    $S_affichageIngredients .= "<option name='ingredients[]' value=" . $O_ingredient->idIngredient . ">" . $O_ingredient->libelle . "</option>";
}

echo "<div id='insertion'>
    <h1>Créer une nouvelle recette</h1>
    <form id='form_insertion' action='/Insertion/enregistreRecette' method='post'>
        <label for='nom_recette'>Nom de la recette: </label>
        <input type='text' name='nom_recette'></br>
        <label for='choix_categorie'>Selectionnez une ou des catégories: </label>
        <select multiple name='categories[]' id='liste_categories'>" . $S_affichageCategories .  
        "</select></br>
        <label for='choix_ingredient'>Selectionnez un ou des ingredients: </label>
        <select name='ingredients[]' multiple id='liste_ingredients' style='width:6em'>" . $S_affichageIngredients .  
        // <!-- ingredients et ajouter si inexistant -->
        "</select>
        <label for='quantite'>Quantite: </label>
        <input type='text' name='quantite_ingredient'></br>
        <label for='libelle'>Instructions: </label>
        <input type='text' name='libelle'></br>
        <label for='lienImage'>Lien de l'image de la recette (facultatif): </label>
        <input type='text' name='lienImage'></br>
        <input type='submit' value='Enregistrer'>
    </form>
</div>";