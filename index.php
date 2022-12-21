<?php

session_start();
$_SESSION['name'] = "Maickel";
$_SESSION['type'] = "user";

require_once('src/controllers/home.php');
require_once('src/controllers/reservation.php');


if ($_SESSION['type'] == "user") {
    try {

        #Est on dans le cas d'une reservation
        if (isset($_GET['action']) && isset($_GET['type'])) {
            if (!empty($_GET['action']) && !empty($_GET['type'])) {
                Reservation();
            }
        }
        #Est on dans le cas d'une validation de reservation
        else if (isset($_GET['reserv']) && !empty($_GET['type'])) {
            if (!empty($_GET['reserv']) == "ok" /*&& in_array($whitelist, $_GET['type'])*/) {
                $first = getFirst($_GET['type']);
                if (isset($first['idItem'])) $id = $first['idItem'];
                else {
                    header('Location: index.php?available=no&type='.$_GET['type'].'');
                    exit();
                }
                addOrder($id, $_SESSION['name']);
                editAvailable($id);
                header('Location: index.php?msg=ok');
                exit();
            }
        }
        else if (isset($_GET['available']) && isset($_GET['available']) == "no") {
            /* echo 'Tous nos '.$_GET['type'].' sont déjà en prêt pour le moment.'; */
            throw new Exception('Tous nos '.$_GET['type'].' sont déjà en prêt pour le moment.');
        }
        else if (isset($_GET['msg'])) {
            if (!empty($_GET['msg']) == "ok") {
                echo '<p style="position:absolute;top:80px;color:green;font-size:1.5rem;padding-left:45%;">RESERVATION REUSSIE</p>';
                Home();
            }
        }
        else {
            Home();
        }
    } catch (Exception $e) {
        echo '<script type="text/javascript">
               window.onload = function () { alert("'.$e->getMessage().'"); } 
        </script>'; 
        Home();
        #echo 'Erreur : ' . $e->getMessage();
    }        
}
else {
    echo 'Vous êtes connecté en temps que Admin';
}
