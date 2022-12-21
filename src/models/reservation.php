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
}

/* class ReservRepository {
    public DbConnect $db;
    public function getPetToModify(int $id) : array{
        $req=$this->db->getDb()->prepare('SELECT p.id_pet, p.name petsName, p.id_cat, p.walks, p.meals,p.comment 
                            FROM pets p WHERE p.id_pet =?;');
        $req->execute(array($id));

        $row = $req->fetch();

        $petToModify = new ModifPet();
        $petToModify->id_pet = $row['id_pet'];
        $petToModify->name = $row['petsName'];
        $petToModify->walks = $row['walks'];;
        $petToModify->comment = $row['comment'];;
        $petToModify->meals = $row['meals'];;

        $req->closeCursor();
        return $petToModify;

        
    }
    
    public function editPet($walks, $meals, $comment, $id) {
    
        $modifPet=$this->db->getDb()->prepare('UPDATE pets
                                  SET walks=?, meals=?,comment=?
                                  WHERE pets.id_pet=?');
        $affectedLines = $modifPet->execute(array($walks, $meals, $comment, $id));
        $modifPet->closeCursor();
    
        return ($affectedLines > 0);
    
    }
} */