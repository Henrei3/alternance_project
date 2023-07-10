<nav>

    <div>
        <a href="index.php?action=main&&controller=default"><img src="./img/logo.svg" id="logo"></a>
        <a href="index.php?action=aVenirForm&&controller=default"><h4>A Venir</h4></a>
        <a href="index.php?action=historiqueForm&&controller=default"><h4>Historique</h4></a>
        <a  href="index.php?action=deconnexion&&controller=utilisateur"> <h4>Déconnexion</h4>  </a>
    </div>
    <?php
    if($_SESSION['user_group'] == 'administrator')

        echo '<a href="index.php?action=addForm&&controller=employee"><img src="./img/new_employee.svg" id="addEmployee"></a>';

    ?>
</nav>