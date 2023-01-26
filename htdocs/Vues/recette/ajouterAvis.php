<?php
echo"<form class='ajouterAvis' action='/recette/ajouterAvis/" . $A_vue['idRecette']  . "' method='post'>
        <input type='range' id='notation' name='notation'
         min='0' max='5' step='1'>
        <label for='volume'>Avis</label>
        <input type='submit' value='Noter' name='boutonNoter'>
        </form>";