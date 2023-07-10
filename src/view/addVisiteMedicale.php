<?php
use \App\PGVM\model\Repository\UtilisateurRepository;
        ?>
<div>
    <h1>
        Planifier une visite medicale
    </h1>
    <form method="GET" action="index.php">
        <input type="hidden" name="action" value="add">
        <input type="hidden" name="controller" value="visiteMedicale">
        <section class="inner_inputs">
            <select name="employee" id="chooseEmployee" required>

                <?php
                    $result = UtilisateurRepository::getAllUsers();
                    foreach ($result as $row){
                        echo '<option value="'.$row["u_id"].'"> '.$row["nom"] .' '.$row["prenom"].' </option>';
                    }
                ?>

            </select>
            <input type="date" name="date" required>
        </section>
        <section class="send">
            <input type="submit">
        </section>
    </form>
</div>

