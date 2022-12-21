<?php

session_start();
require_once('src/controllers/login.php');

if (isset($_POST['submit'])) {

    try {

        if (isset($_POST['name']) && isset($_POST['pwd'])) {
            if(!empty($_POST['name']) && !empty($_POST['pwd'])) {
                verifInput($_POST['name'], $_POST['pwd']);
                Login();
            } else {
                throw new Exception("Veuillez remplir tous les champs");
            }
        }
        else if (!isset($_POST['name']) && isset($_POST['pwd'])) {
            throw new Exception("Veuillez remplir tous les champs");
        }
        else if (!isset($_POST['pwd']) && isset($_POST['name'])) {
            throw new Exception("Veuillez remplir tous les champs");
        }
        Login();
    
    } catch (Exception $e) {
        echo '<script type="text/javascript">
               window.onload = function () { alert("'.$e->getMessage().'"); } 
        </script>';
    }      
}

Login();