<?php

namespace App\PGVM\model\Repository;

use App\PGVM\model\Repository\DatabaseConnexion;
use PDOException;

/**
 * Cette classe permet la creation des tables nécessaires pour le fonctionnement du site
 * Dans le cas ou elles ne soient pas existantes.
 */
class SetUpDatabase
{
    public static function setUp(){
        if (!self::checkIfExists('utilisateur')){
            self::createTableUser();
        }
        if(!self::checkIfExists('visite_medicale')){
            self::createTableVisiteMedicale();
        }

    }

    private static function createTableUser(){
        $pdo_statement = DatabaseConnexion::getPdo();



        $pdo_statement->exec('CREATE TABLE utilisateur (
            u_id int NOT NULL AUTO_INCREMENT,
            nom VARCHAR(25),
            prenom VARCHAR(25),
            mot_de_passe VARCHAR(255),
            email VARCHAR(255),
            PRIMARY KEY (u_id)
                  );'
        );
    }

    private static function createTableVisiteMedicale(){
        $pdo_statement = DatabaseConnexion::getPdo();

        $requete = $pdo_statement->exec(
            "CREATE TABLE visite_medicale (
          vm_id int NOT NULL AUTO_INCREMENT,
          u_id int, 
          date DATE, 
          PRIMARY KEY (vm_id),
          FOREIGN KEY (u_id) REFERENCES utilisateur(u_id)
        )"
        );
    }
    private static function checkIfExists($table){
        $pdoStatement = DatabaseConnexion::getPdo();
        try{
            $requete = "SELECT * FROM `".$table."`;";

            $pdo = $pdoStatement->query(
                $requete
            );
            $result = $pdo->fetchAll();

        }
        catch (PDOException $e){
            return !str_contains($e->getMessage(), "Base table or view not found");
        }
        return true;
    }
}