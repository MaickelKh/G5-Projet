<?php

require_once('../src/models/admin/modif_item.php');
require_once('../src/views/admin/modif_item.php');

function ItemToMofidy(){
    $petsToModify = getPetToModify($_GET['id']);
    require('src/views/modif_pet.php');
}

function ItemPet(int $id, array $input) {
    $walks = null;
    $meals = null;
    $comment = null;

    if (!empty($input['walks']) && !empty($input['meals'])) {
        $walks = $input['walks'];
        $meals = $input['meals'];
        $comment = $input['comment'];
    } else {
        throw new Exception('Veuillez remplir tout les champs');
    }

    $success = editPet($walks, $meals, $comment, $id);
	if (!$success) {
    	die('Impossible d\'ajouter le commentaire !');
	} else {
    	header('Location: index.php');
	}
}