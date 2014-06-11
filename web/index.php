<?php

require_once __DIR__.'/../vendor/autoload.php';

define('PATH_VIEW', __DIR__ . '/../app/views');

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use MyLib\Database;

$app = new Application;

$app['database'] = new Database('sqlite:../db/meupalpite.sq3');

$app['debug'] = true;

$app->register(new TwigServiceProvider(), array(
  'twig.path'=> PATH_VIEW
));

$app->get('/jogos/listar', function() use ($app) {
	$jogos = new MeuPalpite\Models\Jogos($app['database']);
	$times = new MeuPalpite\Models\Times($app['database']);

  return $app['twig']->render('jogos/listar.twig', array(
  	'jogos' => $jogos->getAll($times->getAll())
  ));
});

$app->run();