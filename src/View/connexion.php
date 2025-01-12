<form action="" id="form" method="POST">
    <div class="conteneurChamp">
        <div class="formgauche"><span>Email</span></div>
        <div class="formdroite"><input type="email" name="email" id="email" value="<?php if(isset($_COOKIE['email'])){ echo($_COOKIE['email']); }?>"></div>
    </div>
    <div class="conteneurChamp">
        <div class="formgauche"><span>Password</span></div>
        <div class="formdroite"><input type="password" name="password" id="password" value="<?php if(isset($_COOKIE['password'])){ echo($_COOKIE['password']); }?>"></div>
    </div>
    <div class="conteneurChamp">
        <div id="check"><span>Rester connecté</span><input type="checkbox" name="checkStay" id="checkStay"></div>
    </div>
    <div class="redir">
            <span>Vous n'avez pas encore de compte ? </span>
            <a href="inscription.php">S'inscrire</a>
    </div>
    <div class="redir">
            <span>Mot de passe oublié? </span>
            <a href="mail_a_reinitialiser.php">Cliquer ici</a>
    </div>
    <div id="validation">
        <input type="submit" value="Se connecter" name="lance_connexion">
    </div>
</form>