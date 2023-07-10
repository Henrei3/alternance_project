<?php

namespace App\PGVM\controller;

use App\PGVM\model\Repository\UtilisateurRepository;

/**
 * Controller qui permet la gestion des employées dans l'application
 */
class ControllerEmployee extends AbstractController implements InterfaceController
{
    public static function addForm(){
        self::afficheVue('view.php', ["pagetitle"=>'Ajouter Employee', "componentPath"=>"addEmployee.php"]);
    }

    public static function add(){
        $nom = $_GET["nom"];
        $prenom = $_GET["prenom"];
        $email = $_GET["email"];
        $mot_de_passe = $_GET["pwd"];

        $mdp = self::hashPassword($mot_de_passe);

        UtilisateurRepository::addEmployee($nom,$prenom,$mdp,$email);
        self::afficheVue('view.php',
            ["pagetitle"=>"Home",
                "notificationComponent"=>"update.php",
                "message"=>"L'employé a pu être ajoutée correctement." ,
                "componentPath"=>"main.php"]);
    }
}