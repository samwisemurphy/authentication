<?php
$app->get('/', function() use ($app) {
	$app->render('home.php');
})->name('home');	// names the route

$app->get('/flash', function() use ($app){
	$app->flash('global', 'You have registered!');
	$app->response->redirect($app->urlFor('home'));
});