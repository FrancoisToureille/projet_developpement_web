<?php
echo"<div class='ajouterAvis'>
        <p>Votre avis est </p>
        <input type='range' id='notation' name='notation'
         min='0' max='5' value='" . $A_vue['notation'] . "' disabled>
        </div>";