<?php $title = 'titre'; ?>
<?php ob_start(); ?> 

    <h2 class="msg">
        Bonjour 
            <?php if (!empty($_SESSION['name']))
            echo $_SESSION['name'], ', ';?>voici le matiériel disponible à la location
    </h2>
        
    <section>
        <!-- <h2>Routeur</h2> -->
        <?php foreach ($itemsHome as $item) {
            echo '<article>';
                echo '<div class="card">';
                    echo '<div>';
                        echo '<img src="content/img/items/',$item['picture'],'" alt="">';
                    echo '</div>';
                echo '<div>';
                    echo '<h2>',$item['typename'],'</h2>';
                    echo '<p>',$item['comment'],'</p>';
                    echo '<p class="Restant">', $item['count'],' Restants</p>';
                    echo '<a href="index.php?action=reserv&type=',$item['typename'],'">Reserver</a>';
                echo '</div>';
            echo '</div>';
            echo '</article>';
        } ?>
    </section>
<?php $content = ob_get_clean(); ?>

<?php require_once('src/views/layout.php'); ?>

