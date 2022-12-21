<?php

require_once('src/models/model.php');

function home() {
    $model = new Model();
    $model->db = new DbConnect();
    $itemsHome = $model->getItemsHome();

    require_once('src/views/home.php');
}

function userConnect($name, $pwd) {
    
    $ldap_server = "ldap://192.168.210.1:389" ;
    $ldap_user   = "CN=$name,OU=Admins,DC=EQ5,DC=lan" ;
    $ldap_pass   = "$pwd" ;


    $ad = ldap_connect($ldap_server) ;
    ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3) ;


    if(ldap_bind($ad, $ldap_user, $ldap_pass)) {

    echo "Bind successful !";
    } else {
        echo "Invalid user/pass or other errors!";
    }
}

