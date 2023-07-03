<?php

namespace App\PGVM\model\Repository;
use App\PGVM\config\Conf;
use App\PGVM\config\ConfLocal;
use PDO;
use PDOException;

/**
 * La classe <strong> Database Connection </strong> instantie et configure un {@link PDO}
 * <p>
 * Cette classe possède le SingleTon pattern.
 * Ce qui permet l'utilisation d'une seule connexion a la base de données.
 * </p>
 */

class DatabaseConnexion

{
    private static ?DatabaseConnexion $instance = null;

    private ?PDO $pdo;

    public static function getPdo(): PDO{
        return self::getInstance()-> pdo;
    }
    private function __construct()
    {
        $hostname = Conf::getHostname();
        $port = Conf::getPort();
        $login = Conf::getUser();
        $database = Conf::getDatabase();
        $password = Conf::getPassword();
        $connected = $this->connect($hostname,$port,$database,$login,$password);
        if (!$connected){
            $hostname = ConfLocal::getHostname();
            $port = ConfLocal::getPort();
            $database = ConfLocal::getDatabase();
            $login = ConfLocal::getUser();
            $password = ConfLocal::getPassword();
            $this->connect($hostname,$port,$database,$login,$password);
        }
    }
    public function connect($hostname, $port, $database, $login, $password){
        // Connexion a la base de données MySQL en aide de PDO
        try {
            $this->pdo = new PDO("mysql:servname=$hostname;port=$port;dbname=$database;charset=UTF8", $login, $password);
            // On active le mode d'affichage des erreurs, ainsi que le lancement d'exception en cas d'erreur
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($this->pdo){
                return true;
            }
        }
        catch (PDOException){
            return false;
        }
        return true;
    }
    public static function getInstance() :DatabaseConnexion{
        if (is_null(self::$instance)){
            self::$instance = new DatabaseConnexion();
        }
        return self::$instance;
    }
}