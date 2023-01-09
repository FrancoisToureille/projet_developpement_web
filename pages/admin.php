<?php 
function start_admin() { 
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
        <div class="home">
            <div class="presentation_form">
                <div class="title_mail">
                    Formulaire :
                </div>
                <form action="resultAdmin.php" method="POST">
                    <div class="info_mail">
                        <div class="nom_prenom">
                            <input id="id" name="id" type="text" placeholder="Id">
                        </div>
                        <input id="motDePasse" type="password" name="motDePasse" placeholder="Mot de Passe">
                    </div>
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
start_admin();
?>

