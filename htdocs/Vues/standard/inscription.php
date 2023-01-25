<div id="inscription">
    <h1> INSCRIPTION </h1>
    <form id="form_inscription" action="Inscription/resultatInscription" method="POST">
        <div class="entre_form">
            <p id="informationInscription"></p>
            <input class="champs_form" type='text' name="nom" placeholder="Pseudo" required oninvalid="this.setCustomValidity('Renseigner un pseudo')" oninput="this.setCustomValidity('')">
            <input class="champs_form" type='email' name="email" placeholder="E-mail" required oninvalid="this.setCustomValidity('Renseigner un E-mail')" oninput="this.setCustomValidity('')">
            <input class="champs_form" type='password' name="motDePasse" placeholder="Mot de passe" required oninvalid="this.setCustomValidity('Renseigner un mot de passe')" oninput="this.setCustomValidity('')">
            <p>Votre mot de passe doit contenir</p>
            <ul>
                <li><p>1 Majuscule minimum</p></li>
                <li><p>1 chiffre minimum</p></li>
                <li><p>Au moins 12 caractères</p></li>
            </ul>
            <input class="champs_form" type='password' name="motDePasseVerification" placeholder="Confirmation du mdp" required oninvalid="this.setCustomValidity('Renseigner la confirmation du mot de passe)" oninput="this.setCustomValidity('')">
        </div>
        <div class="valide_form">
            <input type="submit" class="bouton lien" value="S'inscrire">
        </div>
    </form>
    <button id="connexionFromInscription" onclick="goToConnexion()">Vous avez déjà un compte ? Connectez-vous !</button>
</div>