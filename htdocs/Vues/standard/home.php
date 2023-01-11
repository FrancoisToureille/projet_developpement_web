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