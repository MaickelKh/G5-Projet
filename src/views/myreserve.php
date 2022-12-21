<?php
$title = "Equipe 5 - prêts et reservations";

ob_start(); ?>

<section id="myreserve">
        <?php 
        foreach ($userLeases as $userLease) {
            echo '<article>';
                echo '<img src="content/img/items/ordi.png">';
                echo '<div class="right">';
                    echo '<p id="info">',$userLease['typeName'],'</p>';
                    echo '<p>Status</p>';
                    echo '<p id="info">',$userLease['status'],'</p>';
                    echo '<p>Date de récupération</p>';
                    echo '<p id="info">',$userLease['startDate'],'</p>';
                    echo '<p>Date de fin</p>';
                    echo '<p id="info">',$userLease['endDate'],'</p>';
                    echo '<div class="contentButton">';
                        echo '<button>Prolonger</button>';
                        echo '<button>Rendre</button>';
                    echo '</div>';
                echo '</div>';
            echo '</article>';

            /* 'id' => $row['ID_lease'], */
            /* 'username' => $row['Username'], */
            /* 'itemID' => $row['itemID'], */

        } ?>
</section>


<?php $content = ob_get_clean();

require('src/views/layout.php');
?>