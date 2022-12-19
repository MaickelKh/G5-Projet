<?php 

function getDb(){
    date_default_timezone_set('Europe/Brussels');
    $hote='localhost';
    $nomdb='walkingpets';
    $user='root';
    $mdp='';
    try {
        $db=new PDO('mysql:host='.$hote.';dbname='.$nomdb, $user, $mdp);
        $db->exec("SET NAMES 'utf8'");
    }
    catch (Exception $e) {
    echo "Erreur de connexion à la db : $e";
    }

    return $db;
}
function getPetToModify(int $id){
    $db = getDb();
    $req=$db->prepare('SELECT p.id_pet, p.name petsName, p.id_cat, p.walks, p.meals,p.comment 
                        FROM pets p WHERE p.id_pet =?;');
    $req->execute(array($id));
    $reqID=$req->fetch(PDO::FETCH_OBJ);
    $petToModify = [
        'id' => $reqID->id_pet,
        'name' => $reqID->petsName,
        'walks' => $reqID->walks,
        'comment' => $reqID->comment,
        'meals' => $reqID->meals,
    ];
    $petsToModify[] = $petToModify;
    $req->closeCursor();
    return $petsToModify;
}

function editPet($walks, $meals, $comment, $id) {
    $db = getDb();

    $modifPet = $db->prepare('UPDATE pets
                              SET walks=?, meals=?,comment=?
                              WHERE pets.id_pet=?');
    $affectedLines = $modifPet->execute(array($walks, $meals, $comment, $id));
    $modifPet->closeCursor();

    return ($affectedLines > 0);

}