<?php ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Eclair d'Eugénie - Accueil</title> 
            <!--<link rel="icon" type="image/x-icon" href="images/Bachelor.ico" sizes="96x96" /> -->
            <!-- <script src="./javascript.js"></script> -->
        <link rel="stylesheet" href="/style/styleIndex.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    </head>
    <body>
        <?php Vue::montrer('standard/entete');?>
        <?php Vue::montrer('standard/navBarr', array('listeSousCategorie' => $A_vue['listeSousCategorie']));?>
        
        <?php // on met cela ici pour que nos vues déclenchées par le controleur s'écrivent ici//
        echo $A_vue['body']; ?>

        <?php Vue::montrer('standard/home');?>
        <?php Vue::montrer('standard/inscription');?>
        <?php Vue::montrer('standard/connexion'); ?>
        <?php Vue::montrer('standard/pied'); ?>

        <?php /*php Vue::montrer('standard/home'); ?>
        <?php Vue::montrer('standard/inscription'); ?>
        <?php Vue::montrer('standard/connexion'); ?>
        <?php Vue::montrer('standard/pied'); ?>
        <?php echo $A_vue['body']
                <?php Vue::montrer('standard/navBarr');?>
 */?>
    </body>
</html>