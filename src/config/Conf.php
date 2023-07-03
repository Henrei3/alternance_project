<?php
namespace App\PGVM\config;

use App\PGVM\model\Repository\DatabaseConnexion;

/**
 * Cette Classe stocke les informations importantes à stocker pour la connexion avec une base de données.
 *
 * <p>
 * Elle est directement connectée avec la classe {@link DatabaseConnection}
 * </p>
 *
 */

class Conf
{
    static private $database_info = array(
        "hostname" => "db5013530119.hosting-data.io",
        "port" =>"3306",
        "user" => "dbu5250238",
        "database" => "dbs11336474",
        "password" => "t2tArQ#3ivhqvo"
    );

    public static function getHostname() : string {
        return self::$database_info["hostname"];
    }
    public static function getPort(): string{
        return self::$database_info["port"];
    }
    public static function getUser() : string {
        return self::$database_info["user"];
    }
    public static function getDatabase(): string {
        return self::$database_info["database"];
    }
    public static function getPassword(): string {
        return self::$database_info["password"];
    }
}