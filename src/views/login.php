<?php $title = 'Equipe 5 - Connection' ;?>

<?php ob_start(); ?> 
    <div id="bgForm">
        <form method="POST" action="login.php" class="formz">
            <img src="content/img/logo.png" alt="Logo">
            <p class="fTitle">connection</p>
            <p>Nom d'utilisateur</p>
            <input type="text" name="name" class="input"></input>
            <p>Mot de passe</p>
            <input type="password" name="pwd" class="input"></input>
            <input type="submit" name="submit" value="Se connecter" class="submitButton">
        </form>
    </div>
    <style>footer {position:absolute;bottom:0;}</style>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>

