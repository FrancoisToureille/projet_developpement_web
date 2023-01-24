<div id="connexion">
    <h1> CONNEXION </h1>
    <form id="form_connexion" action="/Connexion/resultatConnexion" method="POST">
        <div class="entre_form">
            <input class="champs_form" name='email' type='email' placeholder="E-mail">
            <input class="champs_form" name='motDePasse' type='password' placeholder="Mot de passe">
        </div>
        <div class="valide_form">
            <input type="submit" class="bouton lien" value="Se Connecter">
        </div>
    </form>
    <p><?php echo $A_vue['information'] ?></p>
    <button id="inscriptionFromConnexion" onclick="goToInscription()">Vous n'avez pas de compte ? Inscrivez-vous !</button>
</div>