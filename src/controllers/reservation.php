<?php
require('src/models/reservation.php');
function Reservation(){
    $reservation = new Reserv();
    $reservation->db = new DbConnect();
    $itemToReserv = $reservation->getItemToReserv($_GET['type']);
    $userLeases = $reservation->getLease($_SESSION['name']);

    require('src/views/reservation.php');
}
function getDb() 
{
    date_default_timezone_set('Europe/Brussels');
    $hote='localhost';
    $nomBD='projet';
    $user='root';
    $mdp='';
    try {
        $db = new PDO('mysql:host='.$hote.';dbname='.$nomBD.';charset=utf8', $user, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
    catch (Exception $e) {
        echo "Erreur de connexion à la BD : $e";
    }
}

function getFirst($itemType) {
    $db = getDb();
    $req=$db->prepare("SELECT itemtypes.typeName, items.ID_item, items.item_name FROM items JOIN itemtypes ON items.itemTypeID=itemtypes.ID_itemType WHERE itemtypes.typeName=:itemtype AND items.available=1 LIMIT 1; ");
    $req->bindParam(':itemtype', $itemType);
    $req->execute();
    $first = [];
    while($tempData = $req->fetch()){
    
        $typeName = $tempData['typeName'];
        $idItem = $tempData['ID_item'];
        $itemName = $tempData['item_name'];
        $first =
        [
            'typename' => $typeName,
            'idItem' => $idItem,
            'itemName' => $itemName
        ];
    }
    $req->closeCursor();
    return $first;
}

function addOrder($itemID,$user) {
    $itemID1 = $itemID;
    $user1 = $user;
    $db = getDb();
    $req=$db->prepare("INSERT INTO itemleases (itemleases.itemID, itemleases.validation, itemleases.Username) VALUES (:itemID, 'En attente', :user);  ");
    $req->bindParam(':itemID', $itemID1);
    $req->bindParam(':user', $user1);
    $req->execute();
}

function editAvailable($itemID) {
    $db = getDb();
    $req=$db->prepare("UPDATE items SET available=0 WHERE ID_item=:itemID");
    $req->bindParam(':itemID', $itemID);
    $req->execute();
}

function getLastLease($user)
{
    $bdd = getDb();
    $req=$bdd->prepare(" SELECT itemleases.ID_lease FROM itemleases WHERE itemleases.Username=:user ORDER BY itemleases.ID_lease DESC LIMIT 1; ");
    $req->bindParam(':user', $user);
    $req->execute();
    $lastLease = null;
    while($tempData = $req->fetch()){

        $lastLease = $tempData['ID_lease'];
    }
    $req->closeCursor();
    return $lastLease;
}

function changeLease($idItem,$lease)
{
    $bdd = getDb();
    $req=$bdd->prepare("UPDATE items SET items.leaseID =:lease1 WHERE items.ID_item = :idItem1");
    $req->bindParam(':lease1', $lease);
    $req->bindParam(':idItem1', $idItem);
    $req->execute();
}
