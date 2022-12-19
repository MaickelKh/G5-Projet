<?php $titre = 'Equipe 5 - Connection' ;?>

<?php ob_start(); ?> 
    <div id="bgForm">
        <form method="post" action="index.php" class="formz">
            <img src="content/img/logo.png" alt="Logo">
            <p class="fTitle">connection</p>
            <p>Nom d'utilisateur</p>
            <input type="text" class="input"></input>
            <p>Mot de passe</p>
            <input type="password" class="input"></input>
            <input type="submit" value="Se connecter" class="submitButton">
        </form>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>

