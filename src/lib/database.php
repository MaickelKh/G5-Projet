<?php 

class DbConnect {
    public ?PDO $db = null;

    public function getDb():PDO {
        if ($this->db === null) {
            date_default_timezone_set('Europe/Brussels');
            $hote='localhost';
            $dbname='projet';
            $user='root';
            $mdp='';
            try {
                $this->db=new PDO('mysql:host='.$hote.';dbname='.$dbname, $user, $mdp);
                $this->db->exec("SET NAMES 'utf8'");
            }
            catch (Exception $e) {
                
            }
        }
        return $this->db;
    }
}