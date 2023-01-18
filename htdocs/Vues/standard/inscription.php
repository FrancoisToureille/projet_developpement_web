<div id="inscription">
    <h1> INSCRIPTION </h1>
    <form id="form_inscription">
        <div class="entre_form">
            <input class="champs_form" type='text' placeholder="Pseudo">
            <input class="champs_form" type='email' placeholder="E-mail">
            <input class="champs_form" type='password' placeholder="Mot de passe">
            <p>Votre mot de passe doit contenir</p>
            <ul>
                <li><p>1 Majuscule minimum</p></li>
                <li><p>1 chiffre minimum</p></li>
                <li><p>Au moins 12 caractères</p></li>
            </ul>
            <input class="champs_form" type='password' placeholder="Confirmation du mdp">
        </div>
        <div class="valide_form">
            <input type="submit" class="bouton lien" value="S'inscrire">
        </div>
    </form>
    <button id="connexionFromInscription" onclick="goToConnexion()">Vous avez déjà un compte ? Connectez-vous !</button>
</div>