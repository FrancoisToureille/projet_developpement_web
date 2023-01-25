<?php
$S_affichageCategories = "";
$S_affichageIngredients = "";

foreach ($A_vue['listeSousCategorie'] as $O_sousCategorie){
    $S_affichageCategories .= "<option value=" . $O_sousCategorie->nomCategorie . ">";
}

foreach ($A_vue['listeIngredient'] as $O_ingredient) {
    $S_affichageIngredients .= "<option value=" . $O_ingredient->libelle . ">";
}

echo "<div id='insertion'>
    <h1>Créer une nouvelle recette</h1>
    <form id='form_insertion' action='/Insertion/defaut' method='post'>
        <label for='nom_recette'>Nom de la recette: </label>
        <input type='text' name='nom_recette'></br>
        <label for='choix_categorie'>Selectionnez une ou des catégories: </label>
        <input list='liste_categories' id='choix_categorie' name=choix_categorie'>
        <datalist id='liste_categories'>" . $S_affichageCategories .  
        "</datalist></br>
        <label for='choix_ingredient'>Selectionnez une ou des ingredients: </label>
        <input list='liste_ingredients' id='choix_ingredient' name=choix_ingredient'>
        <datalist id='liste_ingredients'>" . $S_affichageIngredients .  
        // <!-- ingredients et ajouter si inexistant -->
        "</datalist></br>
        <label for='libelle'>Instructions: </label>
        <input type='text' name='libelle'></br>
        <input type='submit' value='Enregistrer'>
    </form>
</div>";