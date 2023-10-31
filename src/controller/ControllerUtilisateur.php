<?php

namespace App\PGVM\controller;

use App\PGVM\Lib\EmailEnvoie;
use App\PGVM\model\Repository\UtilisateurRepository;

class ControllerUtilisateur extends AbstractController
{

    public static function connexionUtilisateur(){
        $email = $_GET['email'];
        $pwd = self::hashPassword($_GET['pwd']);
        $user_check = UtilisateurRepository::check_user($email, $pwd);

        if (!is_numeric($user_check)){
            session_start();
            $_SESSION['user_group'] = $user_check;
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = UtilisateurRepository::getUser($email);
            ControllerDefault::main();
        }
        else if($user_check == 0){
            self::afficheVue('login.php',["pagetitle"=>"Email Incorrect",
                                                    "errorComponent"=>"errorMessage.php",
                                                    "error_message"=>"Le email proportionné est incorrect"]);
        }
        else if($user_check == 2){
            self::afficheVue('login.php',["pagetitle"=>"Email Incorrect",
                "errorComponent"=>"errorMessage.php",
                "error_message"=>"Le mot de passe proportionné est incorrect"]);
        }
    }

    public static function deconnexion(){
        session_start();
        session_destroy();
        session_unset();
        ControllerDefault::login();
    }
}