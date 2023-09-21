<?php

class Connect{



//Methodes
/**
 * une méthode statique permet de faire appel à une méthode sans instancier la classe
 */

static function connect(){
// propriété
     $db_name = 'biblioapp';
     $db_user = 'root';
     $db_pass = 'root';
     $db_host = 'localhost';

    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
        // echo "<h1>Connexion à la base de données réussie en test</h1>";
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }

}




}