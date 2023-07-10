<?php
namespace App\PGVM\controller;

DEFINE ('SALT_SUFFIX', 'wsh6759n' );
DEFINE ('SALT_PREFIX', 'hsgt49U2');

/**
 * Cette classe implémente toute les fonctions qui sont en commun les divers controllers
 */
abstract class AbstractController

{

    //Affiche une fenêtre dans le site web et importe des données dans la même pour être utilisées lors de l'affichage
    public static function afficheVue(string $cheminVue, array $parametres = []) : void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue

    }
    // Fonction très utile permettant de sécuriser un minimum la base de données
    public static function hashPassword($password): string{
        return hash("sha256",SALT_SUFFIX . $password . SALT_PREFIX);
    }

}