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
}