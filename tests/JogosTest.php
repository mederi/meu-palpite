<?php

namespace Test;

use MeuPalpite\Models\Jogos;
use MeuPalpite\Models\Times;
use MyLib\Database;

class JogosTest extends \PHPUnit_Framework_TestCase
{
	protected $jogos;

	public function setUp()
	{				
		$this->database = new Database('sqlite:db/meupalpite.sq3');
		$this->times = new Times($this->database);
		$this->jogos = new Jogos($this->database);
	}
	public function testListarJogos()
	{
		$this->assertCount(48, $this->jogos->getAll($this->times->getAll()));
	}

}