<div>
    <h1> Bienvenue <?php echo $_SESSION["user"]->nom ?> ! </h1>
    <?php
        if($_SESSION['user_group']=='administrator')
            echo '<a href="index.php?action=addForm&controller=visiteMedicale"><div>Planifier une visite Medicale</div></a>'
    ?>
</div>
