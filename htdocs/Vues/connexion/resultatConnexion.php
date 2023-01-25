<?php
Vue::montrer('standard/connexion');
echo '<script> 
    document.getElementById("connexion_txt").style.display = "none";
    document.getElementById("connexion").style.display = "flex";
    document.getElementById("accueil_txt").style.display = "flex";
    document.getElementById("img_accueil").style.display = "flex";
    document.getElementById("img_form").style.display = "none";
    document.getElementById("boutonChangeUtilisateur").value = "' . $A_vue['statusBouton'] . '";
    document.getElementById("boutonChangeUtilisateur").name = "' . $A_vue['statusBoutonName'] . '";
    document.getElementById("informationConnexion").innerHTML = "' . $A_vue['information'] . '" </script>';