<?php

$title = "Equipe 5 - Reservation";

ob_start(); ?>
<main id="reserv">
    <h2 class="msg">
        Veuillez confirmez votre réservation
    </h2>    
    <section id=reserv>
        <div class="reserv">
            <img src="content/img/items/<?=$itemToReserv['picture']?>" alt="Image d'un ordinateur">
            <div class="right">
                <h3>Matériel : </h3><p><?=$itemToReserv['typeName']?></p>
                <h3>Commentaire : </h3><p><?=$itemToReserv['comment']?></p>
                <h3>Disponible : </h3><p><?=$itemToReserv['count']?></p>
                <button onclick="window.location.href='index.php?reserv=ok&type=<?=$itemToReserv['typeName']?>'">Confirmer</button>
                <p>Attention : une fois la réservation traitée et validée, vous disposerez de 7 jours pour aller chercher l'objet sous peine d'annulation</p>
            </div>
        </div>        
    </section>
</main>
    <style>footer {position: absolute;}</style>
<?php $content = ob_get_clean();

require('src/views/layout.php');