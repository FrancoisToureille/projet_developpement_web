<?php
Vue::montrer('standard/inscription');
echo '<script> 
  document.getElementById("connexion_txt").style.display = "none";
  document.getElementById("accueil_txt").style.display = "flex";
  document.getElementById("img_accueil").style.display = "flex";
  document.getElementById("img_form").style.display = "none";
  document.getElementById("inscription").style.display = "flex";
  document.getElementById("informationInscription").innerHTML = "' . $A_vue['information'] . '" </script>';
