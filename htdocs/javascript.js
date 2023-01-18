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

function goToConnexion(){
    document.getElementById('home').style.display = 'none';
    document.getElementById('connexion_txt').style.display = 'none';
    document.getElementById('connexion').style.display = 'flex';
    document.getElementById('accueil_txt').style.display = 'flex';
    document.getElementById('img_accueil').style.display = 'flex';
    document.getElementById('img_form').style.display = 'none';
    document.getElementById('inscription').style.display = 'none';
}

function goToAccueil(){
    document.getElementById('home').style.display = 'flex';
    document.getElementById('connexion_txt').style.display = 'flex';
    document.getElementById('connexion').style.display = 'none';
    document.getElementById('accueil_txt').style.display = 'none';
    document.getElementById('img_accueil').style.display = 'none';
    document.getElementById('inscription').style.display = 'none';
    document.getElementById('img_form').style.display = 'flex';
}

function goToInscription(){
  document.getElementById('connexion').style.display = 'none';
  document.getElementById('inscription').style.display = 'flex';
}

function afficheRecherche(){
  document.getElementById('barreRecherche').style.display = 'flex';
}

function closeRecherche(){
  document.getElementById('barreRecherche').style.display = 'none';
}

function formDown(){
  document.getElementById('formGateau').style.display = 'flex';
  document.getElementById('barreRecherche').style.backgroundColor = "red"
}

function formUp(){
  document.getElementById('formGateau').style.display = 'none';
  document.getElementById('barreRecherche').style.backgroundColor = "green"
}

// When the user scrolls the page, execute myFunction
window.onscroll = function() {scrollFixTop()};

// Get the navbar
var navbar = document.getElementById("navBarr");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function scrollFixTop() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}