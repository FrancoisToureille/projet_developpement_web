function recettePrecedente(){
  if(document.getElementById('recette1').style.display!='none') {
      document.getElementById('recette1').style.display='none';
      document.getElementById('image1').style.display='none';
      document.getElementById('recette3').style.display='initial';  
      document.getElementById('image3').style.display='initial';  
  }

  else if(document.getElementById('recette3').style.display!='none') {
    document.getElementById('recette3').style.display='none';
    document.getElementById('image3').style.display='none';
    document.getElementById('recette2').style.display='initial';
    document.getElementById('image2').style.display='initial';

  }
  
  else if(document.getElementById('recette2').style.display!='none') {
      document.getElementById('recette2').style.display='none';
      document.getElementById('image2').style.display='none';
      document.getElementById('recette1').style.display='initial';  
      document.getElementById('image1').style.display='initial';  
  }
}

function recetteSuivante(){
  if(document.getElementById('recette1').style.display!='none') {
      document.getElementById('recette1').style.display='none';
      document.getElementById('image1').style.display='none';
      document.getElementById('recette2').style.display='initial';
      document.getElementById('image2').style.display='initial';

  }
  else if(document.getElementById('recette2').style.display!='none') {
    document.getElementById('recette2').style.display='none';
    document.getElementById('image2').style.display='none';
    document.getElementById('recette3').style.display='initial';  
    document.getElementById('image3').style.display='initial';  
  }
  else {
    document.getElementById('recette3').style.display='none';
    document.getElementById('image3').style.display='none';
    document.getElementById('recette1').style.display='initial';  
    document.getElementById('image1').style.display='initial';  

  }
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

/**
 * Change la valeur et le nom du bouton selon le mode de connexion
 */
function changeUtilisateur(){
    const bouton = document.getElementById('boutonChangeUtilisateur');
    if (bouton.value == "Go Utilisateur") {
        bouton.value = "Go admin";
        bouton.name = 'Utilisateur';
    }
    else {
        bouton.value = "Go Utilisateur";
        bouton.name = "admin";
    }
    return;
}

document.getElementById('boutonChangeUtilisateur').onclick = changeUtilisateur;

// Get the button:
let mybutton = document.getElementById("backToTop");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "flex";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
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