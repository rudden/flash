<?php

// Get environment & autoloader.
require __DIR__.'/config.php'; 

// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();

$di->setShared('flash', function() use ($di) {
    $flash = new \Anax\Flash\FlashMessages();
    $flash->setDI($di);
    return $flash;
});


$di->set('FlashController', function() use ($di) {
    $controller = new \Anax\Flash\FlashController();
    $controller->setDI($di);
    return $controller;
});

$app = new \Anax\MVC\CApplicationBasic($di);

$app->router->add('', function() use ($app) {

	$app->theme->setTitle('Flash');

	$app->response->redirect($app->url->create('flash'));
	
});

$app->router->handle();
$app->theme->render();