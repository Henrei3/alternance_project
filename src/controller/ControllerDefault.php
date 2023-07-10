<?php

namespace App\PGVM\controller;

/**
 * Controller permettant la navigation du site
 */
class ControllerDefault extends AbstractController
{
    public static function login(){
        self::afficheVue('login.php', ['pagetitle' => 'Login']);
    }
    public static function error(){
        self::afficheVue('error.php', ['pagetitle'=>'Error 404']);
    }
    public static function main(){
        self::afficheVue('view.php',["pagetitle"=>"Home","componentPath"=>"main.php"]);
    }

    public static function AVenirForm(){
        self::afficheVue('view.php', ["pagetitle"=>"Visites A Venir", "componentPath"=>"AVenir.php"]);
    }

    public static function historiqueForm(){
        self::afficheVue('view.php',["pagetitle"=>"Historique","componentPath"=>"historique.php"]);
    }
}