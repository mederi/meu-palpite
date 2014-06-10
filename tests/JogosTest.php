<?php

namespace Test;

use MeuPalpite\Models\Jogos;
use Respect\Relational\Mapper;

class JogosTest extends \PHPUnit_Framework_TestCase
{
	protected $jogos;

	public function setUp()
	{
		$mapper = new Mapper(new \PDO('sqlite:db/meupalpite.sq3'));
		$this->jogos = new Jogos($mapper);
	}
	public function testListarJogos()
	{
		$this->assertCount(48, $this->jogos->getAll());
	}

}