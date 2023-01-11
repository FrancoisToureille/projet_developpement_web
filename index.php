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
        <script src="./javascript.js"></script>
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
                    <img id="img_loupe" alt="img_loupe" src="./image/loupe.png">
                </div>
            </div>

            <div class="homePhone">
                <div class="navBarr">
                    <div class="search">
                    </div>
                </div>
            </div>

            <div class="recipesAndCategories">
                <div class="randomRecipe">
                    <div class="recipeTitle"><a href="index.php">Recette cannelé (4. personnes)</a></div>
                    <div class="recipeView">
                        <img class="arrow left_arrow" alt="right_arrow" src="./image/fleche.png">
                        <a href="index.php"><img id="img_cannele" alt="cannele" src="./image/cannele.jfif"></a>
                        <img class="arrow right_arrow" alt="right_arrow" src="./image/fleche.png">
                    </div>
                </div>
                <div class="categorie">
                    <div id="slider">
                        <span class="controls" onclick="prevSlide(-1)" id="left-arrow">
                            <img class="fa arrow left_arrow" src="image/fleche.png">
                            <!--<i class="fa fa-arrow-left" aria-hidden="true"></i>-->
                        </span>
                        <span class="controls" id="right-arrow" onclick="nextSlide(1)">
                            <img class="fa arrow right_arrow" src="image/fleche.png">
                            <!--<i class="fa fa-arrow-right" aria-hidden="true"></i>-->
                        </span>
                        <div class="slide" style="background:dodgerBlue;">
                            <img class="bouffe" src="image/crepe.jpg">
                        </div>
                        <div class="slide" style="background:coral;">
                            <img class="bouffe" src="image/cannele.jfif">
                        </div>
                        <div class="slide" style="background:crimson;">
                            <img class="bouffe" src="image/tropezienne.jpg">
                        </div>
                        <div id="dots-con">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>

                    <script type="text/javascript">
                        var slides = document.querySelectorAll(".slide");
                        var dots = document.querySelectorAll(".dot");
                        var index = 0;


                        function prevSlide(n){
                        index+=n;
                        console.log("prevSlide is called");
                        changeSlide();
                        }

                        function nextSlide(n){
                        index+=n;
                        changeSlide();
                        }

                        changeSlide();

                        function changeSlide(){

                        if(index>slides.length-1)
                            index=0;

                        if(index<0)
                            index=slides.length-1;
                            for(let i=0;i<slides.length;i++){
                            slides[i].style.display = "none";
                            dots[i].classList.remove("active");
                            }
                            slides[index].style.display = "block";
                            dots[index].classList.add("active");
                        }
                    </script>

                </div>
            </div>
        </div>
        
        <footer>
            <div class="reseaux">

            </div>
            <div class="mention">

            </div>
            <div class="backToTop">

            </div>
        </footer>
    </body>
</html>
<?php } ?>

<?php start_index();
?>