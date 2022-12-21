<?php

require_once('src/lib/database.php');
require_once('src/models/model.php');

class Reserv{
    public DbConnect $db;
    function getItemToReserv($itemType) {
        $req=$this->db->getDb()->prepare("SELECT itemtypes.typeName, COUNT(items.itemTypeID) AS count1, itemtypes.comment, itemtypes.picture 
                                          FROM items JOIN itemtypes ON items.itemTypeID=itemtypes.ID_itemType 
                                          WHERE items.available=1 AND itemtypes.typeName=:itemType GROUP BY items.itemTypeID;");
        $req->bindParam(':itemType', $itemType);
        $req->execute();

        $row = $req->fetch();
        $itemToModify = [
            'typeName' => $row['typeName'],
            'count' => $row['count1'],
            'comment' => $row['comment'],
            'picture' => $row['picture']
        ];
        $req->closeCursor();
        return $itemToModify;
    }

    /* Récupère Le premier item disponnible de la catégorie souhaitée */
    public function getFirst($itemType)
    {
        $req=$this->db->getDb()->prepare("SELECT itemtypes.typeName, items.ID_item, items.item_name FROM items JOIN itemtypes ON items.itemTypeID=itemtypes.ID_itemType WHERE itemtypes.typeName=:itemtype AND items.available=1 LIMIT 1; ");
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

    /* récuperer les demandes en attente */
    public function getWaiting()
    {
        $req=$this->db->getDb()->query("SELECT * FROM `itemleases`WHERE itemleases.validation = 'En attente'; ");
        $itemsHome = [];
        while($tempData = $req->fetch()){
        
            $typename = $tempData['id_lease'];
            $typename = $tempData['ID_lease'];
            $count1 = $tempData['count1'];
            $tempArray = [];
            $tempArray =
                [
                    'typename' => $typename,
                    'count' => $count1
                ];
          
            $itemsHome[] = $tempArray;
        }
        $req->closeCursor();
        return $itemsHome;
    }

    public function getLease($username) {
        $req=$this->db->getDb()->prepare("SELECT * FROM items 
                                          JOIN itemtypes ON itemtypes.ID_itemType=items.itemTypeID 
                                          JOIN itemleases ON itemleases.ID_lease=items.leaseID
                                          WHERE Username=:username");
        $req->bindParam(':username', $username);
        $req->execute();

        $userLeases = [];
        while ($row = $req->fetch()) {
            $userLease = [
                'id' => $row['ID_lease'],
                'username' => $row['Username'],
                'typeName' => $row['typeName'],
                'itemID' => $row['itemID'],
                'startDate' => $row['time_from'],
                'endDate' => $row['time_to'],
                'status' => $row['validation']
            ];
            $userLeases[] = $userLease;
        }
        $req->closeCursor();
        return $userLeases;
    }
    
    function editAvailable($itemID) {
        $req=$this->db->getDb()->prepare("UPDATE items SET available=0 WHERE ID_item=:itemID");
        $req->bindParam(':itemID', $itemID);
        $req->execute();
    }

    function addOrder($itemID,$user) {
        $req=$this->db->getDb()->prepare("INSERT INTO itemleases (itemleases.itemID, itemleases.validation, itemleases.Username) VALUES (:itemID, 'En attente', :user);  ");
        $req->bindParam(':itemID', $itemID);
        $req->bindParam(':user', $user);
        $req->execute();
    }

    public function getLastLease($user)
    {
        $req=$this->db->getDb()->prepare(" SELECT itemleases.ID_lease FROM itemleases WHERE itemleases.Username=:user ORDER BY itemleases.ID_lease DESC LIMIT 1; ");
        $req->bindParam(':user', $user);
        $req->execute();
        $lastLease = null;
        while($tempData = $req->fetch()){

            $lastLease = $tempData['ID_lease'];
        }
        $req->closeCursor();
        return $lastLease;
    }
    public function changeLease($idItem,$lease)
    {
        $req=$this->db->getDb()->prepare("UPDATE items SET items.leaseID =:lease1 WHERE items.ID_item = :idItem1");
        $req->bindParam(':lease1', $lease);
        $req->bindParam(':idItem1', $idItem);
        $req->execute();
    }

}



