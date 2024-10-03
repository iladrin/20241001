<?php
require __DIR__ . '/../routing/redirect.php';


$routes = require __DIR__ . '/../config/routes.php';
$requestStack = [];

$page = $_GET['page'] ?? 'homepage';
$requestStack[] = $page;

// On appellera le controller associé à une page demandé
// tant qu'il y a une requête à traiter
// (Pour rappel, un forward relance une requête interne)
do {
    // array_shift extrait le premier élément du tableau
    $currentRequest = array_shift($requestStack);

    if (!isset($routes[$currentRequest])) {
        require __DIR__ . "/../templates/errors/404.php";
        exit;
    }

//    var_dump("Dispatching page $currentRequest");

    $controller = $routes[$currentRequest]['controller'];
    require __DIR__ . "/../controllers/$controller.php";

} while (!empty($requestStack));

// On affiche quelque chose à l’utilisateur 😄
require __DIR__ . "/../templates/$controller.php";
