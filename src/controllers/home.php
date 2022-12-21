<?php

require_once('src/models/model.php');

function home() {
    $model = new Model();
    $model->db = new DbConnect();
    $itemsHome = $model->getItemsHome();

    require_once('src/views/home.php');
}
