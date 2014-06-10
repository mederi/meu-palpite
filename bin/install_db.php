<?php

require 'vendor/autoload.php';

$pdo = new \PDO('sqlite:db/meupalpite.sq3');
$pdo->exec('DROP TABLE times;');
$pdo->exec('CREATE TABLE times(id INTEGER PRIMARY KEY, nome TEXT, code TEXT)');

$pdo->exec('DROP TABLE jogos;');
$pdo->exec('CREATE TABLE jogos(id INTEGER PRIMARY KEY, time_id_casa INTEGER,time_id_visitante INTEGER, data_jogo TEXT)');

use Respect\Relational\Mapper;

$mapper = new Mapper($pdo);

$times = file_get_contents('samples/times.json');
$times = json_decode($times);

$jogos = file_get_contents('samples/jogos.json');
$jogos = json_decode($jogos);

foreach($times as $time) {
	$mapper->times->persist($time);
}

foreach($jogos as $jogo) {
	$mapper->jogos->persist($jogo);
}


$mapper->flush();


var_dump($mapper->times->fetchAll());
var_dump($mapper->jogos->fetchAll());

