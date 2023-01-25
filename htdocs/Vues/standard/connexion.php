<div id="connexion">
    <h1> CONNEXION </h1>
    <form id="form_connexion" action="/Connexion/resultatConnexion" method="POST">
        <div class="entre_form">
            <p id="informationConnexion"></p>
            <input class="champs_form" name='email' type='email' placeholder="E-mail" required oninvalid="this.setCustomValidity('Renseigner un E-mail')" oninput="this.setCustomValidity('')">
            <input class="champs_form" name='motDePasse' type='password' placeholder="Mot de passe" required oninvalid="this.setCustomValidity('Renseigner un mot de passe')" oninput="this.setCustomValidity('')">
        </div>
        <div class="valide_form">
            <input id="boutonChangeUtilisateur" class="bouton lien" type="text" value="Admin" name="Utilisateur" readOnly="readOnly" >
            <input type="submit" class="bouton lien" value="Se Connecter">
        </div>
    </form>
    <button id="inscriptionFromConnexion" onclick="goToInscription()">Vous n'avez pas de compte ? Inscrivez-vous !</button>
</div>