<?php

namespace App\PGVM\Lib;



use App\PGVM\model\Repository\UtilisateurRepository;

/**
 * Cette classe s'occupe d'envoyer des notifications par email aux utilisateurs du site
 */
class EmailEnvoie
{

    // Cette fonction utilise la fonction mail() déjà implémenté en PHP.
    // Pour une version améliorée du projet ça pourrait être possible d'utiliser
    // PHPMailer qui permet l'utilisation de SMTP pour l'envoi des emails.
    public static function envoieNotificationVisiteMedicale($user_id , $date){

        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );

        $user = UtilisateurRepository::getUserByID($user_id);

        $to = $user->getEmail();
        echo $to.' ';

        $subject = "Votre visite Medicale du ". $date ;
        $txt = 'Bonjour '.$user->getPrenom() ."\n
        Votre visite médicale du viens d'être enregistré dans notre système";

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        mail('pgvmresponsable@yopmail.com',$subject,$txt,implode("\r\n", $headers));
        $mail_return = mail($to,$subject,$txt,implode("\r\n", $headers));

        var_dump($mail_return);
    }
}