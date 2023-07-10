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
?>
<body>

<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {

    require __DIR__.'/navbar.php';
    ?>

    <main>

<?php
    if(isset($notificationComponent)){
        require __DIR__."/{$notificationComponent}";
    }
    if(isset($componentPath)){
        require __DIR__."/{$componentPath}";
    }
?>
    </main>
</body>
<?php
} else {
    echo "Please log in first to see this page.";
}
