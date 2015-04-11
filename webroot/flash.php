<?php

// Get environment & autoloader.
require __DIR__.'/config.php'; 

// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();

$di->setShared('fmsg', function() use ($di) {
    $fmsg = new rudden\Flash\FlashMessages();
    $fmsg->setDI($di);
    return $fmsg;
});

$app = new \Anax\Kernel\CAnax($di);

// Home Route
$app->router->add('', function() use ($app) {

	$app->theme->setTitle('Flash');
    $app->theme->addStyleSheet('css/flash.css');

	$app->fmsg->success('Success message');
	$app->fmsg->info('Informative message');
	$app->fmsg->error('Error message');
	$app->fmsg->warning('Warning message');
	$fmsg = $app->fmsg->printMessage();

	$app->views->addString($fmsg, 'main');
    
});

$app->router->handle();
$app->theme->render();