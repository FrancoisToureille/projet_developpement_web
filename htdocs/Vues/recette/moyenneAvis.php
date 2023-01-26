<?php
echo"<div class='moyenneAvis'>
        <p>La moyenne des avis est de " . $A_vue['moyenneNotation'] . "</p>
        <input type='range' id='notation' name='notation'
         min='0' max='5' value='" . $A_vue['moyenneNotation'] . "' disabled>
        </div>";