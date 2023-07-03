<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $pagetitle;?></title>
    <link rel="stylesheet" href="./css/main_style.css">
</head>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    echo '
<body>
    <nav> 
     <img src="./img/logo.svg" id="logo">
     <div>
        <h4>Chronogramme</h4>
        <h4>Historique</h4>
        <img src="./img/new_employee.svg" id="addEmployee"> 
    </div>
     </nav> 
    <div>
        <h1> Bienvenue '. $_SESSION["user"]->nom . ' ! </h1>
        <div>Planifier une visite Medicale</div>
    </div>
</body>';
} else {
    echo "Please log in first to see this page.";
}

