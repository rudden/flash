<?php

// Get environment & autoloader.
require __DIR__.'/config.php'; 

// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();

$di->set('FlashController', function() use ($di) {
    $controller = new Rudden\Flash\FlashController();
    $controller->setDI($di);
    return $controller;
});

$app = new \Anax\Kernel\CAnax($di);

// Home Route
$app->router->add('', function() use ($app) {

    $app->theme->addStyleSheet('css/flash.css');

	$app->flash->success('Demo message');
	$msg = $app->flash->output();

	$app->views->add('default/page', [
		'title'   => 'Hello',
		'content' => $msg
	]);
    
});

$app->router->handle();
$app->theme->render();