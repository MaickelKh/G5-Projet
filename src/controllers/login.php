<?php

require_once('src/models/model.php');

function Login() {
    require_once('src/views/login.php');
}

function verifInput($name, $pwd) {
    try {
            if(!empty($_POST['name']) and !empty($_POST['pwd'])) {
                userConnect($name, $pwd);
            }
            else {
                throw new Exception('Veuillez remplir tous les champs');
            }
        }
        catch (Exception $e) {
            echo $e->getMessage();
    }
}

function userConnect($name, $pwd) {
    
    try {

        $ldap_server = "ldap://192.168.210.1:389" ;
        $ldap_user   = "CN=$name,OU=Admins,DC=EQ5,DC=lan" ;
        $ldap_pass   = "$pwd" ;

        $ad = ldap_connect($ldap_server) ;
        ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3) ;


        if(ldap_bind($ad, $ldap_user, $ldap_pass)) {
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['type'] = 'Admin';
            header('Location:index.php');
            exit();
        } else {
        throw new Exception();
        }

    } catch (Exception $e) {

        $ldap_server = "ldap://192.168.210.1:389" ;
        $ldap_user   = "CN=$name,OU=Students,DC=EQ5,DC=lan" ;
        $ldap_pass   = "$pwd" ;

        $ad = ldap_connect($ldap_server) ;
        ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3) ;

        if(ldap_bind($ad, $ldap_user, $ldap_pass)) {
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['type'] = 'User';
            header('Location:index.php');
            exit();
        } else {
        throw new Exception('<script type="text/javascript">
        window.onload = function () { alert("Nom d\'utilisateur ou mot de passe incorrect"); } 
        </script>');
        }
    }
}
/* 
function userSave($name, $pwd) {
    $userInfo = [
        'name' => $name,
        'pwd' => $pwd
    ];
    return $userInfo;
} */