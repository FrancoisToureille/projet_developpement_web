<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Eclair d'Eugénie - Accueil</title> 
            <!--<link rel="icon" type="image/x-icon" href="images/Bachelor.ico" sizes="96x96" /> -->
            <!-- <script src="./javascript.js"></script> -->
        <link rel="stylesheet" href="./style/styleIndex.css">
        <link rel="stylesheet" href="../style/styleIndex.css">
        <script src="./javascript.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    </head>
    <body>
        <?php Vue::montrer('standard/entete'); ?>
        <?php echo $A_vue['body'] ?>
        <?php Vue::montrer('standard/home'); ?>
        <?php Vue::montrer('standard/pied'); ?>
    </body>
</html>