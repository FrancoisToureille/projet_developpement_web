<?php 
function start_index() { 
    ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Eclair d'Eugénie - Accueil</title> 
            <!--<link rel="icon" type="image/x-icon" href="images/Bachelor.ico" sizes="96x96" /> -->
            <!-- <script src="./javascript.js"></script> -->
        <link rel="stylesheet" href="./style/styleIndex.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    </head>
    <body>
        <header>
            <div><img id="img_ampoule" alt="ampoule" src="./image/ampoule.png"></div>
            <div class="titre_page">
                <p class="titre">Eclair</p>
                <p class="titre">D'Eugenie</p>
                <p class="petit_titre">PATISSERIE MAISON</p>
            </div>
            <div><img id="img_eclair" alt="eclair" src="./image/eclairchoco.png"></div>
        </header>
        <div class="home">
            <div class="navBarr">
                <div class="connexion">
                    <img id="img_form" alt="img_form" src="./image/img_form.png">
                    <div class="connexion_txt"><a id="connexion_lien" href="index.php"><p>Connexion - Inscription</p></a></div>
                </div>
                <div class="search">
                    <input id="search_input" type="text">
                </div>
            </div>
        </div>

        <div class="homePhone">
            <div class="navBarr">
                <div class="search">
                </div>
            </div>
        </div>
        
        <footer>
            
        </footer>
    </body>
</html>
<?php } ?>

<?php start_index();
?>