<?php

require 'vendor/autoload.php';

$pdo = new \PDO('sqlite:db/meupalpite.sq3');
$pdo->exec('DROP TABLE times;');
$pdo->exec('CREATE TABLE times(id INTEGER PRIMARY KEY, nome TEXT, code TEXT)');

use Respect\Relational\Mapper;

$mapper = new Mapper($pdo);

$samples = file_get_contents('samples/times.json');
$times = json_decode($samples);

foreach($times as $time) {
	$mapper->times->persist($time);
}



$mapper->flush();


var_dump($mapper->times->fetchAll());

