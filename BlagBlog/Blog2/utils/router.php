<?php

$params = explode('/', $_GET['p']);

//! revoir avec un switch

if ($params[0]) {
    $controller = $params[0];
} else {
    $controller = 'Accueil'; //par défaut
}
if (@$params[1]) {
    $method = $params[1];
} else {
    $method = 'index'; //par défaut
}
if (@$params[2]) {
    $req = $params[2];
} else {
    $req = '';
}

$called = 'controllers/' . $controller . '.php';
require($called);

if (method_exists($controller, $method)) {
    $myctrl = new $controller();
    $myctrl->$method($req);

} else {
    echo "methode non existante...erreur 404.";
}