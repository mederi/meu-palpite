<?php

require_once __DIR__.'/../vendor/autoload.php';

define('PATH_VIEW', __DIR__ . '/../app/views');
define('PATH_LAYOUT', __DIR__ . '/../app/views/layout.twig');

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use MyLib\Database;

$app = new Application;

$app['database'] = new Database('sqlite:../db/meupalpite.sq3');

$app['debug'] = true;

$app->register(new TwigServiceProvider(), array(
  'twig.path' => PATH_VIEW, 'twig.templates' => array(PATH_LAYOUT)
));

$app->get('/', function() use ($app) {
	return $app->redirect('/jogos/listar');
});

$app->get('/jogos/listar', function() use ($app) {
	$jogos = new MeuPalpite\Models\Jogos($app['database']);
	$times = new MeuPalpite\Models\Times($app['database']);

  return $app['twig']->render('jogos/listar.twig', array(
  	'jogos' => $jogos->getAll($times->getAll())
  ));
});

$app->run();