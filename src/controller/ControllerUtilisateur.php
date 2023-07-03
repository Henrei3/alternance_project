<?php

namespace App\PGVM\controller;

use App\PGVM\model\Repository\UtilisateurRepository;

DEFINE ('SALT_SUFFIX', 'wsh6759n' );
DEFINE ('SALT_PREFIX', 'hsgt49U2');

class ControllerUtilisateur
{
    private static function afficheVue(string $cheminVue, array $parametres = []) : void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue

    }

    public static function connexionUtilisateur(){
        $email = $_GET['email'];
        $pwd = hash("sha256",SALT_SUFFIX . $_GET['pwd'] . SALT_PREFIX);
        $user_check = UtilisateurRepository::check_user($email, $pwd);

        if (!is_numeric($user_check)){
            session_start();
            $_SESSION['user_group'] = $user_check;
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = UtilisateurRepository::getUser($email);
            self::afficheVue('main.php', ["pagetitle"=>"Home"]);
        }
        else if($user_check == 0){

        }
        else if($user_check == 2){

        }

    }
    public static function addUtilisateur(){
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $mot_de_passe = $_POST["pwd"];

        var_dump($nom);
    }




}