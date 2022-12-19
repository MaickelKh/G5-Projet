<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="content/style/admin.css">
        <title><?=$title?></title>
    </head>
    <body>
        <header>
            <div class="logo">
                <img src="content/img/logo.png" class="header_logo" alt="Logo du site">
            </div>
            <nav>
                <ul>
                    <!--<?php if($_SESSION['$userType'] == "Admin") {
                        echo '<li><a href="index.php">Accueil</a></li>';
                        echo '<li><a href="item_mgmt.php">Gestion du matériel</a></li>'; #Consulter - Ajouter - Modifier - Supprimer
                        echo '<li><a href="rent_mgmt.php">Gestion des reservation</a></li>'; #Accepter - Refuser
                        echo '<li><a href="loan.php">Gestion des prêt</a></li>'; #Ajouter - Supprimer (retour)
                        echo '<li id="last"><a href="stat.php">Statistiques</a></li>'; #Consulter 
                    } else {
                        echo '<li><a href="index.php">Accueil</a></li>'; 
                        echo '<li><a href="reserve.php">Reserver</a></li>'; #Consulter - reserver à distance
                        echo '<li id="last"><a href="myreserve.php">Mes reservations</a></li>'; #Voir le status - prolonger - rendre
                    } ?>-->
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="item_mgmt.php">Gestion du matériel</a></li>
                    <li><a href="rent_mgmt.php">Gestion des demandes</a></li>
                    <li><a href="loan.php">Gestion des reservations</a></li>
                    <li id="last"><a href="stat.php">Statistiques</a></li>
                </ul>
            </nav>
        </header>
    <main>
        <?=$content ?>
    </main>
    <footer>
        
    </footer>
</body>
</html>