<?php

namespace App\PGVM\controller;


class ControllerDefault
{
    //affiche une vue selon un chemin et des paramètres qui seront transfomés en variables
    private static function afficheVue(string $cheminVue, array $parametres = []) : void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue

    }

    public static function login(){
        self::afficheVue('login.php', ['pagetitle' => 'Login']);
    }
    public static function error(){
        self::afficheVue('error.php', ['pagetitle'=>'Error 404']);
    }
}