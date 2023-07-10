<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $pagetitle;?></title>
    <link rel="stylesheet" href="./css/login_style.css">
</head>
<body>
    <?php
    if(isset($errorComponent)){
        require __DIR__."/{$errorComponent}";
    }
    ?>
    <form method="GET" action="index.php">
        <input type="hidden" name="action" value="connexionUtilisateur">
        <input type="hidden" name="controller" value="utilisateur">
        <div class="login_box">
            <div> Veuillez vous connecter </div>
            <span>
                <img src="./img/user.png">
                <div>
                    <input type="text" id="email_field" name="email" placeholder="Adresse Email" required>
                </div>
            </span>
            <span>
                <div>
                    <input type="password" id="password_field" name="pwd" placeholder="Mot de Passe" required>
                </div>
                <img src="./img/password.png">
            </span>
            <input type="submit" value="Se connecter"/>
        </div>
    </form>
</body>

<?php
