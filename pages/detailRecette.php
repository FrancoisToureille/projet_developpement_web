<?php 
function start_detailRecette($recette) { 
    ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Eclair d'Eugénie - Detail de la Recette</title> 
            <!--<link rel="icon" type="image/x-icon" href="images/Bachelor.ico" sizes="96x96" /> -->
            <!-- <script src="./javascript.js"></script> -->
            <!-- <link rel="stylesheet" href="./css/styleAccueil.css"> -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    </head>
    <body>
        <header>
               
        </header>
        <div class="home">
            <div class="navBarr">
            </div>
            <div>
                <h1>Recette : <?php echo $recette; ?> </h1>
            </div>
        </div>

        <div class="homePhone" style="display:none">
            <div class="navBarr">
            </div>
            <div>
                <h1>Recette : <?php echo $recette; ?> </h1>
            </div>
        </div>
        
        <footer>
            
        </footer>
    </body>
</html>
<?php } ?>

<?php 
$recette = "éclair d'Eugenie";
start_detailRecette($recette);
?>