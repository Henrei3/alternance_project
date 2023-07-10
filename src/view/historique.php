<?php
use \App\PGVM\model\Repository\UtilisateurRepository;
?>

<div>
    <h1>
        Historique
    </h1>
    <div class="row">
        <div class="column"> Employé </div>
        <div class="column"> Date </div>
    </div>
    <?php
    if($_SESSION['user_group']=='administrator' || $_SESSION['user_group'] == 'responsable' ){
        $visites_medicales = UtilisateurRepository::getAllVisitesMedicalesHistorique();
        foreach($visites_medicales as $visite_medicale){
            $user = UtilisateurRepository::getUserByID($visite_medicale->getUserId());
            echo '<div class="row">
                    <div class="column">'.$user->getNom() .' '.$user->getPrenom().'</div>
                    <div class="column">'. $visite_medicale->getDate(). '</div>
                  </div>';
        }
    }
    else if ($_SESSION['user_group']=='employee'){
        $user = $_SESSION['user'];
        $visites_medicales = UtilisateurRepository::getVisitesMedicalesHistorique($user->getUId());
        foreach($visites_medicales as $visite_medicale){
            echo '<div class="row">
                    <div class="column">'.$user->getNom() .' '.$user->getPrenom().'</div>
                    <div class="column">'. $visite_medicale->getDate(). '</div>
                  </div>';
        }
    }
    ?>


</div>
