<div>
    <h1>Ajouter un Employé</h1>
    <div>
        <form method="GET" action="index.php">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="controller" value="employee">

            <input placeholder="Nom" name="nom" required>
            <input placeholder="Prénom" name="prenom" required>
            <input placeholder="Mail" name="email" required>
            <input placeholder="Mot De Passe" type="password" name="pwd" required>
            <section class="send">
                <input type="submit" value="Ajouter">
            </section>
        </form>
    </div>

    </div>
</div>
<?php
