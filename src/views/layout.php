<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="content/style/style.css">
    <title> <?=$title?></title>
</head>
<body>
    <header id="<?=$_SESSION['type'];?>">
        <div>
            <a href="index.php">
                <img src="content/img/logo2.png" alt="Logo">
            </a>
        </div>
        <nav>
            <?php
                if ($_SESSION['type'] == "Admin") {
                    echo '<li><a href="index.php">Accueil</a></li>';
                    echo '<li><a href="item_mgmt.php">Gestion du matériel</a></li>'; #Consulter - Ajouter - Modifier - Supprimer
                    echo '<li><a href="rent_mgmt.php">Gestion des reservation</a></li>'; #Accepter - Refuser
                    echo '<li><a href="loan.php">Gestion des prêt</a></li>'; #Ajouter - Supprimer (retour)
                    echo '<li id="last"><a href="stat.php">Statistiques</a></li>'; #Consulter statistiques
                } else if ($_SESSION['type'] == "User") {
                    echo '<li><a href="index.php">Accueil</a></li>'; #Voir Offre - Reserver
                    echo '<li><a href="myreserv.php">Mes prêts et reservations</a></li>'; #Consulter - Modifier - Supprimer
                }
            ?>
        </nav>
        <div>
            <?php
            if ($_SESSION['type'] == "Admin" || $_SESSION['type'] == "User") {
                echo '<a href="index.php?action=deco">';
                echo '<p>Deconnexion</p>';
                echo '<img src="content/img/user1.png" alt="user">';
                echo '</a>';
            }
            else {
                echo '<a href="login.php">';
                echo '<p>Se connecter</p>';
                echo '<img src="content/img/user1.png" alt="user">';
                echo '</a>';
            }
            ?>
        </div>
    </header>
    <main> 
        <?=$content?>
    </main>
    <footer>
        <div>
            <a href="" id="Twitter">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentcolor" stroke="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path></svg>
            </a>
            <a href="" id="Facebook">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentcolor" stroke="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
            </a>
            <a href="" id="Instagram">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
            </a>
            <a href="" id="Youtube">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="M12 19c-2.3 0-6.4-.2-8.1-.6-.7-.2-1.2-.7-1.4-1.4-.3-1.1-.5-3.4-.5-5s.2-3.9.5-5c.2-.7.7-1.2 1.4-1.4C5.6 5.2 9.7 5 12 5s6.4.2 8.1.6c.7.2 1.2.7 1.4 1.4.3 1.1.5 3.4.5 5s-.2 3.9-.5 5c-.2.7-.7 1.2-1.4 1.4-1.7.4-5.8.6-8.1.6 0 0 0 0 0 0z"></path><polygon points="10 15 15 12 10 9"></polygon></svg>
            </a>
        </div>
        <div id="ref">
            <a href="#">Contact</a>
            <a href="index.php"><img src="content/img/logo.png" alt="Logo"></a>
            <a href="index.php">Reservation</a>
        </div>
    </footer>
</body>
</html>