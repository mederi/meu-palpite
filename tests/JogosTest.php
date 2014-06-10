<?php

namespace Test;

use MeuPalpite\Models\Jogos;
use MyLib\Database;

class JogosTest extends \PHPUnit_Framework_TestCase
{
	protected $jogos;

	public function setUp()
	{				
		$this->jogos = new Jogos((new Database('sqlite:db/meupalpite.sq3')));
	}
	public function testListarJogos()
	{
		$this->assertCount(48, $this->jogos->getAll());
	}

}