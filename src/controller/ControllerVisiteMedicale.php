<?php

namespace App\PGVM\controller;

use App\PGVM\Lib\EmailEnvoie;
use App\PGVM\model\Repository\UtilisateurRepository;

/**
 * Controller permettant la gestion des VisiteMedicale
 */
class ControllerVisiteMedicale extends AbstractController implements InterfaceController
{

    public static function addForm()
    {
        self::afficheVue('view.php',["pagetitle"=>'Ajouter Visite',"componentPath"=>"addVisiteMedicale.php"]);
    }

    public static function add()
    {
        $user_id = $_GET['employee'];
        $date = $_GET['date'];

        $status_insert = UtilisateurRepository::addVisiteMedicale($user_id,$date);
        if ($status_insert){
            EmailEnvoie::envoieNotificationVisiteMedicale($user_id,$date);
            self::afficheVue('view.php',
                ["pagetitle"=>"Home",
                    "notificationComponent"=>"update.php",
                    "message"=>"La visite Médicale a pu être ajoutée correctement." ,
                    "componentPath"=>"main.php"]);
        }
    }
}