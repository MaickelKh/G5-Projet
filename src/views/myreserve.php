<?php
$title = "Equipe 5 - prêts et reservations";

ob_start(); ?>

<section id="myreserve">
    <article>
        <img src="content/img/items/ordi.png">
        <div class="right">
            <p>Status : </p>
            <p>En attente</p>
            <p>Date de récupération : </p>
            <p>Avant le 24/12/2022</p>
            <p>Date de fin</p>
            <p>20/01/2023</p>
            <button>Rendre</button>
        </div>
    </article>
    <article>
        salut
    </article>
    <article>
        salut
    </article>
</section>


<?php $content = ob_get_clean();

require('src/views/layout.php');
?>