<?php

class Modele 
{
    // Effectue la connexion à la BDD
    // Instancie et renvoie l'objet PDO associé
    private function getBdd() 
    {
        date_default_timezone_set('Europe/Brussels');
        $hote='localhost';
        $nomBD='walkingpets';
        $user='root';
        $mdp='';
        try {
            $bdd = new PDO('mysql:host='.$hote.';dbname='.$nomBD.';charset=utf8', $user, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $bdd;
        }
        catch (Exception $e) {
            echo "Erreur de connexion à la BD : $e";
        }
    }

    // Renvoie la liste des commentaires associés à un billet
    public function getName() 
    {
        $bdd = $this->getBdd();
        $req=$bdd->query("SELECT pets.name AS name FROM pets");
        $nom = [];
        while($data = $req->fetch())
        {
            $nom[] = $data['name'];
        }
        $req->closeCursor();
        return $nom;
        
    }
}