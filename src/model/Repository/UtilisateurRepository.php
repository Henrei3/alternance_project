<?php
namespace App\PGVM\model\Repository;


use App\PGVM\model\DataObject\Utilisateur;
use App\PGVM\model\Repository\DatabaseConnexion;

class UtilisateurRepository
{

    /**
     * @param $email
     * @param $mot_de_passe
     * @return int
     *
     * Cette methode verifie si un utilisateur existe et si le mot de passe proportionnée est le correct.
     * Elle retourne <strong>user_group</strong> si c'est le cas
     * <strong> 0 </strong> si l'utilisateur n'existe pas
     * et <strong> 2 </strong> si le mot de passe est incorrect.
     */
    public static function check_user($email, $mot_de_passe): int | string{
        $pdo_statement = DatabaseConnexion::getPdo();
        $pdo_statement =  $pdo_statement->prepare(
            "SELECT email FROM utilisateur where email=:emailTag;"
        );
        $values = ["emailTag"=>$email];


        $pdo_statement->execute($values);
        $user_email = $pdo_statement->fetchAll();

        if ($user_email){
            $pdo_statement = DatabaseConnexion::getPdo();
            $pdo_statement = $pdo_statement->prepare(
                "SELECT user_group from utilisateur where email=:emailTag and mot_de_passe=:mdpTag"
            );
            $values = ["emailTag"=>$email, "mdpTag"=>$mot_de_passe];
            $pdo_statement->execute($values);
            $user_user_group = $pdo_statement->fetch();

            if ($user_user_group) return $user_user_group['user_group'];
            else {
                return 2;
            }

        }
        else{
            return 0;
        }
    }

    public static function addUser(){
        $pdo_statement = DatabaseConnexion::getPdo();


    }
    public static function updateUser(){

    }
    public static function getUser($email): ?Utilisateur{
        $pdo_statement = DatabaseConnexion::getPdo();

        $requete = "SELECT * FROM utilisateur where email = :emailTag";
        $pdo_statement = $pdo_statement->prepare($requete);
        $values = [
            "emailTag" =>$email
        ];
        $pdo_statement->execute($values);
        $result = $pdo_statement->fetchAll();

        if($result){
            return new Utilisateur($result[0]['nom'],$result[0]['prenom'],$result[0]['email'],$result[0]['user_group']);
        }
        return null;
    }
}