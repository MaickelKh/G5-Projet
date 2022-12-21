<?php

require_once('src/lib/database.php');

class Model
{
    // Effectue la connexion à la db
    // Instancie et renvoie l'objet PDO associé
    public DbConnect $db;

    /* Récupère les types de matériaux ainsi que leur nombre dans un tableau de forme */
    function getItemsHome(){
        $req=$this->db->getDb()->query("SELECT itemtypes.typeName, COUNT(items.itemTypeID) AS count1, itemtypes.comment, itemtypes.picture 
                         FROM items JOIN itemtypes ON items.itemTypeID=itemtypes.ID_itemType 
                         WHERE items.available=1 GROUP BY items.itemTypeID; ");
        $itemsHome = [];
        while ($row = $req->fetch()) {
            $itemHome = [
                'typename' => $row['typeName'],
                'count' => $row['count1'],
                'comment' => $row['comment'],
                'picture' => $row['picture']
            ];
            $itemsHome[] = $itemHome;
        }
        $req->closeCursor();
        return $itemsHome;
    }

    /* Récupère Le premier item disponnible de la catégorie souhaitée */
    public function getFirst($itemType)
    {
        $itemType1 = $itemType;
        $req=$this->db->getDb()->prepare("SELECT itemtypes.typeName, items.ID_item, items.item_name FROM items JOIN itemtypes ON items.itemTypeID=itemtypes.ID_itemType WHERE itemtypes.typeName=:itemtype AND items.available=1 LIMIT 1; ");
        $req->bindParam(':itemtype', $itemType1);
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
    /* envoi d'un formulaire de réservation dans la db */
    public function addOrder($itemID, $timeFrom, $timeTo, $user)
    {
        $itemID1 = $itemID;
        $timeFrom1 = $timeFrom;
        $timeTo1 = $timeTo;
        $user1 = $user;
        $req=$this->db->getDb()->prepare("INSERT INTO itemleases (itemleases.itemID, itemleases.time_from, itemleases.time_to, itemleases.validation, itemleases.Username) VALUES (:itemID, :timeFrom, :timeTo, 'En attente', :user);  ");
        $req->bindParam(':itemID', $itemID1);
        $req->bindParam(':timeFrom', $timeFrom1);
        $req->bindParam(':timeTo', $timeTo1);
        $req->bindParam(':user', $user1);
        $req->execute();
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



}