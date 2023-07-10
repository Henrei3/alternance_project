<?php

namespace App\PGVM\config;

/**
 * Cette classe est la classe config appartenant au Localhost
 * Dans le cas ou la connexion à certaine base de données ne soit pas réussi, ce fichier Conf
 * pourra les remplacer.
 */
class ConfLocal
{
    static private $database_info = array(
        "hostname" => "127.0.0.1",
        "port" =>"8889",
        "user" => "root",
        "database" => "alternance_project",
        "password" => "root"
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