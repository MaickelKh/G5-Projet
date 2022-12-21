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
                <!--<form method="POST" action="">
                    <p><label class="labelForm" for="SD">Date de début : </p>
                    <select name="pets" id="SD">
                        <option value="">--Choisir une date de récupération--</option>
                        <option value="dog"></option>
                    </select>
                    <p><label class="labelForm" for="FD">Date de fin :</p>
                    <option value="date1"><?= $date;?></option>
                    <select name="pets" id="FD">
                        <option value="">-- Choisir une durée --</option>
                    </select>
                </form> -->
                <button onclick="window.location.href='index.php?reserv=ok&type=<?=$itemToReserv['typeName']?>'">Confirmer</button>
                <p>Attention : une fois la réservation traitée et validée, vous disposerez de 7 jours pour aller chercher l'objet sous peine d'annulation</p>
            </div>
        </div>        
    </section>
</main>
    <style>footer {position: relative;}</style>
<?php $content = ob_get_clean();

require('src/views/layout.php');