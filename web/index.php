<?php

use App\PGVM\controller\ControllerDefault;
use App\PGVM\Lib\Psr4AutoloaderClass;
use App\PGVM\model\Repository\DatabaseConnexion;
use App\PGVM\model\Repository\SetUpDatabase;

require_once __DIR__ . '/../src/lib/Psr4AutoloaderClass.php';


// On instancie un namespace pour faciliter l'importation de classes dans notre projet
$loader = new Psr4AutoloaderClass();

$loader ->addNamespace('App\PGVM', __DIR__.'/../src/');

$loader -> register();


// On automatise le routage avec l'aide de controllers qui vont permettre la navigation de la page et
// l'exécution des fonctionnalités du site.
if (isset($_GET['action'])){
    $action = $_GET['action'];
    if(isset($_GET['controller'])){

        $controller = $_GET['controller'];
        $controllerClassName = 'App\PGVM\controller\Controller'.ucfirst($controller);
        if (class_exists($controllerClassName)){
            $controllerClassName::$action();
        }
        else {
            ControllerDefault::error();
        }
    }
    else{
        ControllerDefault::error();
    }
}
else {
    ControllerDefault::login();
}

