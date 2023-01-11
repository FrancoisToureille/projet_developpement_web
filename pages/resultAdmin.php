<?php 
function start_resultAdmin() { 
    ?>
<!DOCTYPE html>
<html>
    <head>
            <!--<script src="https://kit.fontawesome.com/8e09982db4.js" crossorigin="anonymous"></script>-->
            <!--<link rel="icon" type="image/x-icon" href="../images/Bachelor.ico" sizes="96x96" /> -->
        <title>BackToBachelor - Connection Admin</title>  
        <!--<script src="../javascript.js"></script> -->
        <!--<link rel="stylesheet" href="../css/styleContact.css"> -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    </head>
    <body>
        <header>

        </header>
        <div class="menu">
            <div class="presentation_form">
                <div class="titre_mail">
                    Que voulez-vous faire? :
                </div>

                <div id = "choix">
                    <button id="supprimer" onclick="afficherInserer()()">Ajouter recette?</button>
                    <br/>
                    <button id="modifier" onclick="afficherModifier()">Modifier recette?</button>

                    <button id="inserer" onclick="afficherSupprimer()">Supprimer utilisateur?</button>
                </div>
                <br/>

                <form id ="formSupprimer" action="resultAdmin.php" method="POST" style="display:none" >
                        <input id="idQuestion" name="idQuestion" type="text" placeholder="IdQuestion">
                <div class="valide_form">
                        <input type="submit" name="action" value="valider"/>
                </div>
                </form>

                <form id ="formInserer" action="resultAdmin.php" method="POST" style="display:none" >
                        <input id="libelle" name="libelle" type="text" placeholder="libelle">
                        <input id="theme" name="theme" type="text" placeholder="theme">
                        <input id="difficulte" name="difficulte" type="text" placeholder="difficulte">
                        <input id="indice" name="indice" type="text" placeholder="indice">
                        <input id="explication" name="explication" type="text" placeholder="explication">
                        <input id="reponse1" name="reponse1" type="text" placeholder="reponse 1">
                        <input id="bonneRep1" name="bonneRep1" type="text" placeholder="Rep Bonne? (1 bon, 0 mauvais)">
                        <input id="reponse2" name="reponse2" type="text" placeholder="reponse 2">
                        <input id="bonneRep2" name="bonneRep2" type="text" placeholder="Rep Bonne? (1 bon, 0 mauvais)">
                        <input id="reponse3" name="reponse3" type="text" placeholder="reponse 3">
                        <input id="bonneRep3" name="bonneRep3" type="text" placeholder="Rep Bonne? (1 bon, 0 mauvais)">
                        <input id="reponse4" name="reponse4" type="text" placeholder="reponse 4">
                        <input id="bonneRep4" name="bonneRep4" type="text" placeholder="Rep Bonne? (1 bon, 0 mauvais)">
                <div class="valide_form">
                        <input type="submit" name="action" value="valider"/>
                </div>
                </form>

                <form id ="formModifier" action="resultAdmin.php" method="POST" style="display:none" >
                        <input name="id" type="text" placeholder="id">
                        <input name="libelle" type="text" placeholder="libelle">
                        <input name="theme" type="text" placeholder="theme">
                        <input name="difficulte" type="text" placeholder="difficulte">
                        <input name="indice" type="text" placeholder="indice">
                        <input name="explication" type="text" placeholder="explication">
                        <input name="reponse1" type="text" placeholder="reponse 1">
                        <input name="bonneRep1" type="text" placeholder="Rep Bonne? (1 bon, 0 mauvais)">
                        <input name="reponse2" type="text" placeholder="reponse 2">
                        <input name="bonneRep2" type="text" placeholder="Rep Bonne? (1 bon, 0 mauvais)">
                        <input name="reponse3" type="text" placeholder="reponse 3">
                        <input name="bonneRep3" type="text" placeholder="Rep Bonne? (1 bon, 0 mauvais)">
                        <input name="reponse4" type="text" placeholder="reponse 4">
                        <input name="bonneRep4" type="text" placeholder="Rep Bonne? (1 bon, 0 mauvais)">
                <div class="valide_form">
                        <input type="submit" name="action" value="valider"/>
                </div>
                </form>
            </div>
            
        </div>
        <footer> 
        </footer>
    </body>
</html>
<?php } ?>

<?php 
start_resultAdmin();
?>