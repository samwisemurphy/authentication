<?php 

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use Noodlehaus\Config;
use Codecourse\User\User;
use Codecourse\Helpers\Hash;
use Codecourse\Validation\Validator;

session_cache_limiter(false);
session_start();

ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT . '/vendor/autoload.php';

$app = new Slim([
		'mode' => file_get_contents(INC_ROOT . '/mode.php'),
		'view' => new Twig(),
		'templates.path' => INC_ROOT . '/app/views'
	]);

$app->configureMode($app->config('mode'), function() use ($app) {
	$app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");	// Pulls in the specific config we want to use from mode.php
});

require 'database.php';
require 'routes.php';


$app->container->set('user', function(){
	return new User;
});

$app->container->singleton('hash', function() use ($app) {
	return new Hash($app->config);
});

$app->container->singleton('validation', function() use ($app){
	return new Validator($app->user);
});

$view = $app->view();

$view->parserOptions = [
	'debug' => $app->config->get('twig.debug')
];

$view->parserExtensions = [		// Alows us to generate urls within views
	new TwigExtension
];









