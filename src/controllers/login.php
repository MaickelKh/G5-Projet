<?php

require_once('src/models/model.php');
require_once('src/views/login.php');

function verifInput() {
    if (isset($_POST['submit'])) {

        try {
            if(!empty($_POST['name']) and !empty($_POST['pwd'])) {
                header('Location: index.php');   
            }
            else {
                throw new Exception('Veuillez remplir tous les champs');
            }
        }
        catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}