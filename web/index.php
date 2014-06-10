<?php
require '../vendor/autoload.php';

$app = new Silex\Application();
$app['debug']=true;
$app->register(new Silex\Provider\TwigServiceProvider(),array(
  'twig.path'=> __DIR__.'/../app/views'));

$app->get('/jogos/listar',function() use ($app){
  return $app['twig']->render('jogos/listar.twig',array('name'=>'copa 2014'));
});
$app->run();