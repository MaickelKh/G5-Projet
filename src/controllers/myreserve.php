<?php

require('src/models/reservation.php');

function MyReserve() {
    $reservation = new Reserv();
    $reservation->db = new DbConnect();
    $userLeases = $reservation->getLease($_SESSION['name']);

    require('src/views/myreserve.php');
}