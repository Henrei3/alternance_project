<?php
namespace App\PGVM\model\Repository;


use App\PGVM\model\DataObject\Utilisateur;
use App\PGVM\model\DataObject\VisiteMedicale;
use App\PGVM\model\Repository\DatabaseConnexion;

/**
 * Cette classe execute les réquetes nécessaires pour effectuer l'usage de la base de données.
 *
 * Pour une version améliorée de l'application, ça pourrait être possible séparer cette classe en deux
 * avec l'aide d'une classe abstraite pour permettre la gestion des tables de manière organisée.
 */
class UtilisateurRepository
{

    /**
     * @param $email
     * @param $mot_de_passe
     * @return int
     *
     * Cette methode verifie si un utilisateur existe et si le mot de passe proportionnée est le correct.
     * Elle retourne <strong>user_group</strong>
     * Elle retourne <strong> 0 </strong> si l'utilisateur n'existe pas (Le mail n'est pas correct)
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

    public static function addEmployee($nom, $prenom, $mdp, $email){
        $pdo_statement = DatabaseConnexion::getPdo();

        $requete = "INSERT INTO utilisateur(nom, prenom, mot_de_passe, email, user_group) 
                    VALUES (:nomTag, :prenomTag, :mdpTag, :emailTag, 'employee')";
        $pdo_statement = $pdo_statement->prepare($requete);
        $values = [
            "nomTag"=>$nom,
            "prenomTag"=>$prenom,
            "mdpTag"=>$mdp,
            "emailTag"=>$email
        ];
        try{
            $pdo_statement->execute($values);
            return True;
        }catch (\Exception $e ){
            return $e->getMessage();
        }

    }
    public static function updateUser(){

    }

    public static function addVisiteMedicale(string $u_id, $date){
        $pdo_statement = DatabaseConnexion::getPdo();

        $requete = "INSERT INTO visite_medicale (u_id, date) VALUES (:u_idTag,:dateTag)";

        $pdo_statement = $pdo_statement->prepare($requete);

        $values = [
            "u_idTag"=>$u_id,
            "dateTag"=>$date
        ];
        try {
        $pdo_statement ->execute($values);

        return True;
        }
        catch (\Exception $e ){
            return $e->getMessage();
        }
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
            return new Utilisateur($result[0]);
        }
        return null;
    }
    public static function getUserByID(string $id){
        $pdo_statement = DatabaseConnexion::getPdo();

        $requete = "SELECT * FROM utilisateur where u_id = :idTag";
        $pdo_statement = $pdo_statement->prepare($requete);

        $pdo_statement->execute(["idTag"=>$id]);
        $user_row = $pdo_statement->fetch();

        return new Utilisateur($user_row);
    }
    public static function getAllUsers(){
        $pdo_statement = DatabaseConnexion::getPdo();

        $requete = "SELECT * FROM utilisateur where user_group='employee'";
        $responses = $pdo_statement->query($requete);

        return $responses;
    }

    public static function getAllVisitesMedicalesAVenir(){
        $pdo_statement = DatabaseConnexion::getPdo();

        $requete = "SELECT * FROM visite_medicale where date > NOW();";

        $responses =  $pdo_statement->query($requete);

        return self::rowToVisiteMedicale($responses);
    }
    public static function getAllVisitesMedicalesHistorique(){
        $pdo_statement = DatabaseConnexion::getPdo();

        $requete = "SELECT * FROM visite_medicale where date < NOW()";

        $responses =  $pdo_statement->query($requete);
        return self::rowToVisiteMedicale($responses);
    }

    public static function getVisitesMedicalesAVenir(string $u_id){
        $pdo_statement = DatabaseConnexion::getPdo();

        $requete = "SELECT * FROM visite_medicale where u_id=:u_idTag and date > NOW()";

        $pdo_statement = $pdo_statement->prepare($requete);

        $pdo_statement->execute(["u_idTag"=>$u_id]);
        $responses =  $pdo_statement->fetchAll();

        return self::rowToVisiteMedicale($responses);
    }
    public static function getVisitesMedicalesHistorique(string $u_id){
        $pdo_statement = DatabaseConnexion::getPdo();

        $requete = "SELECT * FROM visite_medicale where u_id=:u_idTag and date < NOW()";

        $pdo_statement = $pdo_statement->prepare($requete);
        $pdo_statement->execute(["u_idTag"=>$u_id]);

        return self::rowToVisiteMedicale($pdo_statement->fetchAll());
    }
    public static function rowToVisiteMedicale($rows){
        $visites_medicales = [];
        foreach($rows as $row){
            $visites_medicales[] = new VisiteMedicale($row);
        }
        return $visites_medicales;
    }
    public static function rowToUtilisateur($rows){
        $utilisateurs = [];
        foreach ($rows as $row){
            $utilisateurs[] = new Utilisateur($row);
        }
        return $utilisateurs;
    }
}