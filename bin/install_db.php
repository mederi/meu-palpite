<?php

require '../vendor/autoload.php';

use Respect\Relational\Mapper;

$mapper = new Mapper(new PDO('sqlite:../db/meupalpite.sq3'));

$brasil = new stdClass;
$brasil->nome = 'Brasil';
$brasil->code = 'br';
$mapper->times->persist($brasil);

$mapper->flush();


