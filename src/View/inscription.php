<form action="" id="form" method="POST">
    <div class="conteneurChamp">
        <div class="formgauche"><span>Username</span></div>
        <div class="formdroite"><input type="text" name="username" id="username" ></div>
    </div>
    <div class="conteneurChamp">
        <div class="formgauche"><span>Email</span></div>
        <div class="formdroite"><input type="email" name="email" id="email" ></div>
    </div>
    <div class="conteneurChamp">
        <div class="formgauche"><span>Password</span></div>
        <div class="formdroite"><input type="password" name="password" id="password" ></div>
    </div>
    <div class="conteneurChamp">
        <div class="formgauche"><span>Confirm</span></div>
        <div class="formdroite"><input type="password" name="password_confirm" id="password_confirm" ></div>
    </div>
    <div class="redir">
            <span>Vous avez déjà un compte?  </span>
            <a href="connexion.php">Se connecter</a>
    </div>
    <div id="validation">
        <input type="submit" value="S'inscrire" name="lance_inscription">
    </div>
</form>